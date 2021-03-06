<?php

namespace App\Http\Controllers;

use App\Model\User;

class EmailController extends Controller
{
    //

    public function verify($token)
    {
        $user = User::where('confirmation_token', $token)->first();
        if (is_null($user)) {
            flash('邮箱验证失败')->error()->important();
            return redirect('/');
        }

        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $user->save();
        flash('邮箱验证成功')->success()->important();

        return redirect('/home');
    }
}
