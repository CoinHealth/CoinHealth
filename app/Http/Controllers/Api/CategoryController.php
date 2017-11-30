<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get($type)
    {
        $categories = Category::where('category_code', 'like', $type."0%")->get();
        return response()->json([
            'data' => $categories,
        ]);
    }
}
