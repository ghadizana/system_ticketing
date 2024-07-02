<?php

namespace App\Http\Controllers;

use App\Models\GrupUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        $grupUsers = GrupUser::all();
        return view('auth.register', compact('grupUsers'));
    }

    public function actionRegister(Request $request) {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'email' => $request->email,
            'idProyek' => $request->idProyek,
            'idKaryawan' => $request->idKaryawan,
            'idGrupUser' => $request->idGrupUser,
            'idDepartment' => $request->idDepartment,
            'image' => $request->image,
        ]);

        return redirect()->route('masterUser')->with('success', 'Data berhasil ditambahkan');
    }
}
