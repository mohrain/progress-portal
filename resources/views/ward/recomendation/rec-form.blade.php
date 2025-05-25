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

        <form method="POST" action="{{ route('ward-recomendations.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-2 align-items-center">
                    <label class="form-label">आर्थिक वर्ष</label>
                <select id="fiscal_year_id" name="fiscal_year_id" class="form-control" required>
        @foreach ($fiscalYears as $fy)
            <option value="{{ $fy->id }}" {{ running_fiscal_year()->id == $fy->id ? 'selected' : '' }}>{{ $fy->name }}</option>
        @endforeach
    </select>
                </div>

                {{-- <div class="col-md-2 align-items-center">
                    <label class="form-label">वडा नं.</label>
                    <select name="ward_id" class="form-control" required>
                        @foreach ($wards as $ward)
                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-md-2 align-items-center">
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
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>प्रकार</th>
                            <th>निवेदन संख्या</th>
                            <th>सिफारिस संख्या</th>
                            <th>दर्ता संख्या</th>
                            <th>चलानी संख्या</th>
                            <th>कैफियत</th>
                            {{-- <th>फाइल</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recommendationTypes as $type)
                            <tr>
                                <td>
                                    {{ $type->name }}
                                    <input type="hidden" name="recommendations[{{ $type->id }}][recomendation_type_id]" value="{{ $type->id }}">
                                </td>
                                <td>
                                    <input type="number" name="recommendations[{{ $type->id }}][total_application]" class="form-control form-control-sm" value="0" min="0">
                                </td>
                                <td>
                                    <input type="number" name="recommendations[{{ $type->id }}][total_recomended]" class="form-control form-control-sm" value="0" min="0">
                                </td>
                                <td>
                                    <input type="number" name="recommendations[{{ $type->id }}][total_darta]" class="form-control form-control-sm" value="0" min="0">
                                </td>
                                <td>
                                    <input type="number" name="recommendations[{{ $type->id }}][total_chalani]" class="form-control form-control-sm" value="0" min="0">
                                </td>
                                <td>
                                    <input type="text" name="recommendations[{{ $type->id }}][remarks]" class="form-control form-control-sm">
                                </td>
                                {{-- <td>
                                    <input type="file" name="recommendations[{{ $type->id }}][file]" class="form-control form-control-sm">
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">सबमिट गर्नुहोस्</button>
            </div>
        </form>

    </div>

    @endsection

    @push('scripts')
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    function fetchRecommendations() {
        const fiscalYearId = document.getElementById('fiscal_year_id').value;
        const month = document.getElementById('month').value;

        if (!fiscalYearId || !month) return;

        fetch(`{{ route('ward-recommendations.get') }}?fiscal_year_id=${fiscalYearId}&month=${month}`)
            .then(response => response.json())
            .then(data => {
                // recommendation type IDs array from Blade
                const recommendationTypeIds = @json($recommendationTypes->pluck('id'));

                recommendationTypeIds.forEach(typeId => {
                    const rec = data[typeId] || {};

                    document.querySelector(`input[name="recommendations[${typeId}][total_application]"]`).value = rec.total_application ?? 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_recomended]"]`).value = rec.total_recomended ?? 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_darta]"]`).value = rec.total_darta ?? 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_chalani]"]`).value = rec.total_chalani ?? 0;
                    document.querySelector(`input[name="recommendations[${typeId}][remarks]"]`).value = rec.remarks ?? '';
                });
            })
            .catch(() => {
                const recommendationTypeIds = @json($recommendationTypes->pluck('id'));

                recommendationTypeIds.forEach(typeId => {
                    document.querySelector(`input[name="recommendations[${typeId}][total_application]"]`).value = 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_recomended]"]`).value = 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_darta]"]`).value = 0;
                    document.querySelector(`input[name="recommendations[${typeId}][total_chalani]"]`).value = 0;
                    document.querySelector(`input[name="recommendations[${typeId}][remarks]"]`).value = '';
                });
            });
    }

    document.getElementById('fiscal_year_id').addEventListener('change', fetchRecommendations);
    document.getElementById('month').addEventListener('change', fetchRecommendations);

});
</script>
@endpush


