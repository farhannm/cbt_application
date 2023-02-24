<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamsDetailResource;
use App\Http\Resources\ExamsResource;
use Illuminate\Http\Request;
use App\Models\Exams;

class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exams::all();
//        return response()->json(['data' => $exams]);
        return ExamsResource::collection($exams);
    }

    public function showDetail($id)
    {
        $exam = Exams::with('oleh:id,name')->findOrFail($id);
        return new ExamsDetailResource($exam);
    }


}
