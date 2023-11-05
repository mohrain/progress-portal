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
        $committeeMembers = $committee
            ->members()
            ->with('member')
            ->get();
        $committee->load('members');

        return view('committee.members', [
            'committee' => $committee,
            'committeeMembers' => $committeeMembers,
        ]);
    }

    public function create(Committee $committee)
    {
        return view('committee.member-form', [
            'committee' => $committee,
            'member' => new CommitteeMember(),
            'updateMode' => false,
        ]);
    }

    public function store(Committee $committee, MemberStoreRequest $request)
    {
        $committee->members()->create($request->validated());

        return redirect()->route('committee.members', $committee);
    }

    public function edit(Committee $committee, CommitteeMember $member)
    {
        return view('committee.member-form', [
            'committee' => $committee,
            'member' => $member,
            'updateMode' => true,
        ]);
    }

    public function update(Committee $committee, CommitteeMember $member, MemberUpdateRequest $request)
    {
        $member->update($request->only(['name', 'designation']));
        $member->update($request->validated());

        return redirect()->route('committee.members', $committee);
    }

    public function destroy(Committee $committee, CommitteeMember $member){
        $member->delete();
        return redirect()->back();
    }
}
