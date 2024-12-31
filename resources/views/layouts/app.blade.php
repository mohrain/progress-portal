<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($title)
            {{ $title }} |
        @endisset {{ config('app.name', __('appname')) }}
    </title>

    @include('layouts.partials.styles')
    @stack('styles')
    <style>
        /* sidebar */
        .sidebar {
            background-color: var(--white-color) !important;
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 80px 20px;
            z-index: 100;
            overflow-y: scroll;
            box-shadow: 0 0 1px var(--grey-color-light);
            transition: all 0.5s ease;
        }

        .sidebar.close {
            padding: 60px 0;
            width: 80px;
        }

        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .menu_content {
            position: relative;
        }

        .menu_title {
            margin: 15px 0;
            padding: 0 20px;
            font-size: 18px;
        }

        .sidebar.close .menu_title {
            padding: 6px 30px;
        }

        .menu_title::before {
            color: var(--grey-color);
            white-space: nowrap;
        }

        .menu_dahsboard::before {
            content: "Dashboard";
        }

        .menu_editor::before {
            content: "Editor";
        }

        .menu_setting::before {
            content: "Setting";
        }

        .sidebar.close .menu_title::before {
            content: "";
            position: absolute;
            height: 2px;
            width: 18px;
            border-radius: 12px;
            background: var(--grey-color-light);
        }

        .menu_items {
            padding: 0;
            list-style: none;
        }

        .navlink_icon {
            position: relative;
            font-size: 22px;
            min-width: 50px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 6px;
        }

        .navlink_icon::before {
            content: "";
            position: absolute;
            height: 100%;
            width: calc(100% + 100px);
            left: -20px;
        }

        .navlink_icon:hover {
            background: var(--blue-color);
        }

        .sidebar .nav_link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 4px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--grey-color);
            white-space: nowrap;
        }

        .sidebar.close .navlink {
            display: none;
        }

        .nav_link:hover {
            color: var(--white-color);
            background: var(--blue-color);
        }

        .sidebar.close .nav_link:hover {
            background: var(--white-color);
        }

        .submenu_item {
            cursor: pointer;
        }

        .submenu {
            display: none;
        }

        .submenu_item .arrow-left {
            position: absolute;
            right: 10px;
            display: inline-block;
            margin-right: auto;
        }

        .sidebar.close .submenu {
            display: none;
        }

        .show_submenu~.submenu {
            display: block;
        }

        .show_submenu .arrow-left {
            transform: rotate(90deg);
        }

        .submenu .sublink {
            padding: 15px 15px 15px 52px;
        }

        .bottom_content {
            position: fixed;
            bottom: 60px;
            left: 0;
            width: 260px;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .bottom {
            position: absolute;
            display: flex;
            align-items: center;
            left: 0;
            justify-content: space-around;
            padding: 18px 0;
            text-align: center;
            width: 100%;
            color: var(--grey-color);
            border-top: 1px solid var(--grey-color-light);
            background-color: var(--white-color);
        }

        .bottom i {
            font-size: 20px;
        }

        .bottom span {
            font-size: 18px;
        }

        .sidebar.close .bottom_content {
            width: 50px;
            left: 15px;
        }

        .sidebar.close .bottom span {
            display: none;
        }

        .sidebar.hoverable .collapse_sidebar {
            display: none;
        }

        #sidebarOpen {
            display: none;
        }

        /* .content {
            margin-left: 250px;
        } */

        .sidebar-opened .content {
            transition: all 0.5s ease;
            margin-left: 250px;

        }

        .sidebar-close .content {
            transition: all 0.5s ease;
            margin-left: 0;
        }



        @media screen and (max-width: 768px) {
            #sidebarOpen {
                font-size: 25px;
                display: block;
                margin-right: 10px;
                cursor: pointer;
                color: var(--grey-color);
            }

            .sidebar.close {
                left: -100%;
            }

            .search_bar {
                display: none;
            }

            .sidebar.close .bottom_content {
                left: -100%;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="@auth
{{ Auth::user()->roles[0]->name == 'librarian' ? '' : 'sidebar-opened' }} @endauth ">
    <div id="app">
        @guest
            @yield('content')
        @endguest

        @auth
            <div>
                <div id="sidebar" class="bg-deep-blu p-2" data-collapsed="false">
                    <x-sidebar></x-sidebar>
                </div>
                <div id="content-area" class=" px-md-3">
                    <x-navbar></x-navbar>
                    <div class="p-2">
                        @yield('breadcrumb')
                    </div>
                    <div class="container-fluid">
                        @include('alerts.all')
                    </div>
                    <div class="content">

                        @yield('content')
                    </div>
                </div>
            </div>
        @endauth

    </div>
    @include('layouts.partials.scripts')

    <script>
        /**
         * Toggle the sidebar
         * @param null
         **/
        function toggleSidebar() {
            document.getElementsByTagName('body')[0].classList.toggle('sidebar-opened')
        }

        /**
         * Toggle the sidebar with keyboard
         * Key combination: Ctrl + Shift + S
         */
        document.onkeydown = function(e) {
            if (e.ctrlKey && e.shiftKey && e.keyCode === 83) {
                toggleSidebar();
            }
        };

        /**
         * Search dropdown options
         * @param searchTerm
         * @param targets
         * @param dataKey as data-keys
         * @usage filterOptions(10, '#select-district-id option', 'province-id');
         */
        function filterOptions(searchTerm, targets, dataKey) {
            // console.log('Filtering with data-key: ' + dataKey + ' search term: '+ searchTerm);
            $(targets).each(function() {
                if ($(this).data(dataKey) == searchTerm) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            if ($('.nepali-date')[0]) {
                $('.nepali-date').nepaliDatePicker({
                    disableDaysAfter: 1,
                    ndpYear: true,
                    ndpMonth: true,
                    ndpYearCount: 10
                });
            }

            var today = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'),
                'YYYY-MM-DD');
            $(".date-today[value='']").val(today);

        });
    </script>
    <script>
        /* Select your element */
        var elm = document.getElementsByClassName("nepali-date-picker");
        /* Initialize Datepicker with options */
        elm.nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 200,
            // readOnlyInput: true
        });
    </script>
    @stack('scripts')
</body>

</html>
