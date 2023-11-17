<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request) {
        $searchQuery = $request->input('query');
        $categoryFilter = $request->input('category');
        $perPage = 6;
        $blogs = Blog::when($searchQuery, function ($query) use ($searchQuery) {
            // $query->where('judul', 'like', '%' . $searchQuery . '%');
            $query->where(function ($subQuery) use ($searchQuery) {
                $subQuery->where('judul', 'like', '%' . $searchQuery . '%')
                         ->orWhere('category', 'like', '%' . $searchQuery . '%');
            });
        })->paginate($perPage);

        $categories = Blog::distinct('category')->pluck('category');
        

        return view('blog.index', compact(
            'blogs', 'searchQuery', 'categoryFilter', 'categories'
        ));
    }

    public function show($id) {
        $blog = Blog::findorfail($id);
        return view('blog.show', compact(
            'blog'
        ));
    }
}
