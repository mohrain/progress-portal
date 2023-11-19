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


                            <div class="table-responsive box p-2">
                                <table class="table table-bordered" style="white-space: nowrap;">
                                    <thead>
                                        <th>फोटो</th>
                                        <th>परिचय</th>
                                    </thead>
                                    <tbody id="sortable-member">
                                        @forelse($committeeMembers as $comotteeMember)
                                            <tr data-id="{{ $comotteeMember->id }}"
                                                data-order="{{ $comotteeMember->position ?? 0 }}">
                                                <td class="sort-handle">
                                                    <img id="newProfilePhotoPreview"
                                                        src="{{ $comotteeMember->member->profile ? asset('storage/' . $comotteeMember->member->profile) : asset('assets/img/no-image.png') }}"
                                                        class="profile-nav">
                                                </td>
                                                <td>
                                                    <a href="{{ route('members.show', $comotteeMember->member) }}"
                                                        class="link-dark">
                                                        <div>
                                                            मा. {{ $comotteeMember->member->name }}
                                                        </div>

                                                        <div>
                                                            @if ($comotteeMember->designation == 'सभापति' || $comotteeMember->designation == 'जेष्ठ सदस्य')
                                                                {{ $comotteeMember->designation }}
                                                            @else
                                                                {{ $comotteeMember->member->parliamentaryParty->name }}
                                                            @endif
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन
                                                    !!!
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>


                                </table>
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
