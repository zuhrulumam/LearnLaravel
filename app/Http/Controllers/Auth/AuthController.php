<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
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

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    protected $loginPath = '/admin/login';

//    protected $guard = 'admin';
    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
//    public function handleProviderCallback() {
//        $user = Socialite::driver('facebook')->user();
//        echo $user->getName();
////        // OAuth Two Providers
////        $token = $user->token;
////
////// OAuth One Providers
////        $token = $user->token;
////        $tokenSecret = $user->tokenSecret;
////
////// All Providers
////        $user->getId();
////        $user->getNickname();
////        $user->getName();
////        $user->getEmail();
////        $user->getAvatar();
////        // $user->token;
//    }

    public function handleProviderCallback() {
        $user = Socialite::driver('facebook')->user();

        $dataUser = [
            'name' => $user->name,
            'email' => $user->email,
            'provider' => "facebook",
        ];

//        $authUser = $this->findOrCreateUser($user);
        $authUser = User::firstOrNew($dataUser);

        if (!$authUser->exists) {
            $authUser->password = \Illuminate\Support\Facades\Hash::make(str_random(15));
            $authUser->save();
        }

        Auth::login($authUser, true);
        return redirect('admin');
    }

//
//    /**
//     * Return user if exists; create and return if doesn't
//     *
//     * @param $fbUser
//     * @return User
//     */
    private function findOrCreateUser($fbUser) {

        if ($authUser = User::where('provider', 'facebook')
                ->where('email', $fbUser->getEmail())
                ->first()) {
            return $authUser;
        }

        return User::create([
                    'name' => $fbUser->name,
                    'email' => $fbUser->email,
                    'password' => \Illuminate\Support\Facades\Hash::make(str_random(15)),
                    'provider' => "facebook",
        ]);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
//            'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

}
