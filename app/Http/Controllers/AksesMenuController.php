<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AksesMenuController extends Controller
{
    public function index() {
        $aksesMenu = AksesMenu::all();
        $menu = Menu::all();
        return view('master.aksesMenu.index', compact('aksesMenu', 'menu'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'idAksesMenu' => 'required|unique:akses_menus,idAksesMenu',
            'idMenu' => 'required',
            'deskripsi' => 'required',
            'label' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('addAksesMenu')->withErrors($validator->messages())->withInput();
        }

        $aksesMenu = AksesMenu::create($request->all());
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
