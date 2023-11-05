<div class="bg- py-4">
    <header class="container header">
        <div id="header" class="d-flex justify-content-between">
            <div class="d-flex align-items-center gap-3 gap-md-4">
                <div>
                    <img class="logo" src="{{ asset('images/pradeshsavalogo-sudurpaschim.png') }}" alt="pradeshsavalogo-sudurpaschim" srcset="">
                </div>
                <div>
                    <h5 class="fw-bolder">{{ settings('app_name') }}</h5>
                    <h2 class="text-theme-color fw-bold">{{ settings('office_name') }}</h2>
                    <h6>{{ settings('province_name') }}, {{ settings('address_line_one') }}</h6>
                </div>
            </div>
            <div class="d-flex gap-2 align-items-center text-theme-color kalimati-font" style="font-size: 13px;">
                <div class="text-end">
                    <h5 class="d-inline">
                        <span id="bsDay"></span> {{-- गते, --}}
                        <span id="bsMonth"></span>
                        <span id="bsYear"></span>
                    </h5>
                    <h6>
                        <span id="BsWeek"></span>
                    </h6>
                </div>
                {{-- <span class="" style="margin-right: 20px;">
                    @php
                        date_default_timezone_set('Asia/Kathmandu');
                      echo  $currentTime = date('h:i');
                    @endphp
                    बजे</span> --}}
                <img class="logo" src="{{ asset('images/nepalflag.gif') }}" alt="Nepal Flag" srcset="">
            </div>
        </div>
    </header>
</div>

@push('scripts')
<script>
    let currentDate = NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD');
    let bsYear = NepaliFunctions.GetCurrentBsYear();
    let bsMonth = NepaliFunctions.GetBsMonthInUnicode(NepaliFunctions.GetCurrentBsMonth());
    let bsDay = NepaliFunctions.GetCurrentBsDay();

    let bsDate = NepaliFunctions.GetBsFullDate(currentDate, true, "YYYY-MM-DD", );
    let bsWeek = NepaliFunctions.GetBsFullDayInUnicode(currentDate, 'YYYY-MM-DD')
    document.getElementById("bsYear").textContent = bsYear;
    document.getElementById("bsMonth").textContent = bsMonth;
    document.getElementById("bsDay").textContent = bsDay;

    document.getElementById("BsWeek").textContent = bsWeek;

</script>
@endpush
