<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\Apiresource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Task = Task::latest()->paginate(10);
        return response()->json($Task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Task = Task::find($id);
        // return response()->json([
            // "pesan" => "Berhasil", 
            // "status" => "Completed", 
            // "data" =>  $Task]);
        return new Apiresource (
            $Task, "berhasil", "true"
        );

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Task = task::find($id);
        $Task->delete();
        return new Apiresource (
            $Task, "Berhasil di hapus", "true"
        ); 
    }
}
