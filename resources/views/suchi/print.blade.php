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

    table {
        width: 100%;
    }

    table th,
    table td {
        font-size: 1em !important;
        border: 2px solid #000 !important;
        padding: 5px 10px;
    }

</style>
@endpush
{{-- <div class="doc-border"> --}}
<div>
    <div class="p-4 resizable-block">
        {{-- <x-municipality-letterhead></x-municipality-letterhead> --}}

        <section>
            <div class="text-center">
                नियम १८ को उपनियम १ संग सम्बन्धीत
            </div>
            <div class="my-4"></div>
            <div class="d-flex">
                <div class="resizable">
                    {!! settings('letter_application_recipient')!!}
                </div>
                <div class="ml-auto text-right resizable">
                    <div>मिति: <span class="nepali-date-today kalimati-font"></span></div>
                </div>
            </div>

            <div class="my-5 text-center font-weight-bold">
                <span class="border font-18px py-2 px-3">
                    विषय:- मौजुदा सूचीमा दर्ता गरी पाउँ ।
                </span>
            </div>

            <p>सार्वजनिक खरिद नियमावली, २०६४ को नियम १८ को उपनियम (१) बमोजिम तपशिलमा उल्लिखित
                विवरण अनुसारको पुष्ट्याई गर्ने कागजात संलग्न गरी मौजुदा सूचीमा दर्ता हुन यो निवेदन पेश गरेको छु ।</p>

            <table>
                <tr>
                    <td colspan="2">
                        मौजुदा सूचीको लागि निवेदन दिने व्यक्ति, संस्था, आपूर्तिकर्ता, निर्माण व्यवसायी, परामर्शदाता वा सेवा प्रदायकको विवरण :
                    </td>
                </tr>
                <tr>
                    <td>(1) नाम : {{ $suchi->name }}</td>
                    <td>(2) ठेगाना : {{ $suchi->address }}</td>
                </tr>
                <tr>
                    <td>(3) सम्पर्क व्यक्ति : {{ $suchi->contact_person }}</td>
                    <td>(4) इमेल : {{ $suchi->email }}</td>
                </tr>
                <tr>
                    <td>(5) टेलिफोन नं. : {{ $suchi->contact }}</td>
                    <td>(6) मोवाईल नं. : {{ $suchi->mobile }}</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>
                            2. मौजुदा सूचीमा दर्ता हुनको लागि संलग्न प्रमाणपत्र :
                        </div>
                        <div class="pl-4">
                            <div>
                                <span><input type="checkbox" @if ($suchi->reg_cert) checked @endif></span>
                                <span>संस्था वा फर्म दर्ताको प्रमाणपत्र</span>
                            </div>
                            <div>
                                <span><input type="checkbox" @if ($suchi->renew_cert) checked @endif></span>
                                <span>नविकरण गरेको प्रमाण-पत्र</span>
                            </div>
                            <div>
                                <span><input type="checkbox" @if ($suchi->pan_cert) checked @endif></span>
                                <span>मूल्य अभिवृद्धि कर वा स्थायी लेखा नम्बर दर्ताको प्रमाणपत्र</span>
                            </div>
                            <div>
                                <span><input type="checkbox" @if ($suchi->tax_cert) checked @endif></span>
                                <span>कर चुक्ताको प्रमाणपत्र</span>
                            </div>
                            <div>
                                <span><input type="checkbox" @if ($suchi->license_cert) checked @endif></span>
                                <span>कुन खरिदको लागि मौजुदा सूचीमा दर्ता हुन निवेदन दिने हो, सो कामको लागि इजाजत पत्र आवश्यक पर्ने भएमा सो को प्रतिलिपि</span>
                            </div>
                            <div>
                                <span><input type="checkbox" @if ($suchi->receipt) checked @endif></span>
                                <span>भुक्तानी गरेको रसिद वा बैंक भाैचर</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div>3. सार्वजनिक निकायबाट हुने खरिदको लागि दर्ता हुन चाहेको खरिदको प्रकृतिको विवरण:</div>
                        <div class="pl-4">
                            {{ optional($suchi->suchiType)->title }} : {{ $suchi->product_type }}
                        </div>
                    </td>
                </tr>
            </table>

            <div class="mt-5"></div>

            <div class="d-flex justify-content-between resizable">
                <div>
                    <div>निवेदन दिएको मिति :- <span class="nepali-date-today kalimati-font"></span></div>
                    <div>आ.ब. <span class="kalimati-font">{{ active_fiscal_year()->name }}</span></div>
                    <div>Token No: <span class="font-weight-semibold">{{ $suchi->token_no }}</span></div>
                </div>
                <div>
                    <div>फर्मको छाप :</div>
                </div>
                <div>
                    <div>निवेदको नाम: {{ $suchi->contact_person }}</div>
                    <div>हस्ताक्षर:</div>
                </div>
            </div>

            <div class="mt-2">
                <qr-code value="{{ $suchi->token_no }}" :size="100"></qr-code>
            </div>
        </section>
    </div>
</div>

@endsection
