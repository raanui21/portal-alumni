<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new HttpResponseException(
                response(
                    [
                        'errors' => [
                            'message' => ['wrong email or password'],
                        ],
                    ],
                    401,
                ),
            );
        }

        $user->token = Str::uuid()->toString();

        $user->save();

        Auth::login($user);

        if  ($user->role == "admin"){
            return to_route('dashboard.index')->with('success', 'success login');
        }else{
            return to_route('home.index')->with('success', 'success login');
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function current(Request $request)
    {
        $user = Auth::user();

        if(!$user){
            return redirect('/');
        }
        
        return view('backoffice.user.index',['user'=> $user])->with('success','get current user');
    }
}
