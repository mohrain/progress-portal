
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

    <form method="POST" action="{{ route('ward-taxes.store') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">आर्थिक वर्ष</label>
                <select id="fiscal_year_id" name="fiscal_year_id" class="form-control" required>
                    @foreach ($fiscalYears as $fy)
                        <option value="{{ $fy->id }}" {{ running_fiscal_year()->id == $fy->id ? 'selected' : '' }}>
                            {{ $fy->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="col-md-3">
                <label class="form-label">वडा नं.</label>
                <select name="ward_id" class="form-control" required>
                    @foreach ($wards as $ward)
                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-3">
                <label class="form-label">महिना</label>
                <select id="month" name="month" class="form-control" required>
                    <option value="" disabled selected>महिना छान्नुहोस्</option>
                    @foreach ($nepaliMonths as $key => $month)
                        <option value="{{ $key }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr class="bg-secondary text-white">
                        <th>कर शीर्षक</th>
                        <th>रकम (रु)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxTitles as $title)
                        <tr>
                            <td class="">
                                {{ $title->title }}
                                <input type="hidden" name="taxes[{{ $title->id }}][tax_title_id]" value="{{ $title->id }}">
                            </td>
                            <td>
                                <input type="number" name="taxes[{{ $title->id }}][amount]" class="form-control form-control-sm" step="0.01" min="0" value="0.00">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">सबमिट गर्नुहोस्</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .categories {
        background-color: #0054a6;
        color: white;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    function fetchTaxes() {
        const fiscalYearId = document.getElementById('fiscal_year_id').value;
        const month = document.getElementById('month').value;

        if (!fiscalYearId || !month) return;

        fetch("{{ route('ward-taxes.get') }}" + "?fiscal_year_id=" + fiscalYearId + "&month=" + month)
            .then(response => response.json())
            .then(data => {
                const taxTitleIds = @json($taxTitles->pluck('id'));
                console.log(data);
                const taxes = data.taxes || {};

                taxTitleIds.forEach(taxId => {
                    const input = document.querySelector(`input[name="taxes[${taxId}][amount]"]`);
                    if (input) input.value = taxes[taxId]?.amount ?? 0;
                });
            })
            .catch(() => {
                const taxTitleIds = @json($taxTitles->pluck('id'));
                taxTitleIds.forEach(taxId => {
                    const input = document.querySelector(`input[name="taxes[${taxId}][amount]"]`);
                    if (input) input.value = 0;
                });
            });
    }

    document.getElementById('fiscal_year_id').addEventListener('change', fetchTaxes);
    document.getElementById('month').addEventListener('change', fetchTaxes);

});
</script>
@endpush

