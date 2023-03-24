<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Pagination\Paginator;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('admin.posts', compact('posts'));
    }
    public function store(Request $request)
    {
        $path = null;
        $isadmin = auth()->user()->hasRole('admin');
        if($request->hasFile('images')){
            $path = $request->images->store('public/posts');
            $path = 'storage'.substr($path,6);
        }
       
        BlogPost::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => $path,
            'status' => $isadmin?'aproved':pending,
            'posted_by' => $isadmin?'Admin':'Customers',
        ]);
        return back();
    }
    public function customerPost()
    {
        Paginator::useBootstrapFive();
        $posts = BlogPost::where('status', 'aproved')->orderBy('created_at', 'desc')->paginate(10);
        return view('customer-shop.blog-grid', compact('posts'));
    }
}
