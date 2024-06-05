<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Federalparliment;

class FederalparlimentController extends Controller
{
    public function index(){
        $federalParliment=Federalparliment::first();
        return view('federals.index',compact('federalParliment'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'description'=>'required'
        ]);

        $federalParliment=Federalparliment::first();

        if($federalParliment){
            $federalParliment->update($data);
        }else{
            Federalparliment::create($data);
        }

        return redirect()->back()->with('success','Federal Parliament Secretariat duccessfully changed');
    }
}
