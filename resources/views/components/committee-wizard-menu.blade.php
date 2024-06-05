<div class="committee-wizard-menu">
    @foreach ($menus as $menu)
        <a href="{{ route($menu['route_name'], $menu['route_param']) }}" @class(['active' => $menu['active']])>
            <div class="work-description ">{!! $menu['icon'] ?? null !!} {{ $menu['title'] }}</div>
        </a>
    @endforeach
    <a href="{{ route('committee.audio', $committee) }}"   class=" {{ Route::getCurrentRoute()->getName() == 'committee.audio' ? 'active' : '' }}">
        <div class="work-description "><i class="fa fa-headphones"></i> अडियो</div>
    </a>
    <a href="{{ route('committee.video.index', $committee) }}"  class=" {{ Route::getCurrentRoute()->getName() == 'committee.video.index' ? 'active' : '' }}">
        <div class="work-description "><i class="fa fa-film"></i> भिडियो</div>
    </a>
    {{-- <a href="{{ route('committee.show-about-form', $committee) }}" class="active">
    <div class="work-description "><i class="fa fa-info-circle"></i> परिचय</div>
    </a>
    <a href="{{ route('committee.show-responsibility-form', $committee) }}">
        <div class="work-description "><i class="fa fa-tasks"></i> काम, कर्तव्य र अधिकार</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/notices">
        <div class="work-description "><i class="fa fa-flag"></i> सूचनाहरु</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/activities">
        <div class="work-description "><i class="fa fa-rss"></i> गतिविधिहरु</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/publications">
        <div class="work-description  tab-active "><i class="fa fa-download"></i> प्रकाशनहरु/डाउनलोडस्</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/meeting-attendance">
        <div class="work-description "><i class="fa fa-user"></i> हाजिरी</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/c_audio">
        <div class="work-description "><i class="fa fa-headphones"></i> अडियो</div>
    </a>
    <a href="https://na.parliament.gov.np/np/committees/Sustainable-Development-and-Good-Governance-Committee/c_video">
        <div class="work-description "><i class="fa fa-film"></i> भिडियो</div>
    </a> --}}
</div>

@push('styles')
    <style>
        .committee-wizard-menu {
            display: flex;
            border-radius: 4px;
        }

        .committee-wizard-menu a {
            background-color: #0054a6;
            padding: 10px 15px;
            color: #fff;
            border-right: 1.8px dotted #fff;
        }

        .committee-wizard-menu a i {
            margin-right: 10px;
            opacity: .9;
        }

        .committee-wizard-menu a:first-of-type {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .committee-wizard-menu a:last-of-type {
            border-right: none;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .committee-wizard-menu a.active {
            background-color: red;
            color: #fff;
        }
    </style>
@endpush
