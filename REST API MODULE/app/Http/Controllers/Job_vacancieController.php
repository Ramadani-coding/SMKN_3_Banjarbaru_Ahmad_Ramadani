<?php

namespace App\Http\Controllers;

use App\Http\Resources\Job_vacancieResource;
use App\Models\Job_vacancie;
use Illuminate\Http\Request;

class Job_vacancieController extends Controller
{
    public function index()
    {
        $datas = Job_vacancie::all();

        return Job_vacancieResource::collection($datas);
    }

    public function show($id)
    {
        $data = Job_vacancie::find($id);

        return Job_vacancieResource::make($data);
    }
}
