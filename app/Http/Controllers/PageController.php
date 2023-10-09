<?php

namespace App\Http\Controllers;

use App\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->paginate(50);
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page = null)
    {
        if (!$page) {
            $page = new Page();
        }
        return view('pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $data = $request->validated();
        // return $data;
        if ($request->file('feature_image')) {
            $data['feature_image'] = Storage::putFile('page-feature-image', $request->file('feature_image'));
        }
        $page = Page::create($data);
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $page->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('page-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()
            ->route('pages.index')
            ->with('success', 'पेज सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('frontend.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return $this->create($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $data = $request->validated();

        if ($request->file('feature_image')) {
            if ($page->feature_image) {
                Storage::delete($page->feature_image);
            }
            $data['feature_image'] = Storage::putFile('page-feature-image', $request->file('feature_image'));
        }

        $page->update($data);
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $page->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('page-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()
            ->route('pages.edit', $page)
            ->with('success', 'पेज सम्पादन भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        foreach ($page->documents() as $pageDocument) {
            Storage::delete($pageDocument->file);
        }
        $page->documents()->delete();
        Storage::delete($page->feature_image);
        $page->delete();
        return redirect()
            ->back()
            ->with('success', 'पेज हटाइयो');
    }
}
