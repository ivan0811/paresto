<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('username', $request->username)->first();
        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Unauthorized '
            ], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            'message' => 'success',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function convertTokenUserId($data_token){
        [$id, $user_token] = explode('|', $data_token, 2);
        $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
        $user_id = $token_data->tokenable_id;
        return $user_id;
    }

    public function CheckRoles(Request $request){
        $user = $request->user();
        return response()->json(["roles" => $user->roles], 200);
    }

    public function checkStatus(Request $request){
        $user = $request->user();
        return response()->json(["status" => $user], 200);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "status" => "success"
        ], 200);
    }
}
