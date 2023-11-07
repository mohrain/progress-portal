{{-- <h3 class="cust-title-1 mb-3">फोटो ग्यालरी</h3> --}}
<div class="box mb-4">
    <div class="box__body">
        <h3 class="fw-bolder text- text-primary mt-2 mb-4">फोटो ग्यालरी</h3>
        {{-- <h3 class="cust-title-2">फोटो ग्यालरी</h3> --}}
        <frontend-albums />
    </div>
</div>

@push('styles')
<style>
    .cust-title-1 {
        max-width: 300px;
        font-weight: 600;
        font-size: 18px;
        background: #2460b9;
        color: #fff;
        padding: 10px;
        line-height: 1.7em;
        box-shadow: 0 2px 10px 0 #cac9c9;
        text-align: center;
        user-select: none;
        cursor: pointer;
        border-left: 20px solid #e64555;
    }

    .cust-title-2 {
        background-color: #105592;
        color: #fff;
        margin-bottom: 1rem;
        padding: 10px 15px;
        display: inline-block;
        font-size: 1.3rem;
        font-weight: 600;
        box-shadow: 2px 3px 3px #ff7676;
    }

</style>
@endpush
