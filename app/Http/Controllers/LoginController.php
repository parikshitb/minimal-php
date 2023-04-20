<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

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
        $counter=0;
        if (Cache::has('cnt')) {
            $counter = Redis::get('cnt');
        }
        $limit = $counter + 10;
        for ($i=$counter; $i <= $limit; $i++) { 
                Redis::set('foo#'.$i, 'bar#'.$i);
        }
        Redis::set('cnt', $limit);
        $credentials = $request->validate(['name' => ['required'], 'password' => ['required']]);
        if (Auth::validate($credentials)) {
            return redirect()->route('welcome');
        }
        return redirect()->route('login');
    }
}
