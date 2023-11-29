<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorClient(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'integer'],
        ]);
    }

    protected function validatorWorkshop(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'nit' => ['required', 'integer'],
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
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 0,
        ]);
        $user->assignRole('Client');
        return $user;
    }

    // Este lo uso para crear un cliente
    protected function createClient(Request $data)
    {
        $this->validatorClient($data->all())->validate();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],

            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 0, // Tipo Cliente
        ]);

        $user->assignRole('Client');

        Client::create([
            'phone' => $data['phone'],
            'ci' => 0,
            'user_id' => $user->id,
        ]);

        $user->createAsStripeCustomer();

        Auth::login($user);

        return redirect('/panel/assistance');
    }

    // funcion para crear un workshop
    protected function createWorkshop(Request $data)
    {
        $this->validatorWorkshop($data->all())->validate();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 1, // Tipo Empresa | 2 = Mecanico
        ]);

        $user->assignRole('Workshop');

        Workshop::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'address' => $data['address'],
            'nit' => $data['nit'],
            'slogan' => '',
            'status' => 0,
        ]);

        $user->createAsStripeCustomer();


        Auth::login($user);

        return redirect('/workshop/assistance');
    }

    protected function vistaCreateClient()
    {
        return view('auth.register');
    }
    protected function vistaCreateWorkshop()
    {
        return view('auth.register-workshop');
    }
}
