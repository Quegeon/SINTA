<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Menampilkan daftar admin
    public function settings()
    {
        $admins = Admin::all();
        return view('admins.settings', compact('admins'));
    }

    public function taskuser()
    {
        $admins = Admin::all();
        return view('admins.taskuser', compact('admins'));
    }

    // Menampilkan form untuk membuat admin baru
    public function create()
    {
        return view('admins.create');
    }

    // Menyimpan admin baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'no_telp' => 'required|string|max:100',
        ]);

        Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password), // enkripsi password
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan detail admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    // Mengupdate data admin di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'password' => 'nullable|string|max:100',
            'no_telp' => 'required|string|max:100',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin dari database
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
