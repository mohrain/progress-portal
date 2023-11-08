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
        $districts = District::orderBy('name')->get();

        return view('members.index', compact('members', 'districts'));
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
            ->with('success', 'सदस्य दर्ता समपन्न भयो');
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
            ->with('success', 'सदस्य सम्पादन समपन्न भयो');
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
            ->with('success', 'सदस्य हटाइयो');
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
            ->currentElection()
            ->positioned()
            ->paginate(60);
        $districts = District::orderBy('name')->get();

        return view('frontend.members.index', compact('members', 'districts'));
    }

    public function frontendIndexOld()
    {
        $members = Member::with('election', 'parliamentaryParty')
            ->oldElection()
            ->positioned()
            ->paginate(60);
        $districts = District::orderBy('name')->get();

        return view('frontend.members.old-index', compact('members', 'districts'));
    }

    public function search(Request $request)
    {
        $members = new Member();
        if ($request->has('name')) {
            if ($request->name != null) {
                $members = $members->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('election_id')) {
            if ($request->election_id != null) {
                $members = $members->where('election_id', $request->election_id);
            }
        }

        if ($request->has('parliamentary_party_id')) {
            if ($request->parliamentary_party_id != null) {
                $members = $members->where('parliamentary_party_id', $request->parliamentary_party_id);
            }
        }
        if ($request->has('election_process')) {
            if ($request->election_process != null) {
                $members = $members->where('election_process', $request->election_process);
            }
        }
        if ($request->has('election_district')) {
            if ($request->election_district != null) {
                $members = $members->where('election_district', $request->election_district);
            }
        }
        if ($request->election_area != null) {
            $members = $members->where('election_area', 'like', '%' . $request->election_area . '%');
        }
        if ($request->name_english != null) {
            $members = $members->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $members = $members->where('gender', $request->gender);
            }
        }
        if ($request->has('email')) {
            if ($request->email != null) {
                $members = $members->where('email', $request->email);
            }
        }
        if ($request->has('mobile')) {
            if ($request->mobile != null) {
                $members = $members->where('mobile', $request->mobile);
            }
        }

        if ($request->has('resident_contact_numbe')) {
            if ($request->resident_contact_numbe != null) {
                $members = $members->where('resident_contact_numbe', $request->resident_contact_numbe);
            }
        }
        if ($request->has('dob')) {
            if ($request->dob != null) {
                $members = $members->where('dob', $request->dob);
            }
        }
        if ($request->birth_place != null) {
            $members = $members->where('birth_place', 'like', '%' . $request->birth_place . '%');
        }
        if ($request->has('permanent_address_district')) {
            if ($request->permanent_address_district != null) {
                $members = $members->where('permanent_address_district', $request->permanent_address_district);
            }
        }

        if ($request->permanent_address != null) {
            $members = $members->where('permanent_address', 'like', '%' . $request->permanent_address . '%');
        }
        if ($request->has('temporary_address_district')) {
            if ($request->temporary_address_district != null) {
                $members = $members->where('temporary_address_district', $request->temporary_address_district);
            }
        }
        if ($request->temporary_address != null) {
            $members = $members->where('temporary_address', 'like', '%' . $request->temporary_address . '%');
        }
        if ($request->father_name != null) {
            $members = $members->where('father_name', 'like', '%' . $request->father_name . '%');
        }
        if ($request->mother_name != null) {
            $members = $members->where('mother_name', 'like', '%' . $request->mother_name . '%');
        }
        if ($request->spouse_name != null) {
            $members = $members->where('spouse_name', 'like', '%' . $request->spouse_name . '%');
        }
        if ($request->child != null) {
            $members = $members->where('child', 'like', '%' . $request->child . '%');
        }
        if ($request->education != null) {
            $members = $members->where('education', 'like', '%' . $request->education . '%');
        }

        if ($request->has('religion')) {
            if ($request->religion != null) {
                $members = $members->where('religion', $request->religion);
            }
        }
        if ($request->has('mother_tongue')) {
            if ($request->mother_tongue != null) {
                $members = $members->where('mother_tongue', $request->mother_tongue);
            }
        }

        $members = $members->with('election', 'parliamentaryParty')->paginate(50);
        $members->appends(request()->except('page'));

        $districts = District::orderBy('name')->get();
        return view('members.index', compact('members', 'districts'));
    }

    public function frontendSearch(Request $request)
    {
        $members = new Member();
        if ($request->has('name')) {
            if ($request->name != null) {
                $members = $members->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('election_id')) {
            if ($request->election_id != null) {
                $members = $members->where('election_id', $request->election_id);
            }
        }

        if ($request->has('parliamentary_party_id')) {
            if ($request->parliamentary_party_id != null) {
                $members = $members->where('parliamentary_party_id', $request->parliamentary_party_id);
            }
        }
        if ($request->has('election_process')) {
            if ($request->election_process != null) {
                $members = $members->where('election_process', $request->election_process);
            }
        }
        if ($request->has('election_district')) {
            if ($request->election_district != null) {
                $members = $members->where('election_district', $request->election_district);
            }
        }
      
        if ($request->name_english != null) {
            $members = $members->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $members = $members->where('gender', $request->gender);
            }
        }
        $members = $members
            ->currentElection()
            ->positioned()
            ->paginate(60);
        $members->appends(request()->except('page'));

        $districts = District::orderBy('name')->get();

        return view('frontend.members.index', compact('members', 'districts'));
    }

    public function frontendOldSearch(Request $request)
    {
        $members = new Member();
        if ($request->has('name')) {
            if ($request->name != null) {
                $members = $members->where('name', 'like', '%' . $request->name . '%');
            }
        }
        if ($request->has('election_id')) {
            if ($request->election_id != null) {
                $members = $members->where('election_id', $request->election_id);
            }
        }

        if ($request->has('parliamentary_party_id')) {
            if ($request->parliamentary_party_id != null) {
                $members = $members->where('parliamentary_party_id', $request->parliamentary_party_id);
            }
        }
        if ($request->has('election_process')) {
            if ($request->election_process != null) {
                $members = $members->where('election_process', $request->election_process);
            }
        }
        if ($request->has('election_district')) {
            if ($request->election_district != null) {
                $members = $members->where('election_district', $request->election_district);
            }
        }
      
        if ($request->name_english != null) {
            $members = $members->where('name_english', 'like', '%' . $request->name_english . '%');
        }
        if ($request->has('gender')) {
            if ($request->gender != null) {
                $members = $members->where('gender', $request->gender);
            }
        }
        $members = $members
            ->oldElection()
            ->positioned()
            ->paginate(60);
        $members->appends(request()->except('page'));

        $districts = District::orderBy('name')->get();

        return view('frontend.members.old-index', compact('members', 'districts'));
    }
}
