<?php

namespace App\Http\Controllers;

use App\District;
use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::with('election', 'parliamentaryParty')
            ->positioned()
            ->paginate(60);
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member = null)
    {
        if (!$member) {
            $member = new Member();
        }
        $districts = District::orderBy('name')->get();
        return view('members.create', compact('member', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $data = $request->validated();
        if ($request->file('profile')) {
            $data['profile'] = Storage::putFile('profile', $request->file('profile'));
        }
        Member::create($data);
        return redirect()
            ->route('members.index')
            ->with('success', 'Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('frontend.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return $this->create($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $data = $request->validated();
        if ($request->file('profile')) {
            if ($member->profile) {
                Storage::delete($member->profile);
            }
            $data['profile'] = Storage::putFile('profile', $request->file('profile'));
        }
        $member->update($data);
        return redirect()
            ->route('members.index')
            ->with('success', 'Member updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Storage::delete($member->profile);
        $member->delete();
        return redirect()
            ->back()
            ->with('success', 'Member Deleted');
    }

    public function sort(Request $request)
    {
        $members = json_decode(json_encode($request->members));

        foreach ($members as $member) {
            Member::whereId($member->id)->update(['position' => $member->position]);
        }

        return response()->json(['message' => 'member has been sorted'], 200);
    }

    public function frontendIndex()
    {
        $members = Member::with('election', 'parliamentaryParty')
            ->where('election_id', settings('election_id'))
            ->positioned()
            ->paginate(60);
        return view('frontend.members.index', compact('members'));
    }

    public function frontendIndexOld()
    {
        $members = Member::with('election', 'parliamentaryParty')
            ->whereNotIn('election_id', [settings('election_id')])
            ->positioned()
            ->paginate(60);
        return view('frontend.members.index', compact('members'));
    }
}
