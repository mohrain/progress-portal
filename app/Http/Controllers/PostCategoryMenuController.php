<?php

namespace App\Http\Controllers;

use App\PostCategoryMenu;
use App\Http\Requests\StorePostCategoryMenuRequest;
use App\Http\Requests\UpdatePostCategoryMenuRequest;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostCategoryMenu $postCategoryMenu = null)
    {
        $postCategoryMenus = PostCategoryMenu::positioned()->get();
        $postCategories = PostCategory::with(['childCategories.childCategories'])
            ->where('parent_id', null)
            ->whereNotIn('id', function ($query) {
                $query->select('post_category_id')->from('primary_category_menus');
            })
            ->latest()
            ->get();

        if (!$postCategoryMenu) {
            $postCategoryMenu = new PostCategoryMenu();
        }

        return view('post-category-menu.index', compact(['postCategoryMenus', 'postCategories', 'postCategoryMenu']));
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
     * @param  \App\Http\Requests\StorePostCategoryMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryMenuRequest $request)
    {
        $postCategoryMenu = new PostCategoryMenu();
        $postCategoryMenu->category_name = 'catalog_menu';
        $postCategoryMenu->post_category_id = $request->post_category_id;
        $postCategoryMenu->display_name = $request->display_name ?? PostCategory::find($request->post_category_id)->name;
        $postCategoryMenu->position = 100;
        $postCategoryMenu->save();

        return redirect()
            ->back()
            ->with('success', 'Item added to menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategoryMenu  $postCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategoryMenu $postCategoryMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategoryMenu  $postCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategoryMenu $postCategoryMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostCategoryMenuRequest  $request
     * @param  \App\PostCategoryMenu  $postCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryMenuRequest $request, PostCategoryMenu $postCategoryMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategoryMenu  $postCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategoryMenu $postCategoryMenu)
    {
        //
    }

    public function removeItem(Request $request)
    {
        PostCategoryMenu::find($request->id)->delete();

        return response()->json(['message' => 'Item removed'], 200);
    }

    public function sort(Request $request)
    {
        $menuItems = json_decode(json_encode($request->menuItems));

        foreach ($menuItems as $menuItem) {
            PostCategoryMenu::whereId($menuItem->id)->update(['position' => $menuItem->position]);
        }

        return response()->json(['message' => 'Menu has been sorted'], 200);
    }
}
