<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function storeAvatar(Request $request)
    {
        $request->file('avatar')->store('public/avatars');
    }

    public function showAvatarForm()
    {
        return view('avatar-form');
    }

    public function profile(User $user )
    {

        return view('profile-posts',['username' => $user->username, 'posts'=> $user->posts()->latest()->get(), 'postCount'=> $user->posts()->count()]);
    }

    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homepage-feed');
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
