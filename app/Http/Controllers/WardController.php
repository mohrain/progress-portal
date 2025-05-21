<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\WardRequest;
use App\Models\Employee;
use App\Models\Member;
use App\Post;
use App\User;
use App\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class WardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:super-admin|admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wards = Ward::all('id', 'name', 'name_en');
        $ward = new Ward();
        return view('ward.index', compact(['wards', 'ward']));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WardRequest $request)
    {
        Ward::create($request->all());

        return redirect()->back()->with('success', 'वडा थप गर्न सफल');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        //
        return view('ward.intro', compact('ward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        $wards = Ward::all('id', 'name', 'name_en');
        return view('ward.index', compact(['wards', 'ward']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(WardRequest $request, Ward $ward)
    {


        $ward->update($request->validated());

        return redirect()->back()->with('success', 'वडा सफलतापूर्वक अपडेट गरिएको छ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ward $ward)
    {
        if ($ward->organizations()->exists()) {
            return redirect()->route('ward.index')->with('error', 'हटाउँदा त्रुटि। व्यवसायहरू यस क्षेत्रमा अवस्थित छन्।');
        }

        $ward->delete();
        return redirect()->route('ward.index')->with('success', 'वडा हटाइएको छ');
    }


    public function duty(Ward $ward)
    {
        return view('ward.work_duty', compact('ward'));
    }

    public function workUpdate(Request $request, Ward $ward)
    {

        $request->validate([
            'work_duty' => 'required'
        ]);

        $ward->update([
            'work_duty' => $request->work_duty
        ]);

        return redirect()->back()->with('success', 'वडा सफलतापूर्वक अपडेट गरिएको छ');
    }

    public function wardFront(Ward $ward)
    {
        $members = Member::with('officeDesignation')->currentElection()->where('ward_number', $ward->name_en)->positioned()->get();

        $news = $ward->posts()->with('postCategories')
            ->latest()
            ->take(5)->get();

        $downloads = $ward->downloads()->take(5)->get();

        return view('ward.ward-view-front', compact('ward', 'members', 'news', 'downloads'));
    }

    public function wardFrontend($ward)
    {
        return "yes";
    }
    public function notices(Ward $ward)
    {
        $posts = $ward->posts()->with('postCategories')
            ->latest()
            ->paginate(50);
        // $posts = Post::with('postCategories')
        //     ->latest()
        //     ->paginate(50);
        return view('ward.notice', compact('posts', 'ward'));
    }

    public function noticesCreate(Ward $ward)
    {

        $post = new Post();
        return view('ward.notice-create', compact('post', 'ward'));
    }

    public function storeNotices(StorePostRequest $request, Ward $ward)
    {
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

        $post->wards()->attach([$ward->id]);

        return redirect()->back()->with('success', 'वडा सफलतापूर्वक अपडेट गरिएको छ');
    }
    public function members(Ward $ward)
    {
        $members = Member::with('officeDesignation')->currentElection()->where('ward_number', $ward->name_en)->positioned()->get();
        return view('ward.members', compact('members', 'ward'));
    }
}
