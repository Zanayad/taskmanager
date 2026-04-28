<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'color' => 'required|string|max:7',
        ]);

        $category = Auth::user()->categories()->create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
            'color' => $category->color,
        ]);
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }
}