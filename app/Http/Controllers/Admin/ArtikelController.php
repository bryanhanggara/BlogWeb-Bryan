<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class ArtikelController extends Controller
{
    public function index() {

        return view('admin.index', [
            'blog' => Blog::count(),
            'user' => User::count()
        ]);
    }
}
