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
      <h4 class="mb-3 fw-bold sub-heading-arrow">सिफारिसको विवरण</h4>
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
{{-- Cards Section --}}
{{-- Cards Section --}}
<div class="row text-white mb-4">
    <div class="col-md-3 mb-3">
        <div class="bg-success p-3 rounded shadow-sm d-flex align-items-center ">
            <i class="fas fa-file-alt fa-2x me-3"></i>
            <div class="pl-3">
                <div class="fs-4 fw-bold">{{ number_format($totals['total_application']) }}</div>
                <div class="" > आवेदन</div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="bg-info p-3 rounded shadow-sm d-flex align-items-center ">
            <i class="fas fa-folder-open fa-2x me-3"></i>
            <div class="pl-3">
                <div class="fs-4 fw-bold">{{ number_format($totals['total_darta']) }}</div>
                <div> दर्ता </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="bg-warning p-3 rounded shadow-sm d-flex align-items-center ">
            <i class="fas fa-paper-plane fa-2x me-3"></i>
            <div class="pl-3">
                <div class="fs-4 fw-bold">{{ number_format($totals['total_chalani']) }}</div>
                <div> चलानी </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="bg-primary p-3 rounded shadow-sm d-flex align-items-center ">
            <i class="fas fa-check-circle fa-2x "></i>
            <div class="pl-3">
                <div class="fs-4 fw-bold">{{  number_format($totals['total_recomended'])  }}</div>
                <div class=""> सिफारिस</div>
            </div>
        </div>
    </div>
</div>


    <h5 class="mb-3 fw-bold kalimati-font">सिफारिस चार्ट</h5>
{{-- Chart Section --}}
<canvas id="recommendationChart" height="150"></canvas>

</div>
@endsection

@push('styles')
<style>
.sub-heading-arrow {
    font-size: 1.2rem;
    color: #982121;
    /* Lighter grey */
    font-weight: 600;
    margin-bottom: 1rem;
    padding-left: 20px;
    position: relative;
}

.sub-heading-arrow::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    border-left: 15px solid #982121;
    /* Arrow shaft */
    border-top: 10px solid transparent;
    /* Arrow head */
    border-bottom: 10px solid transparent;
    /* Arrow head */
}
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    const chartData = @json($chartData);
    const labels = chartData.map(item => item.type);
    const recommendedData = chartData.map(item => item.total_recomended);

    const ctx = document.getElementById('recommendationChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'सिफारिस',
                    data: recommendedData,
                    backgroundColor: 'rgba(0, 84, 166, 1)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
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


