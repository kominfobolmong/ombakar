<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token']  = $authUser->createToken('OmbakarToken')->plainTextToken;
            $success['name']   = $authUser->name;
            $success['email']  = $authUser->email;
            $success['role']  = $authUser->getRoleNames();
            $success['id']   = $authUser->id;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Email or password not valid', ['error' => 'Unauthorised']);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|max:255',
            'email'            => 'sometimes|required|email|max:255|unique:users,email',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['username'] = User::generateUserName($input['name']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole('User');
        $success['name'] = $user->name;
        $success['username'] = $user->username;
        $success['email'] = $user->email;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();

        return $this->sendResponse([], 'token deleted.');
    }
}
