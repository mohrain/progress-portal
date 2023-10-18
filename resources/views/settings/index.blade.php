@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">ड्यासबोर्ड</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('navigation.settings')</li>
        </ol>
    </nav>
@endsection


@push('styles')
    <style>
        select {
            height: calc(1.5em + 1rem + 4px) !important;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="my-4"></div>

        <form action="{{ route('settings.sync') }}" method="POST" class="form font-noto">
            @csrf

            @component('settings.group', [
                'title' => 'Application Settings',
                'description' => 'General application setting',
            ])
                <div>
                    @component('settings.input', [
                        'label' => 'App Name',
                        'name' => 'app_name',
                        'description' => 'The application name in Nepali',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'App Name (English)',
                        'name' => 'app_name_en',
                        'description' => 'The application name in English',
                    ])
                    @endcomponent
                    
                </div>
            @endcomponent

            @component('settings.group', [
                'title' => 'Current Running Election',
                'description' => 'Running Election setting',
            ])
                <div>
                    <x-active-election-setting />
                </div>
            @endcomponent

            {{-- Office Details --}}
            @component('settings.group', [
                'title' => 'Office Details',
                'description' => 'The values to be used in the navbar and letter head',
            ])
                <div>

                    @component('settings.input', [
                        'label' => 'Office Name',
                        'name' => 'office_name',
                        'description' => 'The tagline will be used in letter head below office name',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Province Name',
                        'name' => 'province_name',
                        'description' => 'The name of Province to we written in Prvince Name',
                    ])
                    @endcomponent

                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Address Line One',
                        'name' => 'address_line_one',
                        'description' => '',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Address Line Two',
                        'name' => 'address_line_two',
                        'description' => '',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Phone',
                        'name' => 'phone',
                        'description' => '',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'E-mail',
                        'name' => 'email',
                        'description' => '',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Website',
                        'name' => 'website',
                        'description' => '',
                    ])
                    @endcomponent

                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Website',
                        'name' => 'website',
                        'description' => '',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Facebook',
                        'name' => 'facebook',
                        'description' => 'Facebook page Link',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'Twitter',
                        'name' => 'twitter',
                        'description' => 'Twitter Page Link',
                    ])
                    @endcomponent
                    <div class="my-3"></div>
                    @component('settings.input', [
                        'label' => 'YouTube',
                        'name' => 'youtube',
                        'description' => 'YouTube Change Link',
                    ])
                    @endcomponent

                </div>
            @endcomponent

            {{-- Form Defaults Section --}}
            {{-- @component('settings.group', [
    'title' => 'Form Defaults',
    'description' => 'The following vales will be automatically filled in a new form',
]) --}}
            {{-- State --}}
            {{-- <label class="font-weight-bolder">प्रदेश</label>
        <select name="default_id" class="custom-select">
            <option value="">OFF</option>
            @foreach ($provinces as $province)
            <option value="{{ $province->id }}" @if ($province->id == settings()->get('default_id')) selected @endif>
                {{ $province->name }}
            </option>
            @endforeach
        </select>
        <div class="my-3"></div> --}}
            {{-- District --}}
            {{-- <div>
            <label class="font-weight-bolder">जिल्ला</label>
            <select name="default_district_id" class="custom-select">
                <option value="">OFF</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" @if ($district->id == settings()->get('default_district_id')) selected @endif>
                    {{ $district->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="my-3"></div> --}}
            {{-- Province --}}
            {{-- <div>
            <label class="font-weight-bolder">न.पा./गा.वि.स.</label>
            <select name="default_id" class="custom-select">
                <option value="">OFF</option>
                @foreach ($municipalities as $Province)
                <option value="{{ $Province->id }}" @if ($Province->id == settings()->get('default_id')) selected @endif>
                    {{ $Province->name }}
                </option>
                @endforeach
            </select>
        </div>
        @endcomponent --}}

            @component('settings.group', [
                'title' => 'Letter Settings',
                'description' => '',
            ])
                @component('settings.input', [
                    'label' => 'Font Size in pixels',
                    'name' => 'letter_font_size',
                    'description' => '',
                ])
                @endcomponent
                <div class="my-3"></div>
                @component('settings.input', [
                    'label' => 'Additional Head Scripts',
                    'name' => 'letter_head_scripts',
                    'description' => '',
                    'type' => 'textarea',
                ])
                @endcomponent
                <div class="my-3"></div>

                <h5 class="h5-responsive mdb-color-text font-weight-bold">Application Letter</h4>
                    @component('settings.input', [
                        'label' => 'सम्बोधन',
                        'name' => 'letter_application_recipient',
                        'description' => '',
                        'type' => 'textarea',
                    ])
                    @endcomponent
                    <small class="font-italic">You can also use HTML.</small>
                    <div class="my-3"></div>

                    <h5 class="h5-responsive mdb-color-text font-weight-bold">Certificate</h4>
                        @component('settings.input', [
                            'label' => 'Officer Name',
                            'name' => 'letter_officer_name',
                            'description' => '',
                        ])
                        @endcomponent
                        <div class="my-3"></div>
                        @component('settings.input', [
                            'label' => 'Officer Designation',
                            'name' => 'letter_officer_designation',
                            'description' => '',
                        ])
                        @endcomponent
                    @endcomponent

                    <div class="form-group">
                        <button type="submit" class="btn btn-indigo font-17px font-noto z-depth-0">Save All</button>
                    </div>

        </form>
    </div>

@endsection
