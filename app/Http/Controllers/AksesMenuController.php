<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AksesMenuController extends Controller
{
    public function index()
    {
        $aksesMenu = AksesMenu::with('Menu')->get();
        $menu = Menu::all();
        return view('master.aksesMenu.index', compact('aksesMenu', 'menu'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idAksesMenu' => 'required',
            'deskripsi' => 'required',
            'label' => 'required',
            'idMenu' => 'required|array',
            'idMenu.*' => 'exists:menu,idMenu'
        ]);

        try {
            $aksesMenu = AksesMenu::create([
                'idAksesMenu' => $request->input('idAksesMenu'),
                'idMenu' => $request->input('idMenu'),
                'deskripsi' => $request->input('deskripsi'),
                'label' => $request->input('label'),
            ]);

            if (!$aksesMenu) {
                throw new \Exception('Failed to create Akses Menu.');
            }

            foreach ($request->input('idMenu') as $menuId) {
                $aksesMenu->Menu()->attach($menuId, [
                    'create' => in_array('create', $request->input("subMenu.$menuId", [])),
                    'read' => in_array('read', $request->input("subMenu.$menuId", [])),
                    'update' => in_array('update', $request->input("subMenu.$menuId", [])),
                    'delete' => in_array('delete', $request->input("subMenu.$menuId", [])),
                ]);
            }

            return redirect()->route('aksesMenu')->with('success', 'Akses Menu berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error' => $e->getMessage()])->withInput();
        }
    }

    public function edit($idAksesMenu)
    {
        $aksesMenu = AksesMenu::find($idAksesMenu);
        $menu = Menu::all();
        return view('master.aksesMenu.edit', compact('aksesMenu', 'idAksesMenu', 'menu'));
    }

    // public function update($idAksesMenu, Request $request) {
    //     AksesMenu::where('idAksesMenu', $idAksesMenu)->update([
    //         'idMenu' => $request->input('idMenu'),
    //         'deskripsi' => $request->input('deskripsi'),
    //         'label' => $request->input('label'),
    //     ]);

    //     return redirect()->route('aksesMenu');
    // }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input jika diperlukan
            $request->validate([
                'idMenu' => 'required|array',
                'deskripsi' => 'required|string',
                'label' => 'required|string',
            ]);

            // Temukan AksesMenu yang akan diperbarui
            $aksesMenu = AksesMenu::findOrFail($id);

            // Update AksesMenu
            $aksesMenu->update([
                'deskripsi' => $request->input('deskripsi'),
                'label' => $request->input('label'),
            ]);

            // Sync menu dan akses permissions
            $aksesMenu->Menu()->detach(); // Hapus semua relasi menu yang ada
            foreach ($request->input('idMenu') as $menuId) {
                $aksesMenu->Menu()->attach($menuId, [
                    'create' => in_array('create', $request->input("subMenu.$menuId", [])),
                    'read' => in_array('read', $request->input("subMenu.$menuId", [])),
                    'update' => in_array('update', $request->input("subMenu.$menuId", [])),
                    'delete' => in_array('delete', $request->input("subMenu.$menuId", [])),
                ]);
            }

            return redirect()->route('aksesMenu')->with('success', 'Akses Menu berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Error' => $e->getMessage()])->withInput();
        }
    }


    public function destroy($idAksesMenu)
    {
        $aksesMenu = AksesMenu::where('idAksesMenu', $idAksesMenu)->first();

        if ($aksesMenu) {
            User::where('idGrupUser', $aksesMenu->idGrupUser)->delete();
            $aksesMenu->delete();

            return redirect()->route('aksesMenu')->with('success', 'Akses Menu sudah dihapus');
        } else {
            return redirect()->route('aksesMenu')->with('error', 'Akses Menu not found');
        }
    }
}
