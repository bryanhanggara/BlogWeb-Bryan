<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\blogRequest;
use App\Models\Blog;
use App\Models\User;

class CrudArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $blogs = Blog::all();
         return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('roles', 'ADMIN')->get();
        return view('admin.blog.create', compact(
            'user'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(blogRequest $request)
    {
        $data = $request->all();
    
        if ($request->hasFile('image_blog')) {
            $gambar = $request->file('image_blog');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/gallery'), $namaGambar);
    
            // Set nama file di dalam data yang akan disimpan ke database
            $data['image_blog'] = $namaGambar;
        }

         // Menggunakan $request->file() untuk mendapatkan file dari input 'head_image'
        if ($request->hasFile('head_image')) {
            $headImage = $request->file('head_image');
            $headImageName = time() . '_head_' . $headImage->getClientOriginalName();
            $headImage->move(public_path('assets/gallery'), $headImageName);

            // Set nama file di dalam data yang akan disimpan ke database
            $data['head_image'] = $headImageName;
        }
    
        Blog::create($data);
    
        return redirect()->route('blog.index')->with(
            'success',
            'Blog berhasil dibuat'
        );
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findorfail($id);
        return view('admin.blog.show', compact(
            'blog'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findorfail($id);
        $user = User::where('roles', 'ADMIN')->get();

        return view(
            'admin.blog.edit', compact('blog','user')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(blogRequest $request, string $id)
    {
        $data = $request->all();
    
        if ($request->hasFile('image_blog')) {
            $gambar = $request->file('image_blog');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/gallery'), $namaGambar);
    
            // Set nama file di dalam data yang akan disimpan ke database
            $data['image_blog'] = $namaGambar;
        }

         // Menggunakan $request->file() untuk mendapatkan file dari input 'head_image'
        if ($request->hasFile('head_image')) {
            $headImage = $request->file('head_image');
            $headImageName = time() . '_head_' . $headImage->getClientOriginalName();
            $headImage->move(public_path('path/to/store/images'), $headImageName);

            // Set nama file di dalam data yang akan disimpan ke database
            $data['head_image'] = $headImageName;
        }
    
        $blog = Blog::findorfail($id);
        $blog -> update($data);
    
        return redirect()->route('blog.index')->with(
            'success',
            'Blog berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findorfail($id);

        $blog -> delete();
        return redirect()->route('blog.index');
    }
}
