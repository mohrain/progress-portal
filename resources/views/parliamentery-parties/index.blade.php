@extends('layouts.app', ['title' => __('राजनीतिक दल')])

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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'राजनीतिक दल' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $parliamentaryParty->id ? route('parliamentary-parties.update', $parliamentaryParty) : route('parliamentary-parties.store') }}"
                            method="post">
                            @csrf
                            @if ($parliamentaryParty->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">राजनीतिक दल</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $parliamentaryParty->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $parliamentaryParty->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>राजनीतिक दल</th>
                                    <th></th>
                                </thead>
                                <tbody id="sortable-parliamentary-parties">
                                    @forelse($parliamentaryPartys as $parliamentaryParty)
                                        <tr data-id="{{ $parliamentaryParty->id }}"
                                            data-order="{{ $parliamentaryParty->position ?? 0 }}">
                                            <td class="sort-handle">{{ $parliamentaryParty->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('parliamentary-parties.show', $parliamentaryParty) }}">Show</a> --}}

                                                        <a class="dropdown-item "
                                                            href="{{ route('parliamentary-parties.edit', $parliamentaryParty) }}">Edit</a>

                                                        <form action="{{ route('parliamentary-parties.destroy', $parliamentaryParty) }}"
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
                        {{-- {{ $parliamentaryPartys->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-parliamentary-parties').sortable({
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
                    var parliamentaryPartys = [];
                    $('.order-updated').each(function() {
                        parliamentaryPartys.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(parliamentaryPartys);
                    axios({
                        method: 'put',
                        url: "{{ route('parliamentary-parties.sort') }}",
                        data: {
                            parliamentaryPartys: parliamentaryPartys,
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
