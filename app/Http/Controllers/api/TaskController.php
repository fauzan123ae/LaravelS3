<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Apiresource;
use Illuminate\Support\Facades\Validator;

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
        $Validator = Validator::make($request->all(),[
        'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required',
        ]);

        $store = Task::create([
            'title' => $request ->title, 
            'description' => $request ->description, 
            'status' => $request ->status, 
            'due_date' => $request ->due_date, 
            'category_id' => $request ->category_id, 
            'user_id' => $request ->user_id, 
        ]);

        return new Apiresource(
            $store, "berhasil","true"

        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Task = Task::find($id);
        //return response()->json([
            //"pesan"=> "Berhasil",
            //"Status"=> "Completed",
            //"data" => $Task]);
        
            return new Apiresource(
                $Task,"berhasil","true"
    
            );  
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $Task -> delete();

        return new Apiresource(
            $Task,"berhasil dihapus","false"

        );  
    }
}
