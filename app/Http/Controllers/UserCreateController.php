<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserCreateController extends Controller
{
    public function create()
    {
        return view('user.add-user');
    }

    public function storeUser(Request $request)
    {
        $user = new User();
        $hashed_random_password = Str::random(8);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->role;
        $user->password = bcrypt($hashed_random_password);
        $user->save();
        if ($user) {
            $details = [
                'Name' => "User Created With Name -> $request->name",
                'Email' => "User Created With Email -> $request->email",
                'Temporary_Password' => "User Created With Temporary Password -> $hashed_random_password",
                'Message' => "Please Change your password on login page Immedietly! and verify the account after change the password"
            ];
            Mail::to($request->email)->send(new UserMail($details));
        }
        if (Auth::user()->user_role == "ADMIN") {
            return redirect(route('admin.dashboard.users'));
        } else {
            return redirect(route('management.dashboard.users'));
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('user.edit-user', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->role;
        $user->save();
        if (Auth::user()->user_role == "ADMIN") {
            return redirect(route('admin.dashboard.users'));
        } else {
            return redirect(route('management.dashboard.users'));
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.dashboard.users'));
    }
}
