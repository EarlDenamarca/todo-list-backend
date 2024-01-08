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

    public function update( Todo $todo, String $todo_update ) : ?Todo
    {
        $todo->todo = $todo_update;
        $todo->save();

        return $todo;
    }

    public function delete( Int $id ) : Void
    {
        $todo = $this->find( $id );
        $todo->delete();
    }
}