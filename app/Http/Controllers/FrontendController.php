<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuchiTokenSearchResponse;
use App\Suchi;
use App\SuchiType;

class FrontendController extends Controller
{
    public function landingPage()
    {
        return view('frontend.landing-page');
    }

    public function showApplicationForm()
    {
        $suchi = new Suchi();
        $suchiTypes = SuchiType::get();
        return view('frontend.application-form', [
            'suchi' => $suchi,
            'updateMode' => $suchi->exists ? true : false,
            'suchiTypes' => $suchiTypes
        ]);
    }

    public function applicationSubmitted(Suchi $suchi)
    {
        return view('frontend.application-submitted', compact('suchi'));
    }

    public function tokenSearch()
    {
        return view('frontend.token-search');

        // $suchi = Suchi::where('token_no', $tokenNumber)->firstOrFail();
        // $contentEditable = 'false';
        // return view('frontend.token', compact('suchi', 'contentEditable'));
    }

    public function suchiByTokenApi($tokenNo)
    {
        $suchi = Suchi::where('token_no', $tokenNo)->firstOrFail();
        return new SuchiTokenSearchResponse($suchi);
    }
}
