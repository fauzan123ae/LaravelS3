<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Task;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use App\Models\Task;
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
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
<<<<<<< HEAD
        //
=======
       // 
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $Validator = Validator::make($request->all(),[
        'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
=======
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id', // Validasi kategori
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
            'user_id' => 'required',
        ]);

        $store = Task::create([
<<<<<<< HEAD
            'title' => $request ->title, 
            'description' => $request ->description, 
            'status' => $request ->status, 
            'due_date' => $request ->due_date, 
            'category_id' => $request ->category_id, 
            'user_id' => $request ->user_id, 
        ]);

        return new Apiresource(
            $store, "berhasil","true"

=======
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);

        return new Apiresource (
            $store, "berhasil", "true"
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Task = Task::find($id);
<<<<<<< HEAD
        //return response()->json([
            //"pesan"=> "Berhasil",
            //"Status"=> "Completed",
            //"data" => $Task]);
        
            return new Apiresource(
                $Task,"berhasil","true"
    
            );  
        
=======
        // return response()->json([
            // "pesan" => "Berhasil", 
            // "status" => "Completed", 
            // "data" =>  $Task]);
        return new Apiresource (
            $Task, "berhasil", "true"
        );

>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
<<<<<<< HEAD
        //
=======
        
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
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
<<<<<<< HEAD
        $Task -> delete();

        return new Apiresource(
            $Task,"berhasil dihapus","false"

        );  
=======
        $Task->delete();
        return new Apiresource (
            $Task, "Berhasil di hapus", "true"
        ); 
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
    }
}
