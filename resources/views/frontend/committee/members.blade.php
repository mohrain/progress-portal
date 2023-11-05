@extends('frontend.layouts.app', ['title' => __($title)])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $title }}
                            <hr>
                        </div>
                        <div class="mb-3">
                            <x-frontend.committee-menu :committee="$committee" />
                        </div>
                        <section>
                            
                            <div class="row">
                                @forelse ($committeeMembers as $committeeMember)
                                    <div class="col-md-3 px-2 my-2">
                                        <div class="card" style="height: 320px;">
                                            <img id="newProfilePhotoPreview"
                                                src="{{ $committeeMember->member->profile ? asset('storage/' . $committeeMember->member->profile) : asset('assets/img/no-image.png') }}"
                                                class="feature-image card-img-top">
                                            <div class="card-body text-center">
                                                <b class="card-title text-theme-color">मा.
                                                    {{ $committeeMember->member->name }}
                                                </b>
                                                <div class="cart-text">
                                                    {{ $committeeMember->member->parliamentaryParty->name }}
                                                </div>
                                                <a href="{{ route('members.show', $committeeMember->member) }}"
                                                    class="btn btn-sm btn-primary">पुरा
                                                    हेर्नुहोस्</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="font-italic text-center">
                                        कुनैपनि डाटा उपलब्ध छैन !!!
                                    </div>
                                @endforelse
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <x-frontend.committee-chairman :committee="$committee" />
            </div>
        </div>
    </div>
@endsection
