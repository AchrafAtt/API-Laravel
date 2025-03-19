<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class Autcontroller extends Controller
{
    use ApiResponses;

    public function login(ApiLoginRequest $request){
        //return json
        // return response()->json([
        //     'message' => 'Login Success'
        // ], 200);

        //*using trait
        return $this->ok($request->get('email')); 
    }

    public function register(){
        return $this->ok('Register Success');
    }
}
