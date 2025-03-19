<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiLoginRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Autcontroller extends Controller
{
    use ApiResponses;

    // public function login(ApiLoginRequest $request){
    //     //return json
    //     // return response()->json([
    //     //     'message' => 'Login Success'
    //     // ], 200);

    //     //*using trait
    //     return $this->ok($request->get('email')); 
    // }

    public function login(ApiLoginRequest $request){
        $request->validated($request->all());  
        
        if(!Auth::attempt($request->only("email","password"))){
            return $this->error('Unauthorized',401);
        }

        $user = User::firstWhere('email',$request->email);

        return $this->ok(
            'Authenticated',
            [
                'token' => $user->createToken('API token for'.$user->email,['*'],now()->addMonth())->plainTextToken
            ]
            );
    }

    //*revoking token
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Token Revoked');
    }
        

    // public function register(){
    //     return $this->ok('Register Success');
    // }
}
