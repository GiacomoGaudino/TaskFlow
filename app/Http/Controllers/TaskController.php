<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $this->authorize('viewAny', Task::class);
        $tasks = auth()->user()->visibleTasks()->load('users');
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Task::class);

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Task::class);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id',
            'due_date' => 'nullable|date',
        ]);

        $task = auth()->user()->tasks()->create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'due_date' => $data['due_date'] ?? null,
        ]);

        $task->users()->sync($request->users ?? []);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        $users = User::all();

        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $user = auth()->user();

        if ($user->isAdmin()) {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'users' => 'nullable|array',
                'users.*' => 'exists:users,id',
                'due_date' => 'nullable|date',
                'completed' => 'nullable|boolean',
            ]);

            $task->update($data);
            $task->users()->sync($request->users ?? []);
        } else {
            $data = $request->validate([
                'completed' => 'required|boolean',
            ]);

            $task->update([
                'completed' => $data['completed']
            ]);
        }

        return redirect()->route('tasks.index')->with('success', 'Task aggiornata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
