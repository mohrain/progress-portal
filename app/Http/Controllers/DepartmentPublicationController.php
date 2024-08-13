<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentPublication;
use Illuminate\Support\Facades\Storage;

class DepartmentPublicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'file' => 'required',
        ]);
        if ($request->file('file')) {
            $data['file'] = $request->file('file')->store('file');
        }
        $publication = DepartmentPublication::create($data);
        $department = Department::find($publication->department_id);
        return redirect()->route('department.publications', $department->slug)->with('success', "नयाँ प्रकाशन सफलतापुर्बक थपियो");
    }

    public function edit($slug, $id)
    {
        $publication = DepartmentPublication::find($id);

        $department = Department::where('slug', $slug)->first();
        $publications = DepartmentPublication::where('department_id', $department->id)->latest()->get();
        return view('deartments.backends.publicationCreate', compact('department', 'publications', 'publication'));

        // return view('deartments.backends.publicationCreate', compact('department', 'publication'));
    }

    public function update($slug, $id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'file' => 'nullable',
        ]);
        $publication = DepartmentPublication::find($id);
        if ($request->file('file')) {
            if ($publication->file) {
                Storage::delete($publication->file);
            }
            $data['file'] = $request->file('file')->store('file');
        }
        $publication->update($data);
        return redirect()->route('department.publications', $slug)->with('success', "प्रकाशन सफलतापुर्बक परिबर्तन भयो");
    }

    public function delete($id)
    {
        $publication = DepartmentPublication::find($id);

        if ($publication->file) {
            Storage::delete($publication->file);
        }

        $publication->delete();

        return redirect()->back()->with('success', "प्रकाशन सफलतापुर्बक हटाइयो");
    }

    public function detail($slug, $id)
    {
        $department = Department::where('slug', $slug)->first();
        $publication = DepartmentPublication::find($id);
        $fileUrl = 'storage/' . $publication->file;
        return response()->file($fileUrl);
        return view('deartments.fronts.noticeDetail', compact('department', 'publication'));
    }

    public function publicationFront($slug, Request $request)
    {
        $department = Department::with('publication')->where('slug', $slug)->first();
        $departments = Department::where('department_id', $department->id)->get();

        $publication = DepartmentPublication::where('department_id', $department->id)
            ->when($request->filled('start_date'), function ($query) {
                $query->where('created_at', '>=',  bs_to_ad(request('start_date')));
            })
            ->when($request->filled('end_date'), function ($query) {
                $query->where('created_at', '<=',  bs_to_ad(request('end_date')));
            })
            ->when($request->filled('keywords'), function ($query) {
                $query->where('name', 'like', '%' . (request('keywords')) . '%');
            });
        $publications = $publication->get();
        return view('deartments.fronts.publication', compact('department', 'publications', 'departments'));
    }
}
