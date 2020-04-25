<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $fecha_1 = Carbon::now();
        $fecha1 = $fecha_1->subYears(70);
        $despues =  Carbon::parse($fecha1)->format('Y/m/d');

        $fecha_2 = Carbon::now();
        $fecha2 = $fecha_2->subYears(18);
        $antes =  Carbon::parse($fecha2)->format('Y/m/d');

        return Validator::make($data, [
            'nombres' => ['required', 'string'],
            'apellidos' => ['required', 'string'],
            'dni' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'nacimiento' => ['required', 'date', 'after:' . $despues, 'before:' . $antes],
            'celular' => ['required', 'numeric', 'digits:9', 'unique:users'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $request = app('request');
        $file =  $request->file('avatar');
        if ($file) {
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/avatar/', $name);
        } else {
            $name = 'avatar-default.png';
        }

        return User::create([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'nacimiento' => $data['nacimiento'],
            'celular' => $data['celular'],
            'avatar' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
