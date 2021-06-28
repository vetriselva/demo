<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Flash;
use Log;
class AuthController extends Controller
{
    public function getSignin()
    { 
        if (Sentinel::check()) {
            return redirect(route('admin.dashboard'));
        }
        return view('auth.login');
    }
    public function postSignin (Request $request)
    {
        if($user = Sentinel::authenticate($request->only(['email','password']),$request->get('remember', false))) {
            Flash::success("login successfully");
            return redirect(route('admin.registerform.index'));
        }
        Flash::error("Invalid Credentials");
        return redirect(route('login'));
    }
    public function postSignout () 
    {
        Sentinel::logout();
        return redirect(route('login'));
    }
}
