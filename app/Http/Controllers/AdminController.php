<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Post;
use Auth;
use Carbon\Carbon;
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
            'title'        => $this->request->input('title'),
            'active'       => ($this->request->input('active') === "on") ? 1 : 0,
            'body'         => $this->request->input('body'),
            'user_id'      => Auth::user()->id,
            'published_at' => ($this->request->input('active') === "on") ? Carbon::now() : null,
        ]);

        return redirect()->route('createPost')
            ->with('message', "New : " . $this->request->input('title', '') . ' was added');
    }

    public function edit($id)
    {
        return view('auth.edit', [
            'post' => $this->post->find($id),
        ]);
    }

    public function update($id, StoreBlogPostRequest $request)
    {

        $editedPost = $this->post->find($id);
        $editedPost->fill($this->request->all());
        $editedPost->active = ($this->request->input('active') === "on") ? 1 : 0;
        if (empty($editedPost->published_at) && $this->request->input('active') === "on") {
            $editedPost->published_at = Carbon::now();
        }
        $editedPost->save();
        return redirect()->route('editPost', [
            'id' => $id,
        ])
            ->with('message', 'Updated.');
    }

    public function destroy($id)
    {
        $post = $this->post->find($id);
        $this->post->destroy($id);

        return redirect('/admin')->with('message', 'Post # ' . $id . ' deleted.');
    }

}
