<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class MedicalController extends Controller
{
    public function getMedicalProblems()
    {
        $problems = Category::medicalProblems()->get();
        return response()->json([
            'data' => $problems,
        ]);
    }
}
