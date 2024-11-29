<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $id = mt_rand(1000000000000000, 9999999999999999);

        $user = [
            "user_id" => $id,
            "user_nama" => $request->input("user_nama"),
            "user_alamat" => $request->input("user_alamat"),
            "user_username" => $request->input("user_username"),
            "user_email" => $request->input("user_email"),
            "user_notelp" => $request->input("user_notelp"),
            "user_password" => bcrypt($request->input("user_password")),
            "user_level" => "anggota",
        ];

        User::create($user);

        return redirect()->route("login")->with("success", "Pendaftaran berhasil!");
    }


    public function login(Request $request)
    {
        $credentials = [
            "user_username" => $request->input("user_username"),
            "password" => $request->input("user_password"),
        ];

        if (Auth::attempt($credentials)) {
            $user_level = Auth::user()->user_level;

            if ($user_level == "admin") {
                return redirect()->route("dashboardAdmin");
            }

            return redirect()->route("dashboardSiswa");
        }

        return redirect()->route("login")->with("error", "Username atau password salah");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login")->with("success", "Logout berhasil, silahkan masuk kembali.");
    }
}
