<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use App\Events\UserLastLoginEvent;

class SocialService implements Social
{
    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            if ($socialUser->getName()) {
                $user->name = $socialUser->getName();
            }
            if (!$user->avatar && $socialUser->getAvatar()) {
                $user->avatar = $socialUser->getAvatar();
            }
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                event(new UserLastLoginEvent($user));
                return route('account');
            }
        } else {
            return route('register');
        }

        throw new ModelNotFoundException("Model Not Found");
    }
}
