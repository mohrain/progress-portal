<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeActivitycontroller extends Controller
{
    public function activities(Committee $committee)
    {
        $committee->load('activities');

        return view('committee.activities', [
            'committee' => $committee,
        ]);
    }

    public function createActivityForm(Committee $committee)
    {
        return view('committee.activity-form', [
            'committee' => $committee,
            'activity' => new Activity(),
            'updateMode' => false,
        ]);
    }

    public function storeActivity(Committee $committee, Request $request)
    {
        $committee->activities()->create(
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
            ]),
        );

        return redirect()->route('committee.activities', $committee);
    }

    public function editActivity(Committee $committee, Activity $activity)
    {
        return view('committee.activity-form', [
            'committee' => $committee,
            'activity' => $activity,
            'updateMode' => true,
        ]);
    }

    public function updateActivity(Committee $committee, Activity $activity, Request $request)
    {
        $activity->update(
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
            ]),
        );

        return redirect()->route('committee.activities', $committee);
    }

    public function destroy(Committee $committee, Activity $activity)
    {
        $activity->delete();
        return redirect()->back();
    }
}
