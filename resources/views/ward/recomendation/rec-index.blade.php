@extends('layouts.app')

@section('content')
<div class="p-4 bg-white">
     @php
            $nepaliMonths = [
                1 => 'श्रावण',
                2 => 'भदौ',
                3 => 'आश्विन',
                4 => 'कार्तिक',
                5 => 'मंसिर',
                6 => 'पुष',
                7 => 'माघ',
                8 => 'फाल्गुण',
                9 => 'चैत्र',
                10 => 'बैशाख',
                11 => 'जेठ',
                12 => 'आषाढ',
            ];
        @endphp
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-3 fw-bold">सिफारिसको विवरण</h4>
    <a href="{{ route('ward-recomendations.create') }}" class="btn btn-primary mb-3">विवरण थप्नुहोस्</a>
  </div>

    <form method="GET" action="{{ route('ward-recomendations.index') }}" class="row mb-4">
        <div class="col-md-3">
            <label>आर्थिक वर्ष</label>
               <select id="fiscal_year_id" name="fiscal_year_id" class="form-control" required>
        @foreach ($fiscalYears as $fy)
            <option value="{{ $fy->id }}" {{ running_fiscal_year()->id == $fy->id ? 'selected' : '' }}>{{ $fy->name }}</option>
        @endforeach
    </select>
        </div>
        <div class="col-md-3">
            <label>महिना</label>
            <select name="month" class="form-control">
                <option value="">सबै</option>
                @foreach($nepaliMonths as $key => $month)
                    <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>
                        {{ $month }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
    </form>

    <canvas id="recommendationChart" height="150"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartData = @json($chartData);

    const labels = chartData.map(item => item.type);

    const applicationData = chartData.map(item => item.total_application);
    const recommendedData = chartData.map(item => item.total_recomended);
    const dartaData = chartData.map(item => item.total_darta);
    const chalaniData = chartData.map(item => item.total_chalani);

    const ctx = document.getElementById('recommendationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'आवेदन',
                    data: applicationData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                },
                {
                    label: ' सिफारिस',
                    data: recommendedData,
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                },
                {
                    label: 'दर्ता',
                    data: dartaData,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                },
                {
                    label: 'चलानी',
                    data: chalaniData,
                    backgroundColor: 'rgba(153, 102, 255, 0.7)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endpush
