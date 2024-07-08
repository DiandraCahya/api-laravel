<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\murid;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = murid::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $dataMurid = murid::create($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa berhasil ditambahkan',
            'data' => $dataMurid
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $mahasiswa = murid::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        return response()->json($mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $murid = murid::find($id);
        if (!$murid) {
            return response()->json([
                'status' => false,
                'message' => 'Data mahasiswa tidak ditemukan',
            ], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $murid->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => $murid
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $murid = murid::find($id);
        if (!$murid) {
            return response()->json([
                'status' => false,
                'message' => 'Data mahasiswa tidak ditemukan',
            ], 404);
        }

        $murid->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa berhasil dihapus',
        ], 200);
    }
}
