<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dosen::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validasi data yang diterima
        $request->validate([
            'id_dosen' => 'required|unique:dosen,id_dosen',
            'nama_dosen' => 'required|string|max:255',
            'pengajar_prodi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Membuat instance baru dari model dosen
        $save = new dosen;
        $save->id_dosen = $request->id_dosen;
        $save->nama_dosen = $request->nama_dosen;
        $save->pengajar_prodi = $request->pengajar_prodi;
        $save->deskripsi = $request->deskripsi;
        $save->alamat = $request->alamat;

        // Menyimpan data ke database
        $save->save();

        // Mengembalikan respons setelah menyimpan data
        return response()->json(['message' => 'Data dosen berhasil disimpan!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = dosen::all()->where('id', $request->id)->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        // Temukan data dosen berdasarkan ID
        $save = Dosen::find($id);
        
        // Pastikan data dosen ditemukan
        if (!$save) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        // Update data dosen dengan data dari request
        $save->id_dosen = $request->id_dosen;
        $save->nama_dosen = $request->nama_dosen;
        $save->pengajar_prodi = $request->pengajar_prodi;
        $save->deskripsi = $request->deskripsi;
        $save->alamat = $request->alamat;

        // Simpan perubahan
        $save->save();

        // Kembalikan respon sukses
        return response()->json(['message' => 'Dosen updated successfully', 'data' => $save], 200);
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
        //
    }
}
