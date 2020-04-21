<?php


namespace App\Adaptors;

use App\User;
use Laravel\Socialite\Two\User as UserOAuth;

class Adaptor
{
    public function getUserBySocId(UserOAuth $user, string $socName) {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();

        if (is_null($userInSystem) && $socName == 'vk') {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName())? $user->getName(): '',
                'email' => $user->accessTokenResponseBody['email'],
                'password' => '',
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            $userInSystem->save();
        }

        if (is_null($userInSystem) && $socName == 'gh') {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->nickname) ? $user->nickname : '',
                'email' => !empty($user->email) ? $user->email : '',
                'password' => '',
                'id_in_soc' => !empty($user->id) ? $user->id : '',
                'type_auth' => $socName,
                'avatar' => !empty($user->avatar) ? $user->avatar : '',
            ]);
            $userInSystem->save();
        }



        return $userInSystem;
    }
}
