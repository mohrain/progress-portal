<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postCategories')
        ->latest()
        ->paginate(50);
    return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post = null)
    {
        if (!$post) {
            $post = new Post();
        }
        return view('post.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //  return $request;
        $data = $request->validated();
        // return $data;
        if ($request->file('feature_image')) {
            $data['feature_image'] = Storage::putFile('feature-image', $request->file('feature_image'));
        }

        $post = Post::create($data);
        $post->postCategories()->attach($data['post_category_id']);
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $post->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('post-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()
            ->route('posts.index')
            ->with('success', 'पोस्ट सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('frontend.posts.show', compact('post'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return $this->create($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->file('feature_image')) {
            if ($post->feature_image) {
                Storage::delete($post->feature_image);
            }
            $data['feature_image'] = Storage::putFile('feature-image', $request->file('feature_image'));
        }

        $post->update($data);
        $post->postCategories()->sync($data['post_category_id']);
        // return  $request->name;
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $post->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('post-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()
            ->back()
            ->with('success', 'पोस्ट सम्पादन');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        foreach ($post->documents() as $postDocument) {
            Storage::delete($postDocument->file);
        }
        $post->documents()->delete();
        $post->postCategories()->detach();

        Storage::delete($post->feature_image);
        $post->delete();
        return redirect()
            ->back()
            ->with('success', 'पोस्ट हटाइयो');
    }
}
