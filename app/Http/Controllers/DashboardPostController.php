<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        return $request;
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
    public function edit(DashboardPost $dashboardPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DashboardPost $dashboardPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardPost $dashboardPost)
    {
        //
    }
}
