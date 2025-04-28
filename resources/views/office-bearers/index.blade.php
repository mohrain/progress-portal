@extends('layouts.app', ['title' => __('पदाधिकारीहरु')])
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
    <div class="box my-3">
        <div class="box__body">

            @php
            $officeBearersDesignations = \App\Models\OfficeBearerDesignation::all();
            $wardNumbers = range(1, 14);
            @endphp



            <form
                action="{{ $officeBearer->id ? route('office-bearers.update', $officeBearer) : route('office-bearers.store') }}"
                method="POST" class="form">
                @csrf
                @if ($officeBearer->id)
                @method('put')
                @endif
                <div class="row">
                    <div class="col-md-2 form-group">
                        <x-office-bearer-election-select :officeBearer="$officeBearer" />
                    </div>
                    <!-- <div class="col-md-2 form-group">
                        <label for="designation" class="form-label required">{{ __('पद') }}</label>

                        <select class="form-control" name="designation" id="designation"
                            aria-label="Default select example">
                            <option value="1" {{ $officeBearer->designation == '1' ? 'selected' : '' }}>
                                सभामुख</option>
                            <option value="0" {{ $officeBearer->designation == '0' ? 'selected' : '' }}>
                                उपसभामुख</option>
                        </select>


                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> -->
                    <div class="col-md-2 form-group">
                        <label for="office_bearer_designation_id" class="form-label required">{{ __('पद') }}</label>

                        <select class="form-control" name="office_bearer_designation_id" id="office_bearer_designation_id"
                            aria-label="Default select example">
                            <option value="">पद</option>
                            @foreach ($officeBearersDesignations as $designation)
                            <option value="{{ $designation->id }}" {{ $officeBearer->designation == $designation->id ? 'selected' : '' }}>
                                {{ $designation->name }}
                            </option>

                            @endforeach
                        </select>


                        @error('office_bearer_designation_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="ward_number" class="form-label ">{{ __('वडा') }}</label>

                        <select class="form-control" name="ward_number" id="ward_number"
                            aria-label="Default select example">
                            <option value="">वडा</option>
                            @foreach ($wardNumbers as $ward)
                            <option value="ward">
                                {{ $ward}}
                            </option>

                            @endforeach

                        </select>


                        @error('office_bearer_designation_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <x-office-bearer-member-select :officeBearer="$officeBearer" />
                    </div>
                    <div class="col-md-2 form-group">
                        <label class="required" for="input-office-bearers-start">सुरु मिति</label>
                        <input type="text" name="start" id="input-office-bearers-start"
                            class="form-control kalimati-font nepali-date-picker "
                            value="{{ old('start', $officeBearer->start) }}" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-2 form-group">
                        <label class="" for="input-office-bearers-end">समाप्त मिति</label>
                        <input type="text" name="end" id="input-office-bearers-end"
                            class="form-control kalimati-font nepali-date-picker"
                            value="{{ old('end', $officeBearer->end) }}" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit"
                            class="btn btn-primary z-depth-0 ml-0">{{ $officeBearer->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">पदाधिकारीहरु</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-md table-bordered kalimati-font">
                            <thead>
                                <th></th>
                                <th>नाम</th>
                                <th>पद</th>
                                <th>निर्वाचन वर्ष</th>
                                <th>सुरु मिति</th>
                                <th>समाप्त मिति</th>
                                <th></th>
                            </thead>
                            <tbody id="sortable-office-bearer">
                                @forelse($officeBearers as $officeBearer)
                                <tr data-id="{{ $officeBearer->id }}"
                                    data-order="{{ $officeBearer->position ?? 0 }}">
                                    <td class="sort-handle">
                                        <img id="newProfilePhotoPreview"
                                            src="{{ $officeBearer->member->profile ? asset('storage/' . $officeBearer->member->profile) : asset('assets/img/no-image.png') }}"
                                            class="profile-nav">
                                    </td>
                                    <td>{{ $officeBearer->member->name }}</td>
                                    <td>
                                        {{ $officeBearer->designation == true ? 'सभामुख' : 'उपसभामुख' }}
                                    </td>
                                    <td>
                                        {{ $officeBearer->election->name }}
                                    </td>
                                    <td>
                                        {{ $officeBearer->start }}
                                    </td>
                                    <td>
                                        {{ $officeBearer->end }}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class=" btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-arrow">

                                                <a class="dropdown-item "
                                                    href="{{ route('office-bearers.edit', $officeBearer) }}">Edit</a>

                                                <form action="{{ route('office-bearers.destroy', $officeBearer) }}"
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
                    {{ $officeBearers->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        // Sorting
        $('#sortable-office-bearer').sortable({
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
            var officeBearers = [];
            $('.order-updated').each(function() {
                officeBearers.push({
                    id: $(this).attr('data-id'),
                    position: $(this).attr('data-order')
                });
            });
            console.table(officeBearers);
            axios({
                method: 'put',
                url: "{{ route('office-bearers.sort') }}",
                data: {
                    officeBearers: officeBearers,
                }
            }).then(function(response) {
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