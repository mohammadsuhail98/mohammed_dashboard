<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $newUser = Validator::make($request->all(), [
            'name' => 'string|required',
            'email' => 'string|required|email|unique:users',
            'password' => 'string|required|min:6',
            'phone' => 'string|nullable|min:1|max:11'
        ]);
        if ($newUser->fails())
            return response()->json([
                'message' => 'Error Something went wrong !',
                'success' => true,
                'data' => $newUser->messages()->first()
            ], 400);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'show_password' => $request->password,
        ]);
        return response()->json([
            'message' => 'Done !',
            'success' => true,
            'data' => []
        ], 201);
    }

    public function getUsers()
    {
        $user = auth()->user()->is_admin;
        if (!$user)
            return response()->json([
                'message' => 'you an\'t the admin my G',
                'success' => false,
                'data' => []
            ], 401);

        $users = User::all();
        return response()->json([
            'message' => '',
            'success' => true,
            'data' => $users
        ], 200);
    }
}