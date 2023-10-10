@foreach ($modalImages as $modalImage)
    <div class="modal fade" id="imageModal-{{ $modalImage->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">{{ $modalImage->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div>
                        @php
                            $fileName = asset('storage/' . $modalImage->image);
                            $ext = substr(strrchr($fileName, '.'), 1);
                            
                        @endphp
                        <object data="{{ asset('storage/' . $modalImage->image) }}" type="application/pdf"
                            width="100%" height="500px">
                            <p>Unable to display PDF file. <a
                                    href="{{ asset('storage/' . $modalImage->image) }}">Download</a>
                            </p>
                        </object>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <script>
            $(document).ready(function() {
                console.log("ready!");
                $("#imageModal-{{ $modalImage->id }}").modal('show');
            });
        </script>
    @endpush
@endforeach
