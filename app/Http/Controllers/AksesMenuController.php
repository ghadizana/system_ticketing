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
            'namaMenu' => 'required',
            'label' => 'required',
            'status' => 'required',
        ]);
        
        $aksesMenu = AksesMenu::create([
            'idAksesMenu' => $request->idAksesMenu,
            'idMenu' => $request->idMenu,
            'deskripsi' => $request->deskripsi,
            'label' => $request->label,
        ]);

        return redirect()->route('aksesMenu')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($idAksesMenu) {
        $aksesMenu = AksesMenu::where('idAksesMenu', $idAksesMenu);

        if ($aksesMenu) {
            $aksesMenu->delete();
            return redirect()->route('grupUser')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('grupUser')->with('error', 'User not found');
        }
    }
}
