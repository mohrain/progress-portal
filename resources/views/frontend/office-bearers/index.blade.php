@extends('frontend.layouts.app', ['title' => __('पदाधिकारीहरु')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            पदाधिकारीहरु
                            <hr>
                        </div>
                    </div>
                    @forelse ($officeBearers as $officeBearer)
                        <div class="col-md-6 px-2 my-2">
                            <div class="card mb-3" style="min-height: 140px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img id="newProfilePhotoPreview"
                                            src="{{ $officeBearer->member->profile ? asset('storage/' . $officeBearer->member->profile) : asset('assets/img/no-image.png') }}"
                                            class="feature-image card-img-top">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{ route('members.show', $officeBearer->member) }}"
                                            class="nav-link text-dark">
                                            <div class="card-body">
                                                <h5 class="card-title text-theme-color">
                                                    
                                                    {{ $officeBearer->member->name }}
                                                </h5>
                                                <div class="cart-text">
                                                    <b>
                                                        {{ $officeBearer->designation == true ? 'सभामुख' : 'उप सभामुख' }}
                                                    </b>
                                                    @if ($officeBearer->end)
                                                        <div>
                                                            <small>
                                                                <b>कार्यकालः </b> {{ $officeBearer->start }} देखि
                                                                {{ $officeBearer->end }} सम्म
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </a>
                                    </div>
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
