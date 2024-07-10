<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\GrupUser;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupUserController extends Controller
{
    public function index()
    {
        $grupUsers = GrupUser::paginate(10);
        $aksesMenu = AksesMenu::all();
        return view('master.grupUser.index', compact('grupUsers', 'aksesMenu'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idGrupUser' => 'required|unique:grup_users,idGrupUser',
            'grupUser' => 'required',
            'idAksesMenu' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }

        $grupUsers = GrupUser::create([
            'idGrupUser' => $request->idGrupUser,
            'grupUser' => $request->grupUser,
            'idAksesMenu' => $request->idAksesMenu,
        ]);

        return redirect()->route('grupUser')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($idGrupUser)
    {
        $grupUser = GrupUser::find($idGrupUser);
        $aksesMenu = AksesMenu::all();
        return view('master.grupUser.edit', compact('grupUser', 'idGrupUser', 'aksesMenu'));
    }

    public function update($idGrupUser, Request $request)
    {
        GrupUser::where('idGrupUser', $idGrupUser)->update([
            'grupUser' => $request->input('grupUser')
        ]);

        return redirect()->route('grupUser');
    }

    public function destroy($idGrupUser)
    {
        $grupUser = GrupUser::where('idGrupUser', $idGrupUser);

        if ($grupUser) {
            $grupUser->delete();
            return redirect()->route('grupUser')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('grupUser')->with('error', 'User not found');
        }
    }
}
