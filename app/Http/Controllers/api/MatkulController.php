<?php

namespace App\Http\Controllers\api;

use App\Models\Matkul;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Matkul::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matkul = Matkul::create($request->all());
        return response()->json($matkul, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Matkul::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());
        return response()->json($matkul, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matkul::destroy($id);
        return response()->json(null, 204);
    }

    public function getDosensByMatkul($kode_matkul)
    {
        $matkul = Matkul::where('kode_makul', $kode_matkul)->with('dosens')->first();

        if ($matkul) {
            return response()->json($matkul->dosens);
        }

        return response()->json(['message' => 'Mata kuliah tidak ditemukan'], 404);
    }
}
