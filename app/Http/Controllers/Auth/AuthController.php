<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $redirectPath = '/';
    //protected $redirectAfterLogout = "/auth/login";

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:80|unique:users',
            'user' => 'required|max:50|unique:users',
            'nif'   => 'required|max:9|min:9|unique:users',
            'password' => 'required|confirmed|min:6|max:16',
            'password_confirmation' => 'required|min:6|max:16|same:password',
            'address' => 'required|max:80',
            'cp' => 'required|max:5|min:5', 
            'town' => 'required|max:60', 
            'province' => 'required|max:40', 
            'country' => 'required|max:40', 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user' => $data['user'],
            'nif'  => $data['nif'],
            'tlf'  =>  $data['tlf'],
            'type' => "user",
            'online' => 1,
            'password' => bcrypt($data['password']), //encriptado
            'address' => $data['address'],
            'cp' => $data['cp'], 
            'town' => $data['town'], 
            'province' => $data['province'], 
            'country' => $data['country'],
        ]);
    }
}