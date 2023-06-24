<?php

namespace App\Http\Controllers;

use App\Models\Job_categorie;
use Illuminate\Http\Request;

class Job_categorieController extends Controller
{
    public function index()
    {
        $datas = Job_categorie::all();

        return response()->json($datas);
    }
}
