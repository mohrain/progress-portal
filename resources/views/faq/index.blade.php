@extends('layouts.app', ['title' => __('प्राय: सोधिने प्रश्नहरू')])

@section('content')
    @push('styles')
        <style>
            .sortable-placeholder {
                border: 2px dashed #4285f4;
                height: 35px;
            }

            .sort-handle:hover {
                cursor: pointer;
            }
        </style>
    @endpush
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'प्राय: सोधिने प्रश्नहरू' }}
                            </div>
                            <div>
                                <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">नयाँ थप</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>प्रश्न</th>
                                    <th>उत्तर</th>
                                    <th></th>
                                </thead>
                                <tbody id="sortable-faq">
                                    @forelse($frequentlyAskedQuestions as $frequentlyAskedQuestion)
                                        <tr data-id="{{ $frequentlyAskedQuestion->id }}"
                                            data-order="{{ $frequentlyAskedQuestion->position ?? 0 }}">
                                            <td class="sort-handle">{{ $frequentlyAskedQuestion->title }}</td>
                                            <td>
                                                {!! $frequentlyAskedQuestion->descriptions !!}
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('faq.show', $frequentlyAskedQuestion) }}">Show</a> --}}

                                                        <a class="dropdown-item "
                                                            href="{{ route('faq.edit', $frequentlyAskedQuestion) }}">Edit</a>

                                                        <form action="{{ route('faq.destroy', $frequentlyAskedQuestion) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit" onclick="return confirm('Are You Sure ?')">
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    @empty
                                    <tr>
                                        <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <button id="update-menu-order-btn" type="button" class="btn btn-primary mx-0 mt-3">
                            क्रमबद्ध मिलाउनुहोस्
                        </button>
                        {{ $frequentlyAskedQuestions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-faq').sortable({
                    handle: '.sort-handle',
                    placeholder: 'sortable-placeholder',
                    update: function(event, ui) {
                        $(this).children().each(function(index) {
                            if ($(this).attr('data-order') != (index + 1)) {
                                $(this).attr('data-order', (index + 1)).addClass('order-updated');
                            }
                        });
                    }
                });

                function persistUpdatedOrder() {
                    var frequentlyAskedQuestions = [];
                    $('.order-updated').each(function() {
                        frequentlyAskedQuestions.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(frequentlyAskedQuestions);
                    axios({
                        method: 'put',
                        url: "{{ route('faq.sort') }}",
                        data: {
                            frequentlyAskedQuestions: frequentlyAskedQuestions,
                        }
                    }).then(function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            // showAlert('default', response.data.message);
                        }
                    });
                }

                $('#update-menu-order-btn').click(function(e) {
                    e.preventDefault();
                    persistUpdatedOrder();
                });
            });
        </script>
    @endpush
@endsection
