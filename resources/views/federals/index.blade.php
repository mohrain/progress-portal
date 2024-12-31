@extends('layouts.app')

@section('content')
    <div class="card z-depth-0">
        <div class="card-body">
            <form action="{{ route('federal.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                {{-- @isset($district->id)
            @method('put')
            @endisset --}}
                <div class="form-group">
                    <label for="input-name">विवरण</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="summernote"
                        cols="30" rows="10" placeholder="Text Message">{{ old('description', $federalParliment->description ?? '') }}</textarea>
                    <x-invalid-feedback field="description" />
                </div>
                <div class="form-group">
                    <label for="san">संगठनात्मक संरचना</label>
                    <div>
                        @if ($federalParliment?->document)
                            <a class="text-theme-color fw-bold" target="_blank"
                                href="{{ asset('storage') . '/' . $federalParliment->document }}"> संरचना download here <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cloud-download" viewBox="0 0 16 16">
                                    <path
                                        d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383" />
                                    <path
                                        d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                                </svg> </a>
                            <label class="ms-5 text-danger" for="san">परिबर्तन गर्नुहोस् <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-repeat" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                </svg></label>

                            <div>
                                {{-- <span class="fw-bold"> नयाँ संग्रचना :</span> --}}
                                <span id="file-name" class="ml-2 fw-bold border  "></span>
                            </div>
                            <input id="san" type="file" class="d-none" name="document"
                                onchange="showFileName(event)">
                        @else
                            <input id="san" type="file" class="form-control" name="document">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {{-- <button type="submit" class="btn btn-success z-depth-0">{{ $district->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button> --}}
                    <button type="submit" class="btn btn-success z-depth-0">सेभ गर्नुहोस्</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(event) {
            const input = event.target; // Get the input element
            const fileNameSpan = document.getElementById('file-name'); // Get the span to display the file name

            if (input.files && input.files[0]) {
                fileNameSpan.textContent = input.files[0].name; // Set the file name
            } else {
                fileNameSpan.textContent = ''; // Clear the span if no file is chosen
            }
        }
    </script>
@endsection
