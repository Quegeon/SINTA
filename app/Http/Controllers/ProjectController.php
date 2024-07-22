<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $status = $request->query('status', 'all');

        if ($status === 'all') {
            $projects = Project::all();
        } else {
            $projects = Project::where('status', $status)->get();
        }

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_project' => 'required|string|max:255',
            'alokasi' => 'required|string|max:255',
            'skala' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('gambars'), $imageName);
            $validatedData['gambar'] = $imageName; 
        }

        Project::create($validatedData);
        return redirect()->route('projects.index')
                        ->with('success', 'Proyek berhasil ditambahkan.');
    }


    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required|string|max:255',
            'alokasi' => 'required|string|max:255',
            'skala' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'gambar_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $project = Project::findOrFail($id);
    
        if ($request->hasFile('gambar_file')) {
            $imageName = time().'.'.$request->gambar_file->getClientOriginalExtension();
            $request->gambar_file->move(public_path('gambars'), $imageName);
            $validatedData['gambar'] = $imageName;
        } else {
            $validatedData['gambar'] = $project->gambar;
        }
    
        $project->update($validatedData);
        
        return redirect()->route('projects.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }
}
