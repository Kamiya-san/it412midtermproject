<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;


class AuthController extends Controller
{

    private $pepper;

    public function __construct() {
        $this->pepper = env("HASH_PEPPER", "it412midterm");
    }

    function customHashed($value, $salt) {
        $hashValue = $this->pepper . $value . $salt;
        return hash('MD5', $hashValue);
    }

    public function login() {
        return view('auth.login');
    }

    function loginPost(Request $request) {
        $request->validate([
            'inputEmail' => 'required',
            'inputPassword' => 'required',
        ],
        [
            'inputEmail.required' => 'The email field is required.',
            'inputPassword.required' => 'The password field is required.',
            'inputPassword.min' => 'The password must be at least :min characters.',
        ]
    );
    
        $user = User::where('email', $request->inputEmail)->first();
        $password = AuthController::customHashed($request->inputPassword, $user->salt);
        
        $credentials = ['email' => $request->inputEmail, 'password' => $password];
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with('error', 'Login Failed');
    }

    public function register() {
        return view('auth.registration');
    }

    function registerPost(Request $request) {
        $request->validate([
            'inputFullname' => 'required',
            'inputEmail' => 'required',
            'inputPassword' => 'required|min:12',
            'inputConfirmPassword' => 'required|min:12',
        ],
        [
            'inputFullname.required' => 'The fullname field is required.',
            'inputEmail.required' => 'The email field is required.',
            'inputPassword.required' => 'The password field is required.',
            'inputConfirmPassword.required' => 'The confirm password field is required.',
            'inputPassword.min' => 'The password must be at least :min characters.',
            'inputConfirmPassword.min' => 'The confirm password must be at least :min characters.'
        ]
    );

        $user = new User();
        $salt = bin2hex(random_bytes(16));

        $user->name = $request->inputFullname;
        $user->email = $request->inputEmail;
        $user->salt = $salt;
        $user->password = AuthController::customHashed($request->inputPassword, $salt);

        if($request->inputConfirmPassword === $request->inputPassword) {
            if($user->save()) {
                return redirect(route('login'))->with('success', 'User created successfully');
            }
        }   

        return redirect(route('register'))->with('error', 'Failed to create account, Password not matched');

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('login'));
      }
}
