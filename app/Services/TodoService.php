<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public function all() : \Illuminate\Database\Eloquent\Collection
    {
        return Todo::all();
    }

    public function find( Int $id ) : ?Todo
    {
        return Todo::find( $id );
    }

    public function store( String $todo ) : ?Todo
    {
        return Todo::create([
            'todo'  => $todo
        ]);
    }

    public function update( Todo $todo, ?String $todo_update, Bool $is_done ) : ?Todo
    {
        $todo->todo     = $todo_update ? $todo_update : $todo->todo;
        $todo->is_done  = $is_done;
        $todo->save();

        return $todo;
    }

    public function delete( Int $id ) : Void
    {
        $todo = $this->find( $id );
        $todo->delete();
    }

    public function deleteTasks() : Void
    {
        Todo::truncate();
    }

    public function deleteDoneTasks() : Void
    {
        Todo::where( 'is_done', true )->delete();
    }

    public function fetchTasksByIsDone( Bool $is_done ) : \Illuminate\Database\Eloquent\Collection
    {
        return Todo::where( 'is_done', $is_done )->get();
    }
}