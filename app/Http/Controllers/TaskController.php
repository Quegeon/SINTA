<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'id_project' => 'required|uuid',
            'pembuat' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tgl_dibuat' => 'required|date',
            'deadline' => 'required|date',
            'urugensi' => 'required|string|max:100',
            'deskripsi' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'id_project' => 'required|uuid',
            'pembuat' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tgl_dibuat' => 'required|date',
            'deadline' => 'required|date',
            'urugensi' => 'required|string|max:100',
            'deskripsi' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully.');
    }
}
