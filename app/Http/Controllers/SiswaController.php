<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiswaDetailResource;
use App\Http\Resources\SiswaResource;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
//        return response()->json(['data' => $siswa]);
        return SiswaResource::collection($siswa);
    }

    public function showDetail($id)
    {
        $siswa = Siswa::with('kelas:id,kelas', 'jurusan:id,jurusan')->findOrFail($id);
        return new SiswaDetailResource($siswa);
    }

}
