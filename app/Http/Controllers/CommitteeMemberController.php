<?php

namespace App\Http\Controllers;

use App\Http\Requests\Committee\MemberStoreRequest;
use App\Http\Requests\Committee\MemberUpdateRequest;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommitteeMemberController extends Controller
{
    public function members(Committee $committee)
    {
        $committee->load('members');

        return view('committee.members', [
            'committee' => $committee
        ]);
    }

    public function create(Committee $committee)
    {
        return view('committee.member-form', [
            'committee' => $committee,
            'member' => new CommitteeMember(),
            'updateMode' => false
        ]);
    }

    public function store(Committee $committee, MemberStoreRequest $request)
    {
        $committee->members()->create(
            $request->only(['name', 'designation'])
                + [
                    'photo' => $request->file('photo')->store('committee-members')
                ]
        );

        return redirect()->route('committee.members', $committee);
    }

    public function edit(Committee $committee, CommitteeMember $member)
    {
        return view('committee.member-form', [
            'committee' => $committee,
            'member' => $member,
            'updateMode' => true
        ]);
    }

    public function update(Committee $committee, CommitteeMember $member, MemberUpdateRequest $request)
    {
        $member->update($request->only(['name', 'designation']));

        if ($request->hasFile('photo')) {
            Storage::delete($member->photo);
            $member->update(['photo' => $request->file('photo')->store('committee-members')]);
        }

        return redirect()->route('committee.members', $committee);
    }
}
