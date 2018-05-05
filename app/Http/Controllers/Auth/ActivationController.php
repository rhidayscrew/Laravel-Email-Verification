<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
       $user = User::byActivationColumns($request->email, $request->token)->firstOrFail();

       $user->update([
           'active' => true,
           'activation_token' => null
       ]);

       Auth::loginUsingId($user->id);

       return redirect()->route('home')->withSuccess('Activated! You\'re now signed in.');
    }
}
