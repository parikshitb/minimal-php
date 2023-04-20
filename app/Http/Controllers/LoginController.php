<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        /*
        $counter=0;
        if (Cache::has('cnt')) {
            $counter = Redis::get('cnt');
        }
        $limit = $counter + 10;
        for ($i=$counter; $i <= $limit; $i++) { 
                Redis::set('foo#'.$i, 'bar#'.$i);
        }
        Redis::set('cnt', $limit);
        */

        $user = Auth::user();
        if($user != null)
        {
            Log::info($user->getAuthIdentifierName());
            Log::info(Auth::id());
        }
        $request->validate(['name' => ['required'], 'password' => ['required']]);
        return redirect()->route('welcome');
    }
}
