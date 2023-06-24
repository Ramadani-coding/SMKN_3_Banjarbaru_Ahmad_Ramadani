<?php

namespace App\Http\Controllers;

use App\Http\Resources\ValidationResource;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidationController extends Controller
{
    public function index()
    {
       $datas =  Validation::all();

        return ValidationResource::collection($datas);
    }




    public function store(Request $request)
    {
        $request->validate([
            'work_experience' => 'required',
            'job_category_id' => 'required',
            'job_position' => 'required',
            'reason_accepted' => 'required'
        ]);

        $request['society_id'] = Auth::user()->id;
        Validation::create($request->all());

        return response()->json('Request data validation sent successful', 200);
    }
}
