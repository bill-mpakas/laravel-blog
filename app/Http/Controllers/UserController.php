<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function storeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);
        $user = auth()->user();
        $filename = $user->id . '-' . uniqid() . '.jpg';
        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);
        $oldAvatar = $user->avatar;
        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar != "fallback-avatar.jpg") {
            Storage::delete(str_replace("/storage/","public/", $oldAvatar));
        }
        return back()->with('success','Your avatar has been updated');
    }

    public function showAvatarForm()
    {
        return view('avatar-form');
    }

    private function getSharedData($user) {
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id','=', auth()->user()->id],['followeduser','=', $user->id]])->count();
        }

        View::share('sharedData', ['currentlyFollowing' => $currentlyFollowing,'avatar' => $user->avatar, 'username' => $user->username, 'postCount'=> $user->posts()->count(),
            'followerCount' => $user->followers()->count(), 'followingCount' => $user->followingTheseUsers()->count()]);
    }

    public function profile(User $user )
    {
        $this->getSharedData($user);
        return view('profile-posts',['posts'=> $user->posts()->latest()->get()]);
    }

    public function profileFollowers(User $user )
    {
        $this->getSharedData($user);
        return view('profile-followers',[ 'followers'=> $user->followers()->latest()->get()]);
    }

    public function profileFollowing(User $user )
    {
        $this->getSharedData($user);
        return view('profile-following',[ 'following'=> $user->followingTheseUsers()->latest()->get()]);
    }

    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homepage-feed',['posts' => auth()->user()->feedPosts()->latest()->paginate(2)]);
        }
        else {
            return view('homepage');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','You are now logged out');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success','You are successfully logged in');
        } else {
            return redirect('/')->with('failure','Invalid login');
        }
    }


    public function register(Request $request)
    {
        $incoming_fields = $request->validate([
            'username' => ['required', 'min:3','max:20',Rule::unique('users','username')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:4','confirmed'],
        ]);

        $incoming_fields['password'] = bcrypt($incoming_fields['password']);

        $user = User::create($incoming_fields);
        auth()->login($user);
        return redirect('/')->with('success','Thanks for creating an account');
    }


}
