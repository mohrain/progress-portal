@extends('layouts.app', ['title' => __('प्राय: सोधिने प्रश्न')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'प्राय: सोधिने प्रश्न' }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ $frequentlyAskedQuestion->id ? route('faq.update', $frequentlyAskedQuestion) : route('faq.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($frequentlyAskedQuestion->id)
                                @method('put')
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label required">प्रश्न</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $frequentlyAskedQuestion->title) }}" id="title"
                                            aria-describedby="title">
                                        <div class="invalid-feedback">
                                            @error('title')
                                                {{ $message }}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">उत्तर</label>
                                        <textarea name="descriptions" id="summernote"  cols="30" rows="10">{{old('descriptions', $frequentlyAskedQuestion->descriptions) }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $frequentlyAskedQuestion->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
