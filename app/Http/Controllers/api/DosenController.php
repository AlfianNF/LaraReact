<?php

namespace App\Http\Controllers\Api;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Dosen::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Dosen::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Dosen::destroy($id);
        return response()->json(null, 204);
    }
}
