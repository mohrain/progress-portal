<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Download;
use Illuminate\Http\Request;

class CommitteeDownloadController extends Controller
{
    public function downloads(Committee $committee)
    {
        $committee->load('downloads');

        return view('committee.downloads', [
            'committee' => $committee
        ]);
    }

    public function createDownloadForm(Committee $committee)
    {
        return view('committee.download-form', [
            'committee' => $committee,
            'download' => new Download(),
            'updateMode' => false
        ]);
    }

    public function editDownload(Committee $committee, Download $download)
    {
        return view('committee.download-form', [
            'committee' => $committee,
            'download' => $download,
            'updateMode' => true
        ]);
    }

    public function destroy(Committee $committee, Download $download){
        $download->delete();
        return redirect()->back();

    }
}
