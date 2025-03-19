<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Get search and status filters from the request
        $search = $request->input('search');
        $status = $request->input('status');
    
        $task = Task::query()
            ->when($search, function ($query, $search) {
                // Apply the search filter to the title, status, and description columns
                return $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('status', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($status, function ($query, $status) {
                // Apply the status filter (if status is provided)
                return $query->where('status', $status);
            })
            ->paginate(10);
    
        // Fetch all distinct status from the task table
        $status = Task::select('status')->distinct()->get();
    
        return view('task.index', compact('task', 'status'));
    }
    
    

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'assigned_user' => 'required'
        ]);


        $newTask = Task::create($data);

        return redirect(route('task.index'));

    }

    public function edit(Task $task){
        return view('task.edit', ['task' => $task]);
    }

    public function update(Task $task, Request $request){
        $data = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'assigned_user' => 'required'
            
        ]);

        $task->update($data);

        return redirect(route('task.index'))->with('success', 'Task Updated Succesffully');

    }

    public function destroy(Task $task){
        $task->delete();
        return redirect(route('task.index'))->with('success', 'Task deleted Succesffully');
    }
}
