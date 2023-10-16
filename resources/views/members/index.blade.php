@extends('layouts.app', ['title' => __('सदस्यहरु')])

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
                                {{ $title = 'सदस्यहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary">नयाँ पोस्ट</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" style="white-space: nowrap;">
                                <thead>
                                    <th>फोटो</th>
                                    <th>नाम</th>
                                    <th>निर्वाचन</th>
                                    <th>राजनितिक दल</th>
                                    <th>लिङ्ग</th>
                                    <th>जन्म मिति</th>
                                    <th>ठेगाना</th>
                                    <th>सम्पर्क</th>
                                    <th>बाबु/आमाको नाम</th>
                                    <th></th>
                                </thead>
                                <tbody id="sortable-member">
                                    @forelse($members as $member)
                                        <tr data-id="{{ $member->id }}" data-order="{{ $member->position ?? 0 }}">
                                            <td class="sort-handle">
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $member->profile ? asset('storage/' . $member->profile) : asset('assets/img/no-image.png') }}"
                                                    class="profile-nav">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $member->name }}
                                                </div>
                                                <div>
                                                    {{ $member->name_english }}
                                                </div>
                                            </td>
                                            <td>
                                                <div> {{ $member->election->name }}</div>
                                                <div>{{ $member->election_district }}, {{ $member->election_area }}</div>

                                            </td>
                                            <td>
                                                <div> {{ $member->parliamentaryParty->name }}</div>
                                                <div> ({{ $member->election_process }})</div>
                                            </td>
                                            <td>
                                                {{ $member->gender }}
                                            </td>
                                            <td style="white-space: nowrap;">{{ $member->dob }}</td>

                                            <td>
                                                <div style="white-space: nowrap;">
                                                    <b>स्थाई :</b> {{ $member->permanent_address }},
                                                    {{ $member->permanent_address_district }}
                                                </div>
                                                <div style="white-space: nowrap;">
                                                    <b>अस्थायी :</b> {{ $member->temporary_address }},
                                                    {{ $member->temporary_address_district }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $member->mobile }}
                                                </div>
                                                <div>
                                                    {{ $member->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $member->father_name }}
                                                </div>
                                                <div>
                                                    {{ $member->mother_name }}
                                                </div>
                                            </td>

                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('members.show', $member) }}">Show</a> --}}

                                                        <a class="dropdown-item "
                                                            href="{{ route('members.edit', $member) }}">Edit</a>

                                                        <form action="{{ route('members.destroy', $member) }}"
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
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-member').sortable({
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
                    var members = [];
                    $('.order-updated').each(function() {
                        members.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(members);
                    axios({
                        method: 'put',
                        url: "{{ route('members.sort') }}",
                        data: {
                            members: members,
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
