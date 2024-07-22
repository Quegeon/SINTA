<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:karyawans',
            'password' => 'required|string|max:100',
            'no_telp' => 'required|string|max:100',
            'kinerja' => 'nullable|numeric',
            'jumlah_tugas_selesai' => 'nullable|integer',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
            $validated['foto'] = $imageName;
        }

        Karyawan::create($validated);

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return redirect()->route('karyawans.show', ['karyawan' => $id]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'password' => 'required|string|max:100',
            'no_telp' => 'required|string|min:13',
            'kinerja' => 'nullable|numeric',
            'jumlah_tugas_selesai' => 'nullable|integer',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if (is_null($validated['foto'])) {
            unset($validated['foto']);
        }

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
            $validated['foto'] = $imageName;
        } 
       
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($validated);
        
        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawans.detail', compact('karyawan'));
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil dihapus.');
    }
}
