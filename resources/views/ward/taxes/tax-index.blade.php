@extends('layouts.app')

@section('content')

<div class="p-4 bg-white">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-3 fw-bold sub-heading-arrow">राजस्व </h4>
    <a href="{{ route('ward-taxes.create') }}" class="btn btn-primary mb-3">विवरण थप्नुहोस्</a>
  </div>

   <x-date-filter :action="route('ward-taxes.index')" />
<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr class="bg-secondary text-white">
            <th>#</th>
            <th>गत महिनासम्मको जम्मा</th>
            <th>राजस्व संकेत</th>
            <th>राजस्व शिर्षक</th>
            <th>यो महिनाको जम्मा</th>
            <th>यो महिनासम्मको जम्मा</th>
            <th>कैफियत</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; $totalMonth = 0; $totalYTD = 0; @endphp
        @foreach ($monthlyData as $data)
            @php
                $thisMonth = $data->this_month_total;
                $ytd = $ytdData[$data->tax_title_id]->ytd_total ?? 0;
                $previousMonth = $ytd - $thisMonth;
                $totalMonth += $thisMonth;
                $totalYTD += $ytd;
            @endphp
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ number_format($previousMonth, 2) }}</td>
                <td>{{ $data->taxTitle->code ?? 'N/A' }}</td>
                <td>{{ $data->taxTitle->title ?? 'N/A' }}</td>
                <td>{{ number_format($thisMonth, 2) }}</td>
                <td>{{ number_format($ytd, 2) }}</td>
                <td></td>
            </tr>
        @endforeach

        <tr class="fw-bold table-secondary">
            <td colspan="4" class="">जम्मा</td>
            <td>{{ number_format($totalMonth, 2) }}</td>
            <td>{{ number_format($totalYTD, 2) }}</td>
            <td></td>
        </tr>
    </tbody>
</table>



</div>

@endsection