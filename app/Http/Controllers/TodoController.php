<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class TodoController extends Controller
{
    public function index()
    {
        $todos = Session::get('todos', []);
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required']);
        $todos = Session::get('todos', []);
        $todos[] = ['task' => $request->task, 'completed' => false];
        Session::put('todos', $todos);
        return redirect()->back();
    }

    public function destroy($index)
    {
        $todos = Session::get('todos', []);
        unset($todos[$index]);
        Session::put('todos', array_values($todos));
        return redirect()->back();
    }

    public function change($index)
    {
        $todos = Session::get('todos', []);
        $todos[$index]['completed'] = !$todos[$index]['completed'];
        Session::put('todos', $todos);
        return redirect()->back();
    }
}
