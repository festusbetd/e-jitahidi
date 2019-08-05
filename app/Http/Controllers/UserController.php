<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;

class UserController extends Controller
{
    public function index(){
        return response()->json(User::with(['orders'])->get(), 200);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $credentials = [
         
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        
        $status = 401;
        $response = ['error' => 'Unauthorised'];
        
        if (Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'token' => Auth::user()->createToken('e-Jitahidi Store')->accessToken,
                'user' => Auth::user()
            ];
        }
        
        return response()->json($response, $status);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'tel' => 'required|min:10|unique:users|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'c_password' => 'required|same:password|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        
        $user = User::create($input);

        $success = [
            'token' => $user->createToken('e-Jitahidi Store')->accessToken,
            'user' => $user,
        ];
        
        return response()->json($success);
    }
    
    public function show(User $user)
    {
        return response()->json($user,200);
    }
    
    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product'])->get(),200);
    }
}