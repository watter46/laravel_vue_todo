<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function get_data() {
        $todos = Todo::all();
        return $todos;
    }

    public function add_data(Request $request) {
        $todo = new Todo;
        $todo->task = $request->task;
        $todo->save();
        $todos = Todo::all();
        return $todos;
    }

    public function delete_data(Request $request) {
        $todo = Todo::where('id', response->id)
        
    }
}
