@extends('layouts.app')

@push('styles')
    <style>
        .dashboard-count-tile {
            color: inherit;
        }

        .dashboard-count-tile:hover {
            background-color: #1c4267;
            color: white;
        }
    </style>
@endpush

@section('content')
    <div id="dashboard" class="container-fluid font-noto">
        <div class="row font-kalimati">
            {{-- Alerts --}}
            <div class="col-md-12">
                @include('alerts.all')
            </div>

            @foreach ($billTypes as $billType)
                <div class="col-md-3">
                    <x-dashboard-count-tile :link="route('bills.index')">
                        <x-slot name="count">{{ $billType->bills->count() }}</x-slot>
                        <x-slot name="title">{{ $billType->name }}हरू</x-slot>
                    </x-dashboard-count-tile>
                </div>
            @endforeach
            <div class="col-md-3">
                <x-dashboard-count-tile :link="route('committee.index')">
                    <x-slot name="count">{{ $committeeCount }}</x-slot>
                    <x-slot name="title">समितीहरू</x-slot>
                </x-dashboard-count-tile>
            </div>
            <div class="col-md-3">
                <x-dashboard-count-tile :link="route('members.index')">
                    <x-slot name="count">{{ $memberCount }}</x-slot>
                    <x-slot name="title">सदस्यहरु</x-slot>
                </x-dashboard-count-tile>
            </div>
            <div class="col-md-3">
                <x-dashboard-count-tile :link="route('employees.index')">
                    <x-slot name="count">{{ $employeeCount }}</x-slot>
                    <x-slot name="title">कर्मचारीहरू</x-slot>
                </x-dashboard-count-tile>
            </div>
            @if (Auth::user()->roles[0]->name != 'librarian')
                <div class="col-md-3">
                    <x-dashboard-count-tile :link="route('user.index')">
                        <x-slot name="count">{{ $totalUsersCount }}</x-slot>
                        <x-slot name="title">प्रयोगकर्ताहरू</x-slot>
                    </x-dashboard-count-tile>
                </div>
            @endif

            @role('librarian')
                <div class="col-md-3">
                    {{-- <x-dashboard-count-tile :link="route('provincial-assembly-library.index')">
                        <x-slot name="count">{{ $totalBooksCount }}</x-slot>
                        <x-slot name="title">पुस्तक</x-slot>
                    </x-dashboard-count-tile> --}}
                    <a class="dashboard-count-tile d-flex align-items-center p-4 rounded my-3 card z-depth-0" href="{{ route('provincial-assembly-library.index')}}">
                        <h1>{{ $totalBooksCount }}</h1>
                       <span>पुस्तक</span>
                    </a>
                </div>
            @endrole

        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    <script>
        const chart = new Chartisan({
            el: '#suchis-by-category-chart',
            url: "@chart('suchi_category_chart')",
            hooks: new ChartisanHooks()
                .beginAtZero(false)
                .colors(['#2572bc'])
                .borderColors()
                .responsive()
                .legend({
                    position: 'bottom'
                })
                .datasets([{
                    type: 'bar',
                    fill: false
                }])
        });
    </script>
@endpush
