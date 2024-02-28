<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Index() {
        $user = Auth::User();
        if($user) {
            if($user->jabatan == 'ceo') {
                return redirect()->intended('ceo');
            }
            elseif ($user->jabatan == 'head') {
                return redirect()->intended('head');
            }
        }
        return view('login');
    }

    public function ProsesLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email','password');

        if (Auth::attempt($credential)) {
            $user = Auth::User();

            if ($user->jabatan == 'ceo') {
                return redirect()->intended('ceo');
            } elseif ($user->jabatan == 'head') {
                return redirect()->intended('head');
            }
            return redirect()->intended('/');
        }
        return redirect('login')->withInput()->withError(['login_gagal'=>'these credentials not match']);
    }


    public function Register() {
        return view('register');
    }


    public function ProsesRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required',
            'password' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/register')->withErrors($validator)->withInput();
            }
            $request['jabatan'] = 'user';
            $request['password'] = bcrypt($request->password);

            User::create($request->all());

            return redirect()->route('login');
    }
    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }



}
