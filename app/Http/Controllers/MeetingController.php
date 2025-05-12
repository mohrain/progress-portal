<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\MeetingType;
use Illuminate\Support\Facades\Storage;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Meeting $meeting = null)
    {
        if (!$meeting) {
            $meeting = new Meeting();
        }
        $meetings = Meeting::with('meetingType')->get();
        $meetingTypes = MeetingType::get();
        return view('meetings.index', compact('meeting', 'meetings', 'meetingTypes'));
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
     * @param  \App\Http\Requests\StoreMeetingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('meeting_documents', 'public');
        }

        Meeting::create($data);

        return redirect()
            ->back()
            ->with('success', 'बैठक सुरक्षित भयो');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return $this->index($meeting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetingRequest  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $data = $request->validated();


        if ($request->hasFile('document')) {
            // Optionally delete the old document
            if ($meeting->document && Storage::disk('public')->exists($meeting->document)) {
                Storage::disk('public')->delete($meeting->document);
            }

            // Store new document
            $data['document'] = $request->file('document')->store('documents', 'public');
        }

        $meeting->update($data);
        return redirect()
            ->route('meetings.index')
            ->with('success', 'बैठक सम्पादन भयो');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()
            ->back()
            ->with('success', 'बैठक हटाइयो');
    }
}
