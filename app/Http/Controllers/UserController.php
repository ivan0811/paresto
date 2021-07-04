<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function CheckRoles(){
        $user_id = app('App\Http\Controllers\API\AuthController')->convertTokenUserId($request->user_token);
        $user = User::findOrFail($user_id);
        return response()->json($user->roles, 200);
    }

    function coba(){
        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
