<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;



class AuthController extends Controller
{
    //@TODO 1-signup(GET),signup(POST) 2-login(GET),login(POST) 3-logout(POST)



    public function showSignupForm(){
        return view("auth.signup", ['tabTitle' => 'signup','pageTitle' => 'SignUp']);
    }
    public function signup(SignupRequest $request){
        //handle signup
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        auth()->login($user);
        return redirect('/')->with('success','');
    }
    public function showLoginForm(){
        return view("auth.login",['tabTitle' => 'login','pageTitle' => 'Login']);
    }
    public function login( SigninRequest $request){
        $credentials = $request->only('email','password');

        // Attempt to login
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')
                ->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput(request()->all());
    }

     public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'You are logged out.');
    }


}
