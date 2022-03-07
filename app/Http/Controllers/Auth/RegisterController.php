<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\BodyColors;
use App\Models\InviteKey;
use App\Models\RenderQueue;
use App\Rules\InviteKeyRule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'username' => ['required', 'string', 'min:3', 'max:20', 'unique:users', 'alpha_num'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'max:25', 'confirmed'],
            'invite_key' => ['string', new InviteKeyRule()]
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (!config('app.registration_enabled')) {
            return abort(403);
        }

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'register_ip' => '0.0.0.0',
            'last_ip' => '0.0.0.0'
        ]);

        BodyColors::create([
            'user_id' => $user->id,
            'head_color' => 1,
            'torso_color' => 1010,
            'left_arm_color' => 1,
            'right_arm_color' => 1,
            'left_leg_color' => 26,
            'right_leg_color' => 26
        ]);

        RenderQueue::create([
            'type' => 'user',
            'target_id' => $user->id
        ]);

        
        if (isset($data['invite_key'])) {
            $invitekey = InviteKey::where('token', $data['invite_key'])->first();
            $user->invite_key = $data['invite_key'];
            $user->save();

            $invitekey->uses = $invitekey->uses - 1;
            $invitekey->save();
        }

        return $user;
    }
}
