<?php

namespace App\Http\Controllers;

use App\Models\MeetingType;
use App\Http\Requests\StoreMeetingTypeRequest;
use App\Http\Requests\UpdateMeetingTypeRequest;
use Illuminate\Http\Request;

class MeetingTypeController extends Controller
{
    public function index()
    {
        $meetingTypes = MeetingType::latest()->get();
        return view('meeting-types.index', compact('meetingTypes'))->with('meetingType', new MeetingType());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MeetingType::create($validated);

        return redirect()->back()->with('success', 'बैठक प्रकार सफलतापूर्वक थपियो');
    }

    public function edit(MeetingType $meetingType)
    {
        $meetingTypes = MeetingType::latest()->get();
        return view('meeting-types.index', compact('meetingType', 'meetingTypes'));
    }

    public function update(Request $request, MeetingType $meetingType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $meetingType->update($validated);

        return redirect()->route('meeting-types.index')->with('success', 'बैठक प्रकार सफलतापूर्वक सम्पादन गरियो');
    }

    public function destroy(MeetingType $meetingType)
    {
        $meetingType->delete();

        return redirect()->back()->with('success', 'बैठक प्रकार सफलतापूर्वक हटाइयो');
    }
}
