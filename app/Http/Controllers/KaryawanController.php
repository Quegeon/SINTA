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
            'nama' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:karyawans',
            'password' => 'required|string|max:100',
            'no_telp' => 'required|string|max:100',
            'kinerja' => 'nullable|numeric',
            'jumlah_tugas_selesai' => 'nullable|integer',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        Karyawan::create($validated);

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawans.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'username' => 'required|string|max:100|unique:karyawans,username,'.$karyawan->id,
            'password' => 'nullable|string|max:100',
            'no_telp' => 'required|string|max:100',
            'kinerja' => 'nullable|numeric',
            'jumlah_tugas_selesai' => 'nullable|integer',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $karyawan->update($validated);

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil diupdate');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil dihapus');
    }
}

