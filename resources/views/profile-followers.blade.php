<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}}'s follows">
@include('profile-followers-only')
</x-profile>
