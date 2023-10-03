@extends('layouts.letter')

@section('content')
@push('styles')
<style>
    .doc-border {
        padding: 2px;
        border: 7px solid;
        border-image: url('<?php echo asset('assets/img/border-image-kite.png') ?>') 33 / 7px / 0px repeat;
        border: 7px solid;
        border-image: url('<?php echo asset('assets/img/border-image-kite.png') ?>') 33 / 7px / 0px repeat;
    }

    .doc-border-line {
        border: 5px solid;
        border-image: url(https://yari-demos.prod.mdn.mozit.cloud/en-US/docs/Web/CSS/CSS_Background_and_Borders/Border-image_generator/border-image-5.png) 12 / 5px / 0px repeat;
    }

    .doc-border>div {
        content: '';
        border: 2px solid #000;
    }

    .border {
        border: 2px solid #000 !important;
    }

    table th,
    table td {
        font-size: 1em !important;
        border: 2px solid #000 !important;
    }

</style>
@endpush
{{-- <div class="doc-border"> --}}
<div>
    <div class="p-4 resizable-block">
        <div class="text-center">
            <div>अनुसुची (२) ख</div>
            <div>नियम १८ को उपनियम २ संग सम्बन्धीत</div>
        </div>
        <br>

        <x-municipality-letterhead></x-municipality-letterhead>

        <section>
            <div class="my-4"></div>
            <div class="d-flex">
                <div class="ml-auto text-right resizable">
                    <div>मिति: <span class="nepali-date-today kalimati-font"></span></div>
                </div>
            </div>

            <div class="my-5 text-center font-weight-bold">
                <span class="border font-18px py-2 px-3">
                    मौजुदा सुची दर्ता भएको प्रमाण
                </span>
            </div>

            {{-- <div>प्र.प.नं. : {{ $suchi->reg_no }}</div> --}}
            <div>सूची दर्ता नं. : <span class="kalimati-font">{{ $suchi->full_reg_no }}</span></div>
            <br>
            <p>
                श्री {{ $suchi->name }} बाट यस घोडाघोडी नगरपालिका र अन्तर्गतका कार्यालयमा आर्थिक वर्ष <span class="kalimati-font">{{ active_fiscal_year()->name }}</span> का लागि {{ $suchi->product_type }} निर्माण कार्य / सेवा / मालसामान उपलब्ध गराउने प्रयोजनार्थ मौजुदा सूचीमा सुचीकृत हुन पाउ भनी मिति <span class="kalimati-font">{{ $suchi->reg_date }}</span> मा यस कार्यालयमा निवेदन प्राप्त हुन आएकोले मौजुदा सूची दर्ता गरी यो प्रमाण उपलब्ध गराईएको छ ।
            </p>

            <div class="d-flex">
                <div class="ml-auto">
                    <div>.................................</div>
                    <div>दर्ता गर्ने अधिकारीको :</div>
                    <div>नाम : {{ settings('letter_officer_name') }}</div>
                    <div>पद : {{ settings('letter_officer_designation') }}</div>
                    <div>मिति : <span class="nepali-date-today kalimati-font"></span></div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
