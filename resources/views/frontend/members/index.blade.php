@extends('frontend.layouts.app', ['title' => __('सदस्यहरु')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            सदस्यहरु 
                            <hr>
                        </div>
                    </div>
                    @forelse ($members as $member)
                        <div class="col-md-3 px-2 my-2">
                            <div class="card" style="height: 330px;">
                                <img id="newProfilePhotoPreview"
                                    src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}"
                                    class="feature-image card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-theme-color">मा. {{ $member->name }}</h5>
                                    <div class="cart-text"> {{ $member->parliamentaryParty->name }}</div>
                                    <a href="{{route('members.show',$member)}}" class="btn btn-sm btn-primary">पुरा हेर्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="font-italic text-center">
                            कुनैपनि डाटा उपलब्ध छैन !!!
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
