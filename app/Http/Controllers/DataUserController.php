<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index()
    {
        $dataUsers = User::paginate(10);
        return view('master.masterUser.user', compact('dataUsers'));
    }

    public function show($userId)
    {
        $users = User::where('userId', $userId)->first();
        return view('master.masterUser.detail', compact('users'));
    }

    public function edit($userId) {
        $users = User::find($userId);
        return view('master.masterUser.edit', compact('users', 'userId'));
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
