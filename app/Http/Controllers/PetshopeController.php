<?php

namespace App\Http\Controllers;

use App\Models\Petshope;
use Illuminate\Http\Request;

class PetshopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Petshopes = Petshope::all();
        
        $response = [
            'message' => 'Success Showing All Petshopes Data',
            'data' => $Petshopes
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
       $input = [
        'nama' => $request->nama,
        'jenis' => $request->jenis,
        'status' => $request->status,

       ];

       $petshopes = Petshope::create($input);
                    
       $response = [
        'message' => 'Successfully create new petshope',
        'data' => $petshopes
       ];
       
       return response()->json($response, 201);
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


    /**
     * Display the specified resource.
     */
    public function show(Petshope $petshope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petshope $petshope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petshope $petshope)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petshope $petshope)
    {
        //
    }
}
