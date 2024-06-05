<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Notice;
use Illuminate\Http\Request;

class CommitteeNoticecontroller extends Controller
{
    public function notices(Committee $committee)
    {
       $committee->load('notices');

        return view('committee.notices', [
            'committee' => $committee,
        ]);
    }

    public function createNoticeForm(Committee $committee)
    {
        return view('committee.notice-form', [
            'committee' => $committee,
            'notice' => new Notice(),
            'updateMode' => false,
        ]);
    }

    public function storeNotice(Committee $committee, Request $request)
    {
        $committee->notices()->create(
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
            ]),
        );

        return redirect()->route('committee.notices', $committee);
    }

    public function editNotice(Committee $committee, Notice $notice)
    {
        return view('committee.notice-form', [
            'committee' => $committee,
            'notice' => $notice,
            'updateMode' => true,
        ]);
    }

    public function updateNotice(Committee $committee, Notice $notice, Request $request)
    {
        $notice->update(
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
            ]),
        );

        return redirect()->route('committee.notices', $committee);
    }

    public function destroy(Committee $committee, Notice $notice)
    {
        $notice->delete();
        return redirect()->back();
    }

    public function sms(Committee $committee, Notice $notice)
    {
        $message = $notice->description;
        $committeeMembers = $committee
            ->members()
            ->with('member')
            ->get();

        foreach ($committeeMembers as $itme) {
            $committeeMember[] = $itme->member;
            # ode...
        }

        return view('sms.index', compact('message', 'committeeMember','committee'));
    }
}
