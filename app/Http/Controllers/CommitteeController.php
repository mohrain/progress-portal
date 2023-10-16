<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Notice;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index()
    {
        return view('committee.index', [
            'committees' => Committee::latest()->get()
        ]);
    }

    public function create()
    {
        return view('committee.create', [
            'committee' => new Committee()
        ]);
    }

    public function store(Request $request)
    {
        $committee = Committee::create(
            $request->validate([
                'name' => 'required'
            ])
        );

        return redirect()->route('committee.show-about-form', $committee);
    }

    public function general(Committee $committee)
    {
        return view('committee.general', [
            'committee' => $committee
        ]);
    }

    public function update(Committee $committee, Request $request)
    {
        $committee->update($request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]));

        return redirect()->back();
    }

    public function showAboutForm(Committee $committee)
    {
        return view('committee.about', [
            'committee' => $committee
        ]);
    }

    public function saveAbout(Committee $committee, Request $request)
    {
        $committee->update(['about' => $request->about]);

        return redirect()->back();
    }

    public function showResponsibilityForm(Committee $committee)
    {
        return view('committee.responsibility', [
            'committee' => $committee
        ]);
    }

    public function saveResponsibility(Committee $committee, Request $request)
    {
        $committee->update(['responsibilities' => $request->responsibilities]);

        return redirect()->back();
    }
}
