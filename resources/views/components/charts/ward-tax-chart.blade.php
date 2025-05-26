<div class="card p-4">
  <div class="d-flex justify-content-between align-items-center ">
      <h4 class="mb-3">राजस्व विवरण</h4>
    <div class="mb-3 d-flex  ">
        <select id="fiscalYear" class="form-control w-auto mr-3">
            @foreach ($fiscalYears as $fy)
                <option value="{{ $fy->id }}" {{ running_fiscal_year()->id == $fy->id ? 'selected' : '' }}>{{ $fy->name }}</option>
            @endforeach
        </select>

        <select id="month" class="form-control w-auto">
            <option value="">-- महिना --</option>
            @foreach ($nepaliMonths as $num => $name)
                <option value="{{ $num }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
  </div>

    <canvas id="wardChart"></canvas>
</div>




@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chart;

    function renderChart(labels, data) {
        const ctx = document.getElementById('wardChart').getContext('2d');
        if (chart) chart.destroy(); // destroy previous chart if exists

        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'कर रकम (रु)',
                    data: data,
                    backgroundColor: '#4e73df'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function fetchWardTaxes() {
        const fiscalYearId = document.getElementById('fiscalYear').value;
        const month = document.getElementById('month').value;

        fetch(`/api/ward-taxes?fiscal_year_id=${fiscalYearId}&month=${month}`)
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.ward);
                const amounts = data.map(item => item.amount);
                renderChart(labels, amounts);
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        fetchWardTaxes();

        document.getElementById('fiscalYear').addEventListener('change', fetchWardTaxes);
        document.getElementById('month').addEventListener('change', fetchWardTaxes);
    });
</script>
@endpush
