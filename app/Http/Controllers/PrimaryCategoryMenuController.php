<?php

namespace App\Http\Controllers;

use App\Models\PrimaryCategoryMenu;
use App\Http\Requests\StorePrimaryCategoryMenuRequest;
use App\Http\Requests\UpdatePrimaryCategoryMenuRequest;
use App\PostCategory;
use App\PostCategoryMenu;
use Illuminate\Http\Request;

class PrimaryCategoryMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrimaryCategoryMenu $primaryCategoryMenu = null)
    {
        //
        $postCategoryMenus = PrimaryCategoryMenu::positioned()->get();
        $postCategories = PostCategory::with(['childCategories.childCategories'])
            ->whereNotIn('id', function ($query) {
                $query->select('post_category_id')->from('post_category_menus');
            })
            ->latest()
            ->get();

        if (!$primaryCategoryMenu) {
            $primaryCategoryMenu = new PrimaryCategoryMenu();
        }

        return view('menus.category-menu', compact(['postCategoryMenus', 'postCategories', 'primaryCategoryMenu']));
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
     * @param  \App\Http\Requests\StorePrimaryCategoryMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrimaryCategoryMenuRequest $request)
    {
        //
        $primaryCategoryMenu = new PrimaryCategoryMenu();
        $primaryCategoryMenu->category_name = 'catalog_menu';
        $primaryCategoryMenu->post_category_id = $request->post_category_id;
        $primaryCategoryMenu->display_name = $request->display_name ?? PostCategory::find($request->post_category_id)->name;
        $primaryCategoryMenu->position = 100;
        $primaryCategoryMenu->save();

        return redirect()
            ->back()
            ->with('success', 'Item added to menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimaryCategoryMenu  $primaryCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function show(PrimaryCategoryMenu $primaryCategoryMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrimaryCategoryMenu  $primaryCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimaryCategoryMenu $primaryCategoryMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrimaryCategoryMenuRequest  $request
     * @param  \App\Models\PrimaryCategoryMenu  $primaryCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrimaryCategoryMenuRequest $request, PrimaryCategoryMenu $primaryCategoryMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimaryCategoryMenu  $primaryCategoryMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimaryCategoryMenu $primaryCategoryMenu)
    {
        //
    }

    public function removeItem(Request $request)
    {

        $cat = PrimaryCategoryMenu::find($request->id);
        $cat->delete();


        return response()->json(['message' => 'Item removed'], 200);
    }

    public function sort(Request $request)
    {
        $menuItems = json_decode(json_encode($request->menuItems));

        foreach ($menuItems as $menuItem) {
            PrimaryCategoryMenu::whereId($menuItem->id)->update(['position' => $menuItem->position]);
        }

        return response()->json(['message' => 'Menu has been sorted'], 200);
    }

    public function primaryMenus()
    {
        $primaryMenus = PrimaryCategoryMenu::positioned()->get();
        $postCategoryIds = $primaryMenus->pluck('post_category_id')->unique()->toArray();

        // Now get the PostCategory models for those IDs
        $postCategories = PostCategory::whereIn('id', $postCategoryIds)->get();

        return response()->json($postCategories);
    }
}
