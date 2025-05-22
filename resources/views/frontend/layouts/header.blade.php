<div class=" pb-4">
    <header class="container header">

        
            <div class="d-flex justify-content-between align-items-center">
<div>
    <a href="https://revenue.fcgo.gov.np" class="btn btn-warning" target="_blank">अनलाईन कर भुक्तानी</a>

</div>
<div class=" text-theme-color kalimati-font" style="font-size: 20px; font-weight: 600;">     
               "{{ settings('sologan') }}"
            </div>
<div>
    
</div>

            </div>
       


        <div id="header" class="d-flex justify-content-between">
            <div class="d-flex align-items-center gap-3 gap-md-4">
                <div style="flex-shrink: 0;">
                    <img class="logo" src="{{ asset('images/nep-gov-logo.png') }}" alt="logo">
                </div>
                <div>
                    <h5 class="fw-bolder">{{ settings('app_name') }}</h5>
                    <h2 class="text-theme-color fw-bold">{{ settings('office_name') }}</h2>
                    <h6>{{ settings('province_name') }}, {{ settings('address_line_one') }}</h6>
                </div>
            </div>
            <div class="  text-theme-color kalimati-font" style="font-size: 13px;">
                {{-- <div class="text-end">
                    <h5 class="d-inline">
                        <span id="bsYear" class=""></span>
                        <span id="bsMonth" class=""></span>
                        <span id="bsDay" class=""></span>
                        <span>{{current_day()}}</span>
                    </h5>
                    <h6>
                        <span id="BsWeek"></span>
                    </h6>
                </div> --}}
                {{-- <span class="" style="margin-right: 20px;">
                    @php
                        date_default_timezone_set('Asia/Kathmandu');
                      echo  $currentTime = date('h:i');
                    @endphp
                    बजे</span> --}}
              <div class="d-flex justify-content-end pb-1 gap-2">

                 @if (settings()->get('logo'))
    <div class="mt-2">
        <img id="logo-preview" src="{{ asset('/storage/'.settings()->get('logo')) }}" class="border " alt="Logo Preview" style="max-width: 100px; max-height: 100px;">
    </div>
     
 @endif
                  <img class="logo" src="{{ asset('images/nepalflag.gif') }}" alt="Nepal Flag" srcset="">
              </div>

                   <div>
                       <h5 class="d-inline " style="font-size: 14px">
                        <span id="bsYear" class=""></span>
                        <span id="bsMonth" class=""></span>
                        <span id="bsDay" class=""></span>,
                        <span id="BsWeek"></span>
                        {{-- <span>{{current_day()}}</span> --}}
                    </h5>
                   </div>
            </div>
        </div>
    </header>
</div>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentDate = NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD');
        let bsYear = NepaliFunctions.GetCurrentBsYear();
        let bsMonth = NepaliFunctions.GetBsMonthInUnicode(NepaliFunctions.GetCurrentBsMonth() - 1);
        // let bsDay = NepaliFunctions.GetCurrentBsDay();
          let bsDay = {{current_day()}};
        let bsDate = NepaliFunctions.GetBsFullDate(currentDate, true, "YYYY-MM-DD");
        let bsWeek = NepaliFunctions.GetBsFullDayInUnicode(currentDate, 'YYYY-MM-DD');

        document.getElementById("bsYear").textContent = bsYear;
        document.getElementById("bsMonth").textContent = bsMonth;
        document.getElementById("bsDay").textContent = bsDay;
        document.getElementById("BsWeek").textContent = bsWeek;
    });
</script>
@endpush
