<?php

namespace App\Http\Controllers;

use App\FrequentlyAskedQuestion;
use App\Http\Requests\StoreFrequentlyAskedQuestionRequest;
use App\Http\Requests\UpdateFrequentlyAskedQuestionRequest;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frequentlyAskedQuestions = FrequentlyAskedQuestion::positioned()->paginate(50);
        return view('faq.index', compact('frequentlyAskedQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FrequentlyAskedQuestion $frequentlyAskedQuestion = null)
    {
        if (!$frequentlyAskedQuestion) {
            $frequentlyAskedQuestion = new FrequentlyAskedQuestion();
        }
        return view('faq.create', compact('frequentlyAskedQuestion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFrequentlyAskedQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFrequentlyAskedQuestionRequest $request)
    {
        // return $request;
        FrequentlyAskedQuestion::create($request->validated());
        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        return $this->create($frequentlyAskedQuestion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFrequentlyAskedQuestionRequest  $request
     * @param  \App\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFrequentlyAskedQuestionRequest $request, FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        $frequentlyAskedQuestion->update($request->validated());
        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        $frequentlyAskedQuestion->delete();
        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ deleted');
    }

    public function sort(Request $request)
    {
        $frequentlyAskedQuestions = json_decode(json_encode($request->frequentlyAskedQuestions));

        foreach ($frequentlyAskedQuestions as $frequentlyAskedQuestion) {
            FrequentlyAskedQuestion::whereId($frequentlyAskedQuestion->id)->update(['position' => $frequentlyAskedQuestion->position]);
        }

        return response()->json(['message' => 'Faq has been sorted'], 200);
    }
    public function frontend()
    {
        $frequentlyAskedQuestions = FrequentlyAskedQuestion::published()
            ->orderBy('position')
            ->get();
        return view('frontend.faq.show', compact('frequentlyAskedQuestions'));
    }
}
