<?php

namespace App\Http\Controllers;

use App\Models\ProvincialAssemblyLibrary;
use App\Http\Requests\StoreProvincialAssemblyLibraryRequest;
use App\Http\Requests\UpdateProvincialAssemblyLibraryRequest;
use Illuminate\Support\Facades\Storage;

class ProvincialAssemblyLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincialAssemblyLibraries = ProvincialAssemblyLibrary::latest()->paginate(50);
        return view('provincial-assembly-library.index', compact('provincialAssemblyLibraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProvincialAssemblyLibrary $provincialAssemblyLibrary = null)
    {
        if (!$provincialAssemblyLibrary) {
            $provincialAssemblyLibrary = new ProvincialAssemblyLibrary();
        }
        return view('provincial-assembly-library.create', compact('provincialAssemblyLibrary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProvincialAssemblyLibraryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvincialAssemblyLibraryRequest $request)
    {
        $data = $request->validated();
        // return $data;
        if ($request->file('cover_image')) {
            $data['cover_image'] = Storage::putFile('provincial-assembly-library-cover-image', $request->file('cover_image'));
        }
        $provincialAssemblyLibrary = ProvincialAssemblyLibrary::create($data);
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $provincialAssemblyLibrary->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('provincial-assembly-library-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()->route('provincial-assembly-library.index')->with('success', 'किताब सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProvincialAssemblyLibrary  $provincialAssemblyLibrary
     * @return \Illuminate\Http\Response
     */
    public function show(ProvincialAssemblyLibrary $provincialAssemblyLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProvincialAssemblyLibrary  $provincialAssemblyLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit(ProvincialAssemblyLibrary $provincialAssemblyLibrary)
    {
        return $this->create($provincialAssemblyLibrary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProvincialAssemblyLibraryRequest  $request
     * @param  \App\Models\ProvincialAssemblyLibrary  $provincialAssemblyLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvincialAssemblyLibraryRequest $request, ProvincialAssemblyLibrary $provincialAssemblyLibrary)
    {
        $data = $request->validated();
        // return $data;
        if ($request->file('cover_image')) {
            if ($provincialAssemblyLibrary->cover_image) {
                Storage::delete($provincialAssemblyLibrary->cover_image);
            }
            $data['cover_image'] = Storage::putFile('provincial-assembly-library-cover-image', $request->file('cover_image'));
        }
        $provincialAssemblyLibrary->update($data);
        if ($request->name != '' && $request->file != '') {
            foreach ($request->name as $key => $name) {
                $provincialAssemblyLibrary->documents()->create([
                    'name' => $name,
                    'file' => Storage::putFile('provincial-assembly-library-documents', $request->file('file')[$key]),
                ]);
            }
        }
        return redirect()->route('provincial-assembly-library.index')->with('success', 'किताब सम्पादन भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProvincialAssemblyLibrary  $provincialAssemblyLibrary
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProvincialAssemblyLibrary $provincialAssemblyLibrary)
    {
        foreach ($provincialAssemblyLibrary->documents() as $provincialAssemblyLibraryDocument) {
            Storage::delete($provincialAssemblyLibraryDocument->file);
        }
        $provincialAssemblyLibrary->documents()->delete();
        if ($provincialAssemblyLibrary->cover_image) {
            # code...
            Storage::delete($provincialAssemblyLibrary->cover_image);
        }
        $provincialAssemblyLibrary->delete();
        return redirect()
            ->back()
            ->with('success', 'किताब हटाइयो');
    }
}
