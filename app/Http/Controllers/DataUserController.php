<?php

namespace App\Http\Controllers;

use App\Models\GrupUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    public function index()
    {
        $grupUsers = GrupUser::all();
        $dataUsers = User::with('grupUser')->paginate(10);
        return view('master.masterUser.user', compact('dataUsers', 'grupUsers'));
    }

    public function show($userId)
    {
        // $users = User::where('userId', $userId)->first();
        $users = User::with('grupUser')->where('userId', $userId)->first();
        $grupUsers = GrupUser::all();
        return view('master.masterUser.detail', compact('users', 'grupUsers'));
    }

    public function store(Request $request) {
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

    public function edit($userId) {
        $users = User::with('grupUser')->where('userId', $userId)->first();
        $grupUsers = GrupUser::all();
        return view('master.masterUser.edit', compact('users', 'userId', 'grupUsers'));
    }

    public function update($userId, Request $request) {
        User::where('userId', $userId)->update ([
            'idKaryawan' => $request->input('idKaryawan'),
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'idProyek' => $request->input('idProyek'),
            'idGrupUser' => $request->input('idGrupUser'),
            'idDepartment' => $request->input('idDepartment'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('masterUser');
    }

    public function destroy($userId)
    {
        $users = User::where('userId', $userId);

        if ($users) {
            $users->delete();
            return redirect()->route('masterUser')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('masterUser')->with('error', 'User not found');
        }
    }
}
