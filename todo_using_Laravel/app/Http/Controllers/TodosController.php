<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Requests;
use Carbon\carbon;
use Illuminate\Html\HtmlServiceProvider;

class TodosController extends Controller
{
    // Home Page
    public function index()
    {
        $todos = Todo::orderBy('created_at','desc')->get();
        return view('todo.index',compact('todos'));
    }
    // Create New Task
    public function create()
    {
        return view('todo.create');
    }
    // Store Task
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'task' => 'required',
            'completion_date' => 'required|date|after_or_equal:today'
        ]);

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->task = $request->input('task');
        $todo->date_created = Carbon::now();
        $todo->completion_date = $request->input('completion_date');
        $todo->save();
        return redirect('/')->with([
            'flash_message' => 'Task has been created!'
        ]);

    }
    // Show a particular task
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.show',compact('todo'));
    }
    // Grid Show
    public function gridshow($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.gridshow',compact('todo'));
    }
    // Edit task
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit',compact('todo')); 
    }
    // Update task
    public function update($id, Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'task' => 'required',
            'completion_date' => 'required|date|after_or_equal:today'
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return redirect()->action('TodosController@show',$todo->id);;
    }
    // Delete a particular task
    public function deleteTask($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/')->with('alert','Task Deleted!');
    }
    // Search task
    public function search()
    {
        return view('todo.search');
    }
    // Find the task
    public function find(Request $request)
    {
        $this->validate($request,[

            'keyword' => 'required'
        ]);
        $keyword = $request->input('keyword');
        $todos = Todo::search($keyword)->get();
        return view('todo.index',compact('todos'));
    }
    // Delete all tasks
    public function clearall()
    {
       $todos = Todo::truncate();
       return redirect('/')->with('alert','All the tasks have been deleted!');
    }
    // Get completed tasks
    public function getCompleted()
    {
        $todos = Todo::getCompleted()->get();
        return view('todo.index',compact('todos'));
    }
    // Get In Process tasks
    public function getProcessing()
    {
        $todos = Todo::getProcessing()->get();
        return view('todo.index',compact('todos'));
    }
    // Get pending tasks
    public function getPending()
    {
        $todos = Todo::getPending()->get();
        return view('todo.index',compact('todos'));
    }
    // Help User
    public function help()
    {
        return view('todo.help');
    }
    // Grid View
    public function gridview()
    {
        $todos = Todo::orderBy('created_at','desc')->get();
        return view('todo.gridview',compact('todos'));
    }
    // Sort by Title
    public function sortByTitle()
    {
        $todos = Todo::orderBy('title')->get();
        return view('todo.index',compact('todos'));
    }
    // Sort by Date
    public function sortByDate()
    {
        $todos = Todo::orderBy('date_created')->get();
        return view('todo.index',compact('todos'));
    }
}