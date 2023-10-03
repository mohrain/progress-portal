@extends('layouts.app')

@push('styles')
<style>
    .dashboard-count-tile{
        color:inherit;
    }
    .dashboard-count-tile:hover{
        background-color: #1c4267;
        color: white;
    }
</style>
@endpush

@section('content')
<div id="dashboard" class="container-fluid font-noto">
    <div class="row">
        {{-- Alerts --}}
        <div class="col-md-12">
            @include('alerts.all')
        </div>

        <div class="col-md-12">
            <div class="box">
                <div class="box__header">
                    <div class="box__title">प्रकार अनुसार सुची</div>
                </div>
                <div class="box__body">
                    <div id="suchis-by-category-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <x-dashboard-count-tile :link="route('suchi.applications')">
                <x-slot name="count">{{ $totalSuchisApplicationsCount }}</x-slot>
                <x-slot name="title">आवेदन फारामहरु</x-slot>
            </x-dashboard-count-tile>
        </div>
        <div class="col-md-3">
            <x-dashboard-count-tile :link="route('suchi.index')">
                <x-slot name="count">{{ $totalSuchisCount }}</x-slot>
                <x-slot name="title">दर्ता गरिएको सूचीहरू</x-slot>
            </x-dashboard-count-tile>
        </div>
        <div class="col-md-3">
            <x-dashboard-count-tile :link="route('user.index')">
                <x-slot name="count">{{ $totalUsersCount }}</x-slot>
                <x-slot name="title">प्रयोगकर्ताहरू</x-slot>
            </x-dashboard-count-tile>
        </div>

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
                type: 'bar'
                , fill: false
            }])
    });
  </script>
@endpush