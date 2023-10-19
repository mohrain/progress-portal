@extends('layouts.app', ['title' => __('सूचना अधिकारीहरु')])
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
@section('content')
    <div class="container-fluid mt--7">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="box">
                    <div class="box__body">

                        <form
                            action="{{ $informationOfficer->id ? route('information-officers.update', $informationOfficer) : route('information-officers.store') }}"
                            method="POST">
                            @if ($informationOfficer->id)
                                @method('put')
                            @endif
                            @csrf

                            <div class="form-group">
                                <x-employee-designation-select :informationOfficer="$informationOfficer" />
                            </div>
                            <div class="form-group">
                                <x-information-officer-employee-select :informationOfficer="$informationOfficer" />
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="btn btn-primary z-depth-0 ml-0">{{ $informationOfficer->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">सूचना अधिकारीहरु</div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered kalimati-font">
                                <thead>
                                    <th></th>
                                    <th>नाम</th>
                                    <th>पद</th>
                                    <th></th>
                                </thead>
                                <tbody id="sortable-information-officers">
                                    @forelse($informationOfficers as $informationOfficer)
                                        <tr data-id="{{ $informationOfficer->id }}"
                                            data-order="{{ $informationOfficer->position ?? 0 }}">
                                            <td class="sort-handle">
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $informationOfficer->employee->profile ? asset('storage/' . $informationOfficer->employee->profile) : asset('assets/img/no-image.png') }}"
                                                    class="profile-nav">
                                            </td>
                                            <td>{{ $informationOfficer->employee->name }}</td>
                                            <td>
                                                {{ $informationOfficer->EmployeeDesignation->name }}
                                            </td>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">

                                                        <a class="dropdown-item "
                                                            href="{{ route('information-officers.edit', $informationOfficer) }}">Edit</a>

                                                        <form
                                                            action="{{ route('information-officers.destroy', $informationOfficer) }}"
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
                                            <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <button id="update-menu-order-btn" type="button" class="btn btn-primary mx-0 mt-3">
                            क्रमबद्ध मिलाउनुहोस्
                        </button>
                        {{-- {{ $informationOfficers->links() }} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-information-officers').sortable({
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
                    var informationOfficers = [];
                    $('.order-updated').each(function() {
                        informationOfficers.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(informationOfficers);
                    axios({
                        method: 'put',
                        url: "{{ route('information-officers.sort') }}",
                        data: {
                            informationOfficers: informationOfficers,
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
