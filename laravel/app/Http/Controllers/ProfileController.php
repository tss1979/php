<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, User::rules(), [], User::attributeNames());
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);

                $user->save();

            } else {
                $errors['password'][] = "Неверно введен текущий пароль";
            }
            return redirect()->route('user.update')->withErrors($errors);
        }

        return view('index');
    }

    public function edit()
    {
        return view('profile_update');
    }


}
