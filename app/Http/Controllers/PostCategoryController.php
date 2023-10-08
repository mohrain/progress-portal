<?php

namespace App\Http\Controllers;

use App\PostCategory;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostCategory $postCategory)
    {
        if (!$postCategory) {
            $postCategory = new PostCategory();
        }

        $postCategories = PostCategory::with(['childCategories.childCategories'])
            ->where('parent_id', null)
            ->orderBy('name')
            ->get();

        // $parentCategories = Category::with(['childCategories'])->where('parent_id', null)->actived()->orderBy('name')->get();

        return view('post-category.index', compact('postCategory', 'postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        PostCategory::create($request->validated());
        return redirect()
            ->route('post-categories.index')
            ->with('success', 'पोस्ट किसिम सुर्क्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        return $this->index($postCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryRequest  $request
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        $postCategory->update($request->validated());
        return redirect()
            ->route('post-categories.index')
            ->with('success', 'पोस्ट किसिम सम्पादन सम्पन्न');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return redirect()
            ->route('post-categories.index')
            ->with('success', 'पोस्ट किसिम हटाइयो');
    }
}
