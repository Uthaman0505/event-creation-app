<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserChangePasswordController extends Controller
{
    public function change_password($id)
    {
        $user = User::find($id);
        return view('user.change-password', ['user' => $user]);
    }

    public function saveNewPassword(Request $request)
    {
        if ($request->password != $request->confirmpassword) {
            session()->flash('message', 'Password Not Match!');
            return back();
        } else {
            $user = User::find($request->id);
            $user->password = bcrypt($request->password);
            $user->save();
            session()->flash('message', 'Password Changed Successfully!');
            return redirect(route('user.dashboard'));
        }
    }
}
