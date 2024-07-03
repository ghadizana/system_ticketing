<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class AksesMenuController extends Controller
{
    public function index() {
        $aksesMenu = AksesMenu::all();
        $menu = Menu::all();
        return view('master.aksesMenu.index', compact('aksesMenu', 'menu'));
    }

    public function store(Request $request) {
        $request->validate([
            'idAksesMenu' => 'required|unique:akses_menus,idAksesMenu',
            'idMenu' => 'required',
            'deskripsi' => 'required',
            'label' => 'required',
        ]);

        $aksesMenu = AksesMenu::create($request->all());

        return redirect()->route('aksesMenu')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($idAksesMenu) {
        $aksesMenu = AksesMenu::find($idAksesMenu);
        $menu = Menu::all();
        return view('master.aksesMenu.edit', compact('aksesMenu', 'idAksesMenu', 'menu'));
    }

    public function update($idAksesMenu, Request $request) {
        AksesMenu::where('idAksesMenu', $idAksesMenu)->update([
            'idMenu' => $request->input('idMenu'),
            'deskripsi' => $request->input('deskripsi'),
            'label' => $request->input('label'),
        ]);

        return redirect()->route('aksesMenu');
    }

    public function destroy($idAksesMenu) {
        $aksesMenu = AksesMenu::where('idAksesMenu', $idAksesMenu);

        if ($aksesMenu) {
            $aksesMenu->delete();
            return redirect()->route('aksesMenu')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('aksesMenu')->with('error', 'User not found');
        }
    }
}
