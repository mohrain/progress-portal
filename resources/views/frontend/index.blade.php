@extends('frontend.layouts.app', ['title' => __('गृह')])

@section('content')
<div class="d-md-none container ">

    <div>
        <x-frontend.news-scroll />
        <x-carousel-image-view />

    </div>

    <div>
        <x-office-breaer-mobile />
    </div>
    <div>
        @include('frontend.mobile.mobile-home')
    </div>

    <div>
        @include('frontend.mobile.news-event')
    </div>


</div>

<div class="container d-md-block d-none">
    <x-frontend.news-scroll />
    <div class="row">
        <div class="col-md-9 pb-4">
            {{-- @include('frontend.carousel.index') --}}
            <x-carousel-image-view />
        </div>
        <div class="col-md-3">
            <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
                प्रमुख/उप-प्रमुख
            </div>
            <x-frontend-office-brearer-view />
            <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
                प्रमुख प्रशासकीय अधिकृत
            </div>
            <x-frontend-provincial-assembly-secretary-view />
        </div>
    </div>
    <div class="row" style="position: relative">
        <div class="col-md-9"></div>
        <div class="col-md-9 pb-3">
            {{-- <div class="bg-theme-color-blue py-3 text-center">
                सुदूरपश्चिम प्रदेश सभाको परिचय
            </div>
            <div class="card">
                <div class="card-body">
                    <x-frontend-about-us-view />
                </div>
            </div> --}}

            <div class="card  border-0 rounded-2 shadow-sm  h-100 p-3 " style="height: 100px">
                <div class="card-header bg-transparent border-0">
                    <h5 class="fw-bolder">परिचय</h5>
                    <h3 class="font-nato color-secondary fw-bold"> {{ settings('app_name') }} </h3>
                </div>
                <div class="card-body card-body-with-bg">
                    {{-- <h5 class="fw-bolder text-primary text-center mb-3">कार्यपालिकाको परिचय</h5> --}}
                    <x-frontend-about-us-view />
                </div>
            </div>
        </div>
        <div class="col-md-3 h-100">
            @include('frontend.layouts.sidebar')
        </div>
    </div>

</div>


<div class="bg-white ">
    <div class="container">
        <div class="row p-3 py-5  mt-5">
            <h5 class="sub-heading">सेवा</h5>
            <h3 class="main-heading">पालिकाको सेवाहरु</h3>
        
         <div class="py-5">
            <x-department-front-view />
         </div>
        </div>

    </div>
</div>

<div style="">
    <div class="container py-4">
        <div class="row  py-5 ">
            <div class="col-md-6 ">
                {{-- <h5 class="fw-bolder">सेवाहरु</h5>
                    <h3 class="font-nato color-secondary fw-bold mb-3">अनलाईन सेवाहरु</h3> --}}
                    
                    <div class="d-flex justify-content-center">
                       <h3 class="main-heading ">अनलाईन सेवाहरु</h3>
                    </div>
                    <div>
                        <x-service-view />
                    </div>
                </div>
        
            <div class="col-md-6 ">
                {{-- <h5 class="sub-heading">सूचना </h5> --}}
                {{-- <h3 class=" main-heading">पालिकाको सेवाहरु</h3> --}}
        
                <news-list base-url="/api/post-categories" />
        
            </div>
        </div>
    </div>
</div>


<div class="bg-white">
    <div class="container ">
    
        <div class="row  p-3 py-5  mt-5">

            <h5 class="sub-heading">सूचना</h5>
            <h3 class="main-heading">सूचना र समाचार</h3>

    
            <div class="row my-2 mt-3">
                    <x-procincial-assembly-meeting-view />
                {{-- <div class="col-md-6">
                    <div class="bg-theme-color-blue py-3 text-center">
                        समितिका बैठक सम्बन्धी सूचना
                    </div>
                    <x-procincial-committee-meeting-view />
                </div> --}}
            </div>
        </div>
    
    
       
    
    
        {{-- <x-frontend-news /> --}}
    
       
    
        <div class="row my-2 py-5">
    
            <div class="col-md-6 ">
    
                <news-list base-url="/api/primary-menus" />
    
            </div>
        </div>
        {{-- <div >
            <x-frontend.gallery />
            </div> --}}
  
    </div>


</div>

<div class="">
    <div class="container py-5  ">
      
        <div class="row py-5">
        
            <div class="col-md-4 ">
                <div class="fb-page" data-href="{{ settings('facebook') }}" data-tabs="timeline" data-width="340"
                    data-height="410" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                    data-show-facepile="true">
                    <blockquote cite="{{ settings('facebook') }}" class="fb-xfbml-parse-ignore">
                        <a href="{{ settings('facebook') }}">Ghodaghodi mun</a>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-4 " style="overflow:hidden">
                <div class="bg-theme-color-blue py-3 text-center">
                    Google Maps
                </div>
                <div>
                    {!! settings('maps') !!}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <x-modal-image-view /> --}}
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush

@push('styles')
<style>
    .card-body-with-bg {
        position: relative;
        overflow: hidden;
    }

    .card-body-with-bg::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-image: url('assets/img/no-image.png');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.1;
        /* Adjust only background image opacity */
        z-index: 0;
    }

    .card-body-with-bg>* {
        position: relative;
        z-index: 1;
        /* Ensure content stays above the background image */
    }

    .main-heading {
  font-family: 'Noto Sans', sans-serif; /* or your 'nato' class */
  font-size: 2rem;
  color: #1c4267; /* Darker for emphasis */
  font-weight: 700;
  margin-bottom: 1rem;
  display: inline-block;
  padding-bottom: 5px;
}

.sub-heading {
  font-size: 1.2rem;
  color: #982121; /* Lighter grey */
  font-weight: 600;
  margin-bottom: 0.75rem;
  padding-left: 10px;
  border-left: 4px solid #982121;
}

</style>
@endpush