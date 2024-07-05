<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\GrupUser;
use App\Models\User;
use Illuminate\Http\Request;

class GrupUserController extends Controller
{
    public function index() {
        $grupUsers = GrupUser::paginate(10);
        return view('master.grupUser.index', compact('grupUsers'));
    }

    public function store(Request $request) {
        $request->validate([
            'idGrupUser' => 'required|unique:grup_users,idGrupUser',
            'grupUser' => 'required',
            'idAksesMenu' => 'required|akses_menu,idAksesMenu'
        ]);
        
        $grupUsers = GrupUser::create([
            'idGrupUser' => $request->idGrupUser,
            'grupUser' => $request->grupUser,
        ]);

        return redirect()->route('grupUser')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($idGrupUser) {
        $grupUser = GrupUser::find($idGrupUser);
        return view('master.grupUser.edit', compact('grupUser', 'idGrupUser'));
    }

    public function update($idGrupUser, Request $request) {
        GrupUser::where('idGrupUser', $idGrupUser)->update([
            'grupUser' => $request->input('grupUser')
        ]);

        return redirect()->route('grupUser');
    }

    public function destroy($idGrupUser) {
        $grupUser = GrupUser::where('idGrupUser', $idGrupUser);

        if ($grupUser) {
            $grupUser->delete();
            return redirect()->route('grupUser')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('grupUser')->with('error', 'User not found');
        }
    }
}

