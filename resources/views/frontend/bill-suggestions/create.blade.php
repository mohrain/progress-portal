@extends('frontend.layouts.app', ['title' => __($bill->name)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="frontend-title">
                    {{ $bill->name }}
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="">
                    <form action="{{ route('bill-suggestions.store', $bill) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row box my-2 p-2">
                                    <div class="col-md-3 mb-2">
                                        <label for="name" class="form-label required">नाम, थर</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" id="name" aria-describedby="name"
                                            placeholder="नाम, थर">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="email"
                                            class="form-label text-md-end required">{{ __('इमेल') }}</label>
                                        <input id="name" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" placeholder="इमेल">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="contact_number"
                                            class="form-label text-md-end required">{{ __('सम्पर्क-नम्बर') }}</label>
                                        <input id="name" type="tel"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            name="contact_number" value="{{ old('contact_number') }}"
                                            autocomplete="contact_number" placeholder="सम्पर्क-नम्बर">
                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="address"
                                            class="form-label text-md-end required">{{ __('ठेगाना') }}</label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" autocomplete="address" placeholder="ठेगाना">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 box p-2">
                                <div class="d-flex justify-content-between">
                                    <b>
                                        सुझाव
                                    </b>
                                    <div>
                                        <button id="rowAdder" type="button" class="btn btn-dark">
                                            <i class="bi bi-plus-square-dotted">
                                            </i> थप
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " id="newinput">
                                <div class="row box my-2 p-2" id="row">
                                    <div class="col-md-2 mb-2">
                                        <label for="section" class="form-label text-md-end ">{{ __('दफा') }}</label>
                                        <input id="section" type="text"
                                            class="form-control @error('section') is-invalid @enderror" name="section[]"
                                            value="{{ old('section[]') }}" autocomplete="section" placeholder="दफा">
                                        @error('section')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="sub_section"
                                            class="form-label text-md-end ">{{ __('उपदफा') }}</label>
                                        <input id="sub_section" type="text"
                                            class="form-control @error('sub_section') is-invalid @enderror"
                                            name="sub_section[]" value="{{ old('sub_section[]') }}"
                                            autocomplete="sub_section" placeholder="उपदफा">
                                        @error('sub_section')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="sec" class="form-label text-md-end ">{{ __('खण्ड') }}</label>
                                        <input id="sec" type="text"
                                            class="form-control @error('sec') is-invalid @enderror" name="sec[]"
                                            value="{{ old('sec[]') }}" autocomplete="sec" placeholder="खण्ड">
                                        @error('sec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 text-end mt-4">
                                        {{-- <button class="btn btn-danger bg-danger text-white" id="DeleteRow"
                                            type="button"> <i class="bi bi-trash"></i>हटाउनु होस्</button> --}}
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="current_arrangement"
                                            class="form-label text-md-end ">{{ __('हालको व्यवस्था') }}</label>
                                        <textarea id="current_arrangement" class="form-control @error('current_arrangement') is-invalid @enderror"
                                            name="current_arrangement[]" rows="5" placeholder="हालको व्यवस्था">{{ old('current_arrangement[]') }}</textarea>
                                        @error('current_arrangement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="procedure_of_amendment"
                                            class="form-label text-md-end ">{{ __('संशोधनको व्यहोरा') }}</label>
                                        <textarea id="procedure_of_amendment" class="form-control @error('procedure_of_amendment') is-invalid @enderror"
                                            name="procedure_of_amendment[]" rows="5" placeholder="संशोधनको व्यहोरा">{{ old('procedure_of_amendment[]') }}</textarea>
                                        @error('procedure_of_amendment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="reason" class="form-label text-md-end ">{{ __('कारण') }}</label>
                                        <textarea id="reason" class="form-control @error('reason') is-invalid @enderror" name="reason[]" rows="5"
                                            placeholder="कारण">{{ old('reason[]') }}</textarea>
                                        @error('reason')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 box my-2 p-2">
                                <label for="file"
                                    class="form-label text-md-end ">{{ __('फाइल [Image or PDF format upto 2MB.]') }}</label>
                                <input id="file" type="file"
                                    class="form-control @error('file') is-invalid @enderror" name="file"
                                    value="{{ old('file') }}" autocomplete="file" placeholder="ठेगाना">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">पठाउनुहोस्</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 my-3">
                <object data="{{ asset('storage/' . $bill->entry_bill_file) }}" type="application/pdf" width="100%"
                    height="800px">
                    <p>Unable to display PDF file. <a href="{{ asset('storage/' . $bill->entry_bill_file) }}">Download</a>
                    </p>
                </object>
            </div>

        </div>
    </div>
@endsection
@push('scripts')

    <script type="text/javascript">
        $("#rowAdder").click(function() {
            newRowAdd =
                '<div class="row box my-2 p-2" id="row"><div class="col-md-2 mb-2"><label for="section" class="form-label text-md-end ">{{ __('दफा') }}</label><input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section[]" value="{{ old('section[]') }}" autocomplete="section" placeholder="दफा"> @error('section')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>' +
                '<div class="col-md-2 mb-2"><label for="sub_section" class="form-label text-md-end ">{{ __('उपदफा') }}</label><input id="sub_section" type="text" class="form-control @error('sub_section') is-invalid @enderror" name="sub_section[]" value="{{ old('sub_section[]') }}" autocomplete="sub_section" placeholder="उपदफा">@error('sub_section')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>' +
                '<div class="col-md-2 mb-2"><label for="sec" class="form-label text-md-end ">{{ __('खण्ड') }}</label><input id="sec" type="text" class="form-control @error('sec') is-invalid @enderror" name="sec[]" value="{{ old('sec[]') }}" autocomplete="sec" placeholder="खण्ड"> @error('sec')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>' +
                '<div class="col-md-6 text-end mt-4"><button class="btn btn-danger bg-danger text-white" id="DeleteRow" type="button"> <i class="bi bi-trash"></i>हटाउनु होस्</button></div>' +
                '<div class="col-md-4 mb-2"><label for="current_arrangement" class="form-label text-md-end ">{{ __('हालको व्यवस्था') }}</label><textarea id="current_arrangement" class="form-control @error('current_arrangement') is-invalid @enderror"name="current_arrangement[]" rows="5" placeholder="हालको व्यवस्था">{{ old('current_arrangement[]') }}</textarea>@error('current_arrangement')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>' +
                '<div class="col-md-4 mb-2"><label for="procedure_of_amendment" class="form-label text-md-end ">{{ __('संशोधनको व्यहोरा') }}</label><textarea id="procedure_of_amendment" class="form-control @error('procedure_of_amendment') is-invalid @enderror" name="procedure_of_amendment[]" rows="5" placeholder="संशोधनको व्यहोरा">{{ old('procedure_of_amendment[]') }}</textarea>@error('procedure_of_amendment')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div>' +
                '<div class="col-md-4 mb-2"><label for="reason" class="form-label text-md-end ">{{ __('कारण') }}</label><textarea id="reason" class="form-control @error('reason') is-invalid @enderror" name="reason[]" rows="5" placeholder="कारण">{{ old('reason[]') }}</textarea>@error('reason')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div>';
            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            // console.log("delete");
            $(this).parents("#row").remove();
        });
    </script>
@endpush
