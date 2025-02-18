<div id="navbar" class="p-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded flex-fill light-shadow">
        @if (Auth::user()->roles[0]->name != 'librarian')
            <a href="#" id="sidebar-toggler" class="text-white mr-3" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </a>
        @endif

    
    
    
    <a class="navbar-brand" href="{{ route('dashboard') }}">
        @if (Auth::user()->hasRole('hod'))
            <h4 class="text-center">{{ Auth::user()->employee->department->name }}</h4>
        @elseif (Auth::user()->hasRole('sachib'))

        @php
        $availableSecretaries = Auth::user()->employee->committeeSecretaries ;
      
       $committeeSecretary = session('current_committee_secretary') 
    ? \App\Models\CommitteeSecretary::find(session('current_committee_secretary')) 
    : Auth::user()->employee->committeeSecretary;

    @endphp
            <div class="dropdown relative">
                @if ($availableSecretaries->count() > 1)
                    <a href="#" class="dropdown-toggle bg-gray-200 px-2 py-2 rounded-md hover:bg-gray-300 cursor-pointer block text-decoration-none fs-5"  id="dropdownToggle">
                        {{ $committeeSecretary->committee->name }}
                    </a>
                    <!-- Dropdown menu -->
                    <ul style="width: 250px" class="dropdown-menu absolute left-0 mt-1 bg-white  shadow-md rounded-md hidden" id="dropdownMenu">
                        @foreach ($availableSecretaries as $secretary)
                            <li class="py-1">
                                <a href="{{ route('committee.switch', $secretary) }}" class="block px-4 py-2 text-secondary ">
                                    {{ $secretary->committee->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <a href="{{ route('committee.switch', $availableSecretaries->first()) }}" class="text-gray-700 hover:text-gray-900">
                        {{ $availableSecretaries->first()->committee->name }}
                    </a>
                @endif
            </div>
        @else
            {{ __('app.name') }}
        @endif
    </a>
    
    <!-- Custom JavaScript -->
   
    

    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav ml-auto nav-flex-icons">
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'np') <span class="svg-icon">@include('svg.flag-np')</span> नेपाली @endif
                        @if (App::getLocale() == 'en') <span class="svg-icon">@include('svg.flag-us')</span> Eng @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        @if (App::getLocale() != 'np')
                        <a class="dropdown-item" href="{{ route('locale', 'np') }}"> <span class="svg-icon">@include('svg.flag-np')</span> नेपाली</a>
                        @endif
                        @if (App::getLocale() != 's')
                        <a class="dropdown-item" href="{{ route('locale', 'en') }}"> <span class="svg-icon">@include('svg.flag-us')</span> English</a>
                        @endif
                    </div>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{ route('password.change.form', Auth::user()) }}">Change
                            Password</a>
                        {{-- @hasanyrole('super-admin|admin')
                        <a class="dropdown-item" href="{{ route('configuration-checklist.index') }}">@lang('navigation.configuration_checklist')</a>
                        @endhasanyrole --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </div>

</div>
</nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownToggle = document.getElementById("dropdownToggle");
        const dropdownMenu = document.getElementById("dropdownMenu");

        if (dropdownToggle) {
            dropdownToggle.addEventListener("click", function (e) {
                e.preventDefault();

                // Toggle Bootstrap & Tailwind classes
                dropdownMenu.classList.toggle("show"); // Bootstrap class
                dropdownMenu.classList.toggle("hidden"); // Tailwind class
            });

            document.addEventListener("click", function (event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove("show");
                    dropdownMenu.classList.add("hidden");
                }
            });
        }
    });
</script>

