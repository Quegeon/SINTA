<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


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
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'required|string|in:Admin,Developer,Analyst,Support,Trial',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_telp' => 'required|string|max:20',
            'password' => 'nullable|string|min:8', // Sesuaikan dengan kebijakan password
        ]);
    
        $karyawan = Karyawan::findOrFail($id);
    
        // Update data dasar
        $karyawan->nama = $request->input('nama');
        $karyawan->username = $request->input('username');
        $karyawan->role = $request->input('role');
        $karyawan->no_telp = $request->input('no_telp');
        
        // Update password jika diset
        if ($request->filled('password')) {
            $karyawan->password = Hash::make($request->input('password'));
        }
    
        if ($request->hasFile('foto')) {
            if ($karyawan->foto && Storage::exists('public/fotos/' . $karyawan->foto)) {
                Storage::delete('public/fotos/' . $karyawan->foto);
            }
        
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fotos', $filename);
        
            $karyawan->foto = $filename;
        }
    
        $karyawan->save();
    
        return redirect()->route('karyawans.detail', ['id' => $id])->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawans.index', compact('karyawan'));
    }

    public function detail($id)
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
