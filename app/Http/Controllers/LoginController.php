<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate(['name' => ['required'], 'password' => ['required']]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('welcome');
        }
        return redirect()->route('login');
    }
}
