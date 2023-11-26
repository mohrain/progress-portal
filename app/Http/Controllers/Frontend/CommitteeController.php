<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function show(Committee $committee)
    {
        return view('frontend.committee.show', [
            'title' => $committee->name,
            'committee' => $committee,
        ]);
    }

    public function responsibilities(Committee $committee)
    {
        return view('frontend.committee.responsibilities', [
            'title' => $committee->name,
            'committee' => $committee,
        ]);
    }

    public function notices(Committee $committee)
    {
        $notices = $committee
            ->notices()
            ->when(request()->filled('start_date'), fn($q) => $q->whereDate('created_at', '>=', Carbon::parse(bs_to_ad(request('start_date')))->startOfDay()))
            ->when(request()->filled('end_date'), fn($q) => $q->whereDate('created_at', '<=', Carbon::parse(bs_to_ad(request('end_date')))->endOfDay()))
            ->when(request()->filled('keyword'), fn($q) => $q->where('title', 'like', '%' . request('keyword') . '%'))
            ->get();

        return view('frontend.committee.notices', [
            'title' => $committee->name,
            'committee' => $committee,
            'notices' => $notices,
        ]);
    }

    public function noticeShow(Committee $committee, Notice $notice)
    {
        return view('frontend.committee.notice-show', [
            'title' => $committee->name,
            'committee' => $committee,
            'notice' => $notice,
        ]);
    }
    public function activities(Committee $committee)
    {
        $activities = $committee
            ->activities()
            ->when(request()->filled('start_date'), fn($q) => $q->whereDate('created_at', '>=', Carbon::parse(bs_to_ad(request('start_date')))->startOfDay()))
            ->when(request()->filled('end_date'), fn($q) => $q->whereDate('created_at', '<=', Carbon::parse(bs_to_ad(request('end_date')))->endOfDay()))
            ->when(request()->filled('keyword'), fn($q) => $q->where('title', 'like', '%' . request('keyword') . '%'))
            ->get();

        return view('frontend.committee.activities', [
            'title' => $committee->name,
            'committee' => $committee,
            'activities' => $activities,
        ]);
    }

    public function downloads(Committee $committee)
    {
        $downloads = $committee
            ->downloads()
            ->when(request()->filled('start_date'), fn($q) => $q->whereDate('created_at', '>=', Carbon::parse(bs_to_ad(request('start_date')))->startOfDay()))
            ->when(request()->filled('end_date'), fn($q) => $q->whereDate('created_at', '<=', Carbon::parse(bs_to_ad(request('end_date')))->endOfDay()))
            ->when(request()->filled('keyword'), fn($q) => $q->where('title', 'like', '%' . request('keyword') . '%'))
            ->get();

        return view('frontend.committee.downloads', [
            'title' => $committee->name,
            'committee' => $committee,
            'downloads' => $downloads,
        ]);
    }

    public function members(Committee $committee)
    {
        $designations = ['सभापति','जेष्ठ सदस्य'];
        $committeeMembers = $committee
            ->members()
            ->WhereNotIn('designation', $designations)
            ->with('member')
            ->get();
        return view('frontend.committee.members', [
            'title' => $committee->name,
            'committee' => $committee,
            'committeeMembers' => $committeeMembers,
        ]);
    }
}
