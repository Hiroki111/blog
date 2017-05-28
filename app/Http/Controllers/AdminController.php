<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $request;
    protected $post;

    public function __construct(Request $request, Post $post)
    {
        $this->middleware('auth');
        $this->post    = $post;
        $this->request = $request;
    }

    public function index()
    {
        return view('auth.index', [
            'posts' => $this->post->all(),
        ]);
    }

    public function create()
    {
        return view('auth.edit');
    }

    public function store(StoreBlogPostRequest $request)
    {
        $this->post->create([
            'title'   => $this->request->input('title'),
            'active'  => ($this->request->input('active') === "on") ? 1 : 0,
            'body'    => $this->request->input('body'),
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('createPost')
            ->with('message', "New : " . $this->request->input('title', '') . ' was added');
    }

}
