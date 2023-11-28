<div class="bg-white light-shadow rounded font-noto" style="overflow-y: scroll;">
    <div class="p-2 text-center rounded">
        <div class="mun-title-card">
            <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo"
                height="50px">
            <div class="mt-2">
                <div>{{ settings('app_name') }}</div>
                <div>{{ settings('office_name') }}</div>
                <div>{{ settings('province_name') }}</div>
            </div>
        </div>
    </div>
    <div id="sidenav-wrapper" class="px-3" style="white-space: nowrap;">
        <ul id="sidenav" class="nav flex-column">
            <li class="nav-item {{ setActive('dashboard') }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <span class="text-warning"><i class="fa fa-cube"></i></span>ड्यासबोर्ड
                </a>
            </li>
            <li class="nav-item {{ setActive('meetings.index') }}">
                <a href="{{ route('meetings.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-megaphone"></i></span>बैठकहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('bills.*') }}">
                <a href="{{ route('bills.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-file-earmark-richtext"></i></span>विधेयकहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('posts.*') }}">
                <a href="{{ route('posts.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-list-task"></i></span>पोस्टहरु
                </a>
            </li>
            
            <li class="nav-item {{ setActive('pages.*') }}">
                <a href="{{ route('pages.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-file-earmark"></i></span>पेजहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('carousel-images.*') }}">
                <a href="{{ route('carousel-images.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-file-earmark-slides"></i></span>स्लाइडर फोटोहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('modal-images.*') }}">
                <a href="{{ route('modal-images.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-app-indicator"></i></span>मोडाल फोटोहरु
                </a>
            </li>
        
            <li class="nav-item {{ setActive('committee.*') }}">
                <a href="{{ route('committee.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="fa fa-plus"></i></span>समिति
                </a>
            </li>
            <li class="nav-item {{ setActive('live.*') }}">
                <a href="{{ route('live.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-youtube"></i></span>प्रत्यक्ष प्रसारण
                </a>
            </li>
            <li class="nav-item {{ setActive('album.*') }}">
                <a href="{{ route('album.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="fa fa-images"></i></span>Gallery
                </a>
            </li>
            <li class="nav-item {{ setActive('videos.*') }}">
                <a href="{{ route('videos.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="fa fa-video"></i></span>Video Gallery
                </a>
            </li>

            <li class="nav-item {{ setActive('members.*') }}">
                <a href="{{ route('members.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-person-raised-hand"></i></span>सदस्यहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('office-bearers.*') }}">
                <a href="{{ route('office-bearers.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-person-bounding-box"></i></span>पदाधिकारीहरु
                </a>
            </li>

            <li class="nav-item {{ setActive('employees.*') }}">
                <a href="{{ route('employees.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-person-vcard"></i></span>कर्मचारीहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('information-officers.*') }}">
                <a href="{{ route('information-officers.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-success"><i class="bi bi-person-video"></i></span>सूचना अधिकारीहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('contact-us.*') }}">
                <a href="{{ route('contact-us.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-warning"><i class="bi bi-info-lg"></i></span>सुझाव/प्रतिक्रियाहरू
                </a>
            </li>
            <li class="nav-item {{ setActive('faq.*') }}">
                <a href="{{ route('faq.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-warning"><i class="bi bi-question-lg"></i></span>प्राय: सोधिने प्रश्नहरू
                </a>
            </li>
            <li class="nav-item {{ setActive('current-parliamentary-parties.*') }}">
                <a href="{{ route('current-parliamentary-parties.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-warning"><i class="bi bi-align-end"></i></span>राजनीतिक दलहरू
                </a>
            </li>

            {{-- <li class="nav-item {{ setActive('suchi.applications') }}">

            <li class="nav-item {{ setActive('suchi.applications') }}">
                <a href="{{ route('suchi.applications') }}" aria-expanded="false" class="nav-link">
                    <span class="text-warning"><i class="fas fa-clipboard"></i></span>आवेदन फारामहरु
                </a>
            </li>

            <li class="nav-item {{ setActive('suchi.index') }}">
                <a href="{{ route('suchi.index') }}" aria-expanded="false" class="nav-link">
                    <span class="text-secondary"><i class="fas fa-book"></i></span>सूची दर्ता
                </a>
            </li> --}}

            {{-- <li class="nav-item {{ setActive('project.index') }}">
            <a href="{{route('project.index')}}" aria-expanded="false" class="nav-link">
                <span class="text-secondary"><i class="fa fa-cube"></i></span>@lang('navigation.Projects')
            </a>
            </li>
            <li class="nav-item {{ setActive('report') }}">
                <a class="nav-link" href="{{ route('report') }}">
                    <span class="text-success"><i class="fa fa-list"></i></span>@lang('navigation.report')
                </a>
            </li>
            @hasrole('super-admin')
            <li class="nav-item {{ setActive('organization.index') }}">
                <a class="nav-link" href="{{ route('organization.index') }}">
                    <span class="text-light"><i class="fa fa-briefcase"></i></span>@lang('navigation.Organizations')
                </a>
            </li>
            @endhasrole --}}

            @can('user.*')
                <li
                    class="nav-item {{ setActive('user.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <span class=""><i class="fa fa-users"></i></span>प्रयोगकर्ताहरू
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span class="text-success"><i class="fas fa-cog"></i></span>सेटिङहरू
                </a>
            </li>
            <li class="nav-item {{ setActive('sms.index') }}">
                <a class="nav-link" href="{{ route('sms.index') }}">
                    <span class="text-success"></span>SMS
                </a>
            </li>
            <li class="nav-item {{ setActive('post-categories.index') }}">
                <a class="nav-link" href="{{ route('post-categories.index') }}">
                    <span class="text-success"></span>पोस्ट प्रकार
                </a>
            </li>
            <li class="nav-item {{ setActive('post-category-menu.index') }}">
                <a class="nav-link" href="{{ route('post-category-menu.index') }}">
                    <span class="text-success"></span>पोस्ट प्रकार मेनु
                </a>
            </li>
            <li class="nav-item {{ setActive('bill-types.index') }}">
                <a class="nav-link" href="{{ route('bill-types.index') }}">
                    <span class="text-success"></span>विधयेक प्रकार
                </a>
            </li>
            <li class="nav-item {{ setActive('bill-categories.index') }}">
                <a class="nav-link" href="{{ route('bill-categories.index') }}">
                    <span class="text-success"></span>विधयेक वर्ग
                </a>
            </li>
            <li class="nav-item {{ setActive('ministries.index') }}">
                <a class="nav-link" href="{{ route('ministries.index') }}">
                    <span class="text-success"></span>मन्त्रालयहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('parliamentary-parties.index') }}">
                <a class="nav-link" href="{{ route('parliamentary-parties.index') }}">
                    <span class="text-success"></span>राजनीतिक दलहरु
                </a>
            </li>
            <li class="nav-item {{ setActive('employee-designations.index') }}">
                <a class="nav-link" href="{{ route('employee-designations.index') }}">
                    <span class="text-success"></span> कर्मचारी पदहरू
                </a>
            </li>
            <li class="nav-item {{ setActive('elections.index') }}">
                <a class="nav-link" href="{{ route('elections.index') }}">
                    <span class="text-success"></span> निर्वाचन वर्षहरू
                </a>
            </li>
            @hasanyrole('super-admin|admin')
                <li class="nav-item {{ setActive('settings.index') }}">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <span class="text-success"></span>एप सेटिङहरू
                    </a>
                </li>
            @endhasrole

            {{-- @hasanyrole('super-admin|admin')
            <li class="nav-item {{ setActive('fiscal-year.*') }}">
            <a class="nav-link" href="{{route('fiscal-year.index')}}">
                <span class="amber-text"><i class="fa fa-calendar-alt"></i></span>@lang('navigation.fiscal_year')
            </a>
            </li>
            @endhasanyrole --}}

            {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.items') }}">
            <span class="text-default"><i class="fas fa-tools"></i></span>@lang('navigation.configurations')</a>
            </li> --}}

            {{-- <li class="nav-item pl-5 {{ setActive('project-type.*') }}">
            <a class="nav-link" href="{{ route('project-type.index') }}">@lang('navigation.project_type')</a>
            </li>
            @hasanyrole('super-admin|admin')
            <li class="nav-item pl-5 {{ setActive('fiscal-year.*') }}">
                <a class="nav-link" href="{{route('fiscal-year.index')}}">@lang('navigation.fiscal_year')</a>
            </li>
            @endhasanyrole
            {@hasanyrole('super-admin|admin')
            <li class="nav-item pl-5 ">
                <a class="nav-link" href="{{route('budget-source.index')}}">@lang('navigation.budget_source')</a>
            </li>
            @endhasanyrole --}}
            {{-- @can('province.*')
        <li class="nav-item pl-5 {{ setActive('province.*') }}">
            <a class="nav-link" href="{{ route('province.index') }}">@lang('navigation.province')</a>
            </li>
            @endcan
            @can('district.*')
            <li class="nav-item pl-5 {{ setActive('district.*') }}">
                <a class="nav-link" href="{{ route('district.index') }}">@lang('navigation.district')</a>
            </li>
            @endcan
            @can('municipality.*')
            <li class="nav-item pl-5 {{ setActive('municipality.*') }}">
                <a class="nav-link" href="{{ route('municipality.index') }}">@lang('navigation.municipality')</a>
            </li>
            @endcan
            <li class="nav-item pl-5 {{ setActive('ward.*') }}">
                <a class="nav-link" href="{{ route('ward.index') }}">@lang('navigation.ward')</a>
            </li> --}}

            @hasanyrole('super-admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logs') }}" target="_blank">
                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>लग प्रणाली
                    </a>
                </li>
            @endhasanyrole

        </ul>
    </div>
</div>
