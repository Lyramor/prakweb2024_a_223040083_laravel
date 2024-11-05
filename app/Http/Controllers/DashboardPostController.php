<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DashboardPost;
use Illuminate\Support\Facades\Auth;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); 

        return view('dashboard.posts.index', [
            'posts' => Post::where('author_id', $userId)->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);
    
        // Tambahkan author_id
        $validateData['author_id'] = Auth::id(); // Assign `author_id` dengan ID pengguna saat ini
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        Post::create($validateData);
        
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' =>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Definisikan aturan validasi
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
        ];
    
        // Cek apakah slug diubah, jika ya, pastikan slug unik
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
    
        // Validasi data berdasarkan aturan yang didefinisikan
        $validatedData = $request->validate($rules);
    
        // Tambahkan user_id dan excerpt untuk pembaruan data
        $validatedData['user_id'] = Auth::id();
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        // Update data post di database
        $post->update($validatedData);
    
        // Redirect ke halaman daftar post dengan pesan sukses
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        
        return redirect('/dashboard/posts')->with('success', 'New post has been deleted!');
    }
}
