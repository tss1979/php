<?php

namespace App\Http\Controllers\Admin;

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
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);

                $this->validate($request, User::rules(), [], User::attributeNames());

                $user->save();

                $request->session()->flash('success', 'Данные пользователя изменены!');
            } else {
                $errors['password'][] = "Неверно введен текущий пароль";
            }
            return redirect()->route('user.update')->withErrors($errors);
        }

        return view('admin.profile', [
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = User::query()->paginate(5);
        return view('admin.users', ['users' => $users]);
    }

    public function edit()
    {
        return view('profile_update');
    }

    public function change_admin_status(User $user)
    {
        if($user->is_admin)
        {
            $user->is_admin = false;
        } else {
            $user->is_admin = true;
        }

        $user->save();

        return redirect()->route('admin.profile.index');
    }
}
