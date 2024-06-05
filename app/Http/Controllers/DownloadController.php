<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required',
            'downloadable_type' => 'nullable',
            'downloadable_id' => ['nullable', 'integer']
        ]);

        $download = Download::create([
            'title' => $request->title,
            'file' => $request->file->store('downloads'),
            'downloadable_type' => $request->downloadable_type,
            'downloadable_id' => $request->downloadable_id
        ]);

        return request('redirect_to')
            ? redirect()->to(request('redirect_to'))
            : redirect()->back();
    }

    public function update(Download $download, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable'
        ]);

        try {
            DB::beginTransaction();
            $download->update(['title' => $request->title]);

            if ($request->hasFile('file')) {
                $oldPath = $download->file;
                $newPath = $request->file->store('downloads');

                $download->update(['file' => $newPath]);

                Storage::delete($oldPath);
            }

            DB::commit();
            return request('redirect_to')
                ? redirect()->to(request('redirect_to'))
                : redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            if (isset($newPath)) {
                Storage::delete($oldPath);
            }

            report($th);

            //TODO::redirect back with error
            return $th->getMessage();
        }
    }

    public function destroy(Download $download)
    {
        Storage::delete($download->file);
        $download->delete();

        return redirect()->back();
    }

    public function footerDownload($file)
    {
        $file = "./downloadable/".$file;
        return Response::download($file);
    }
}
