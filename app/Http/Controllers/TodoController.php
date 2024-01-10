<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;

class TodoController extends Controller
{
    private $todo_service;

    public function __construct()
    {
        $this->todo_service = new TodoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json( $this->todo_service->all(), 200 );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request )
    {
        $todo = $this->todo_service->store( $request->todo );

        return response()->json( $todo, 200 );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Int $id )
    {
        $todo = $this->todo_service->find( $id );
        
        if ( !$todo ) {
            return response()->json( [
                'message' => 'Todo not found'
            ], 404 );
        }
        
        $todo = $this->todo_service->update( $todo, null, $request->is_done );

        return response()->json( $todo, 200 );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( Int $id )
    {
        $this->todo_service->delete( $id );

        return response()->json( [], 201 );
    }
}
