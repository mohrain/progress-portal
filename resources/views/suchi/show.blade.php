@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item"><a href="{{route('suchi.index')}}">सूची दर्ता</a></li>
        <li class="breadcrumb-item active" aria-current="page">विवरण</li>
    </ol>
</nav>
@endsection

@push('styles')
<style>
    .heading-line {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .heading-line h4 {
        color: #1071e5;
        font-size: .9rem;
        font-weight: 600;
        letter-spacing: 0.025rem;
    }

    .heading-line:after {
        content: "";
        display: block;
        width: 1px;
        flex: 1 1;
        height: 1px;
        background-color: #cfe4ff;
        margin-left: 0.5rem;
    }

    .form-display {
        margin-bottom: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .form-display label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #5c5c5c;
        letter-spacing: 0.025rem;
        margin-bottom: 0;
    }

    .form-display .value {
        font-weight: 600;
    }

</style>
@endpush

@section('content')
<div class="container-fluid">
    {{-- @include('project.navigation') --}}
    <div class="my-3">
        @include('alerts.all')
    </div>
    <div class="row">
        <div class="col-md-9">
            <section class="box">
                <div class="box__header">
                    <h5 class="box__title">सूची विवरण</h5>
                </div>
                <div class="box__body">
                    @if(!$suchi->isRegistered())
                    <div class="text-danger mb-3">** यो सूची अझै दर्ता गरिएको छैन</div>
                    @endif
                    <div class="d-flex mb-3">
                        <div><span class="font-weight-bold">दर्ता नं :</span> {{ $suchi->full_reg_no }}</div>
                        <div class="ml-auto"><span class="font-weight-bold">दर्ता मिति :</span> {{ $suchi->reg_date }}</div>
                    </div>
                    <div class="d-flex mb-4">
                        <div><span class="font-weight-bold">टोकन नं. :</span> {{ $suchi->token_no }}</div>
                        <div class="ml-auto"><span class="font-weight-bold">आवेदन मिति :</span> {{ $suchi->application_date }}</div>
                    </div>

                    <section class="mb-3">
                        <div class="heading-line">
                            <h4>संस्था / व्यवसाय</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-form-value-display label="नाम" :value="$suchi->name"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="ठेगाना" :value="$suchi->address"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="सम्पर्क व्यक्ति" :value="$suchi->contact_person"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="फोन नं." :value="$suchi->contact"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="माेबाइल नंं." :value="$suchi->mobile"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="इमेल" :value="$suchi->email"></x-form-value-display>
                            </div>
                        </div>
                    </section>

                    <div class="section mb-3">
                        <div class="heading-line">
                            <h4>खरिदको प्रकृती</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-form-value-display label="प्रकार" :value="$suchi->suchiType->title"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="कारोबार गर्ने वस्तु" :value="$suchi->product_type"></x-form-value-display>
                            </div>
                        </div>
                    </div>

                    <div class="section mb-3">
                        <div class="heading-line">
                            <h4>रसिद</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <x-form-value-display label="रसिद नम्बर" :value="$suchi->receipt_no"></x-form-value-display>
                            </div>
                            <div class="col-md-4">
                                <x-form-value-display label="रकम" :value="'रु ' . $suchi->receipt_amount"></x-form-value-display>
                            </div>
                        </div>
                    </div>

                    <section class="mb-3">
                        {{-- Documents --}}
                        <div class="heading-line">
                            <h4>प्रमाणपत्र</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>संस्था वा फर्म दर्ताको प्रमाणपत्र</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->reg_cert) }}" target="_blank">{{ basename($suchi->reg_cert) }}</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>नविकरण गरेको प्रमाण-पत्र</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->renew_cert) }}" target="_blank">{{ basename($suchi->renew_cert) }}</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>मूल्य अभिबृद्धि कर वा स्थायी लेखा नम्बर दर्ताको प्रमाण-पत्र</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->pan_cert) }}" target="_blank">{{ basename($suchi->pan_cert) }}</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>कर चुक्ताको प्रमाण-पत्र</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->tax_cert) }}" target="_blank">{{ basename($suchi->tax_cert) }}</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>इजाजतपत्र</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->license_cert) }}" target="_blank">{{ basename($suchi->license_cert) }}</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-display">
                                    <label>भुक्तानी गरेको रसिद वा बैंक भाैचर</label>
                                    <div class="value"><a href="{{ get_file_url($suchi->receipt) }}" target="_blank">{{ basename($suchi->receipt) }}</a></div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </section>
        </div>
        <div class="col-md-3">
            <div class="d-flex flex-column">
                <a class="btn btn-primary z-depth-0" href="{{ route('suchi.edit', $suchi) }}">Edit</a>
                @if(!$suchi->isRegistered())
                <button type="button" class="btn btn-primary z-depth-0" data-toggle="modal" data-target="#registerSuchiModal">
                    Register
                </button>
                @endif
                <a class="btn btn-primary z-depth-0" href="#" onclick="openPrintWindow('{{ route('suchi-print-application', $suchi) }}')">Print Application</a>
                @if($suchi->isRegistered())
                <a class="btn btn-primary z-depth-0" href="#" onclick="openPrintWindow('{{ route('suchi-print-certificate', $suchi) }}')">Print Certificate</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerSuchiModal" tabindex="-1" role="dialog" aria-labelledby="registerSuchiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerSuchiLabel">दर्ता गर्नुहोस्</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <register-suchi-modal :suchi="{{ $suchi }}"></register-suchi-modal>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openPrintWindow(url) {
        let height = screen.availHeight;
        let width = screen.availWidth;
        window.open(url
            , 'newwindow'
            , `width=${width},height=${height}`);
        return false;
    }

</script>
@endpush
