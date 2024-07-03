<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $menu = Menu::all();
        return view('master.menu.index', compact('menu'));
    }

    public function store(Request $request) {
        $request->validate([
            'idMenu' => 'required|unique:menus,idMenu',
            'namaMenu' => 'required',
            'baseUrl' => 'required',
            'label' => 'required',
        ]);

        $menu = Menu::create([
            'idMenu' => $request->input('idMenu'),
            'namaMenu' => $request->input('namaMenu'),
            'baseUrl' => $request->input('baseUrl'),
            'label' => $request->input('label'),
        ]);

        return redirect()->route('menu')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($idMenu) {
        $menu = Menu::find($idMenu);
        return view('master.menu.edit', compact('menu', 'idMenu'));
    }

    public function update($idMenu, Request $request) {
        Menu::where('idMenu', $idMenu)->update([]);

        return redirect()->route('menu');
    }

    public function destroy($idMenu) {
        $menu = Menu::where('idMenu', $idMenu);

        if ($menu) {
            $menu->delete();
            return redirect()->route('menu')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('menu')->with('error', 'User not found');
        }
    }
}
