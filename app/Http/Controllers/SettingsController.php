<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function items()
    {
        return view('settings.items');
    }

    public function index()
    {
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
            abort(403, 'You are not authorized to this resource');
        }
        $title = 'सेटिङ्हरू';
        $provinces = \App\Province::all(['id', 'name', 'name_en']);
        $districts = \App\District::all(['id', 'name', 'name_en', 'province_id']);
        $municipalities = \App\Municipality::all(['id', 'name', 'name_en', 'district_id']);
        $settings = collect(settings()->all());

        return view('settings.index', compact([
            'provinces',
            'districts',
            'municipalities',
            'settings',
            'title'
        ]));
    }

    public function sync(Request $request)
    {
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin'])) {
            abort(403, 'You are not authorized to this resource');
        }

        $request->validate([
            // Add validations for other settings here
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {

            $newLogo = $request->file('logo');

            // Delete old logo if exists
            $oldLogo = settings()->get('logo');
            if ($oldLogo && Storage::exists($oldLogo)) {
                Storage::delete($oldLogo);
            }

            // Store new logo
            $path = $newLogo->store('logo'); // stored in storage/app/logo
            settings()->set('logo', $path);
        }

        // Store other settings (excluding token and file input)
        settings()->set($request->except('_token', 'logo'));

        return redirect()->back()->with('success', 'Settings have been saved');
    }
}
