@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 py-5">
            <div class="box">
                <div class="box__body">
                   <h2 class="h2-responsive text-center font-noto">सूची दर्ताको लागी तपाइँको आवेदन प्रक्रियामा छ।</h2>
                   <div class="text-center my-4">
                       <div class="d-inline-block rounded border border-primary text-dark font-weight-bolder p-3" style="font-size: 28px;"><small class="lang-english">Token No:</small> {{ $suchi->token_no }}</div>
                       <div class="my-4"></div>
                       <a class="btn btn-success z-depth-0 btn-lg font-16px" href="{{ route('suchi-print-application', $suchi) }}"><span class="mr-3"><i class="fa fa-print"></i></span>Print Form</a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

