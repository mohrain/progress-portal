<?php

namespace App\Http\Controllers;

use App\Models\WardDownload;
use App\Http\Requests\StoreWardDownloadRequest;
use App\Http\Requests\UpdateWardDownloadRequest;
use App\Models\Download;
use App\Ward;

class WardDownloadController extends Controller
{

    public function downloads(Ward $ward)
    {
        $ward->load('downloads');

        return view('ward.download-list', [
            'ward' => $ward
        ]);
    }

    public function downloadsCreate(Ward $ward)
    {
        return view('ward.download-form', [
            'ward' => $ward,
            'download' => new Download(),
            'updateMode' => false
        ]);
    }

    public function editDownload(Ward $ward, Download $download)
    {
        return view('ward.download-form', [
            'ward' => $ward,
            'download' => $download,
            'updateMode' => true
        ]);
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return redirect()->back();
    }
}
