@extends('layouts.app', ['title' => __('राजनीतिक दलहरू')])

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
                                {{ $title = 'राजनीतिक दलहरू' }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body kalimati-font">
                        <form
                            action="{{ $currentParliamentaryParty->id ? route('current-parliamentary-parties.update', $currentParliamentaryParty) : route('current-parliamentary-parties.store') }}"
                            method="post" enctype="multipart/form-data">
                            @if ($currentParliamentaryParty->id)
                                @method('put')
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-parliamentery-party-select :currentParliamentaryParty="$currentParliamentaryParty" />
                                </div>
                                <div class="col-md-4 mb-2">

                                    <label for="male" class="form-label required">पुरुष सङ्ख्या</label>
                                    <div class="input-group">
                                        <input type="number" min="0" name="male_directly"
                                            class="form-control @error('male_directly') is-invalid @enderror"
                                            placeholder="प्रत्यक्ष"
                                            value="{{ old('male_directly', $currentParliamentaryParty->male_directly) }}">
                                        <input type="number" min="0" name="male_proportionate"
                                            class="form-control @error('male_proportionate') is-invalid @enderror"
                                            placeholder="समानुपातिक"
                                            value="{{ old('male_proportionate', $currentParliamentaryParty->male_proportionate) }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        @error('male_directly')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                    <div class="invalid-feedback">
                                        @error('male_proportionate')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">

                                    <label for="female" class="form-label required">महिला सङ्ख्या</label>
                                    <div class="input-group">
                                        <input type="number" min="0" name="female_directly"
                                            class="form-control @error('female_directly') is-invalid @enderror"
                                            placeholder="प्रत्यक्ष"
                                            value="{{ old('female_directly', $currentParliamentaryParty->female_directly) }}">
                                        <input type="number" min="0" name="female_proportionate"
                                            class="form-control @error('female_proportionate') is-invalid @enderror"
                                            placeholder="समानुपातिक"
                                            value="{{ old('female_proportionate', $currentParliamentaryParty->female_proportionate) }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        @error('female_directly')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                    <div class="invalid-feedback">
                                        @error('female_proportionate')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-1 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $currentParliamentaryParty->id ? 'सम्पादन' : 'थप' }}</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">क्र.सं.</th>
                                        <th rowspan="2">राजनीतिक दल</th>
                                        <th colspan="3">पुरुष</th>
                                        <th colspan="3">महिला</th>
                                        <th rowspan="2">जम्मा सदस्य सङ्ख्या</th>
                                        <th rowspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th>प्रत्यक्ष</th>
                                        <th>समानुपातिक</th>
                                        <th>जम्मा</th>
                                        <th>प्रत्यक्ष</th>
                                        <th>समानुपातिक</th>
                                        <th>जम्मा</th>
                                    </tr>
                                </thead>
                                @php
                                    $male_directly_total = 0;
                                    $male_proportionate_total = 0;
                                    $female_directly_total = 0;
                                    $female_proportionate_total = 0;
                                    $male = 0;
                                    $female = 0;
                                    $total = 0;

                                    $grand_male_directly_total = 0;
                                    $grand_male_proportionate_total = 0;
                                    $grand_female_directly_total = 0;
                                    $grand_female_proportionate_total = 0;
                                    $grand_male = 0;
                                    $grand_female = 0;
                                    $grand_total = 0;

                                @endphp
                                <tbody id="sortable-current-parliamentary-parties">
                                    @forelse($currentParliamentaryParties as $currentParliamentaryParty)
                                        @php
                                            $male = $currentParliamentaryParty->male_directly + $currentParliamentaryParty->male_proportionate;
                                            $grand_male = $grand_male + $male;

                                            $female = $currentParliamentaryParty->female_directly + $currentParliamentaryParty->female_proportionate;
                                            $grand_female = $grand_female + $female;

                                            $total = $male + $female;
                                            $male_directly_total = $male_directly_total + $currentParliamentaryParty->male_directly;
                                            $male_proportionate_total = $male_proportionate_total + $currentParliamentaryParty->male_proportionate;
                                            $female_directly_total = $female_directly_total + $currentParliamentaryParty->female_directly;
                                            $female_proportionate_total = $female_proportionate_total + $currentParliamentaryParty->female_proportionate;

                                            $grand_total = $grand_total + $total;
                                        @endphp
                                        <tr data-id="{{ $currentParliamentaryParty->id }}"
                                            data-order="{{ $currentParliamentaryParty->position ?? 0 }}">
                                            <td class="sort-handle">{{ $loop->iteration }}</td>
                                            <td>{{ $currentParliamentaryParty->parliamentaryParty->name }}</td>
                                            <td>{{ $currentParliamentaryParty->male_directly }}</td>
                                            <td>{{ $currentParliamentaryParty->male_proportionate }}</td>
                                            <td>{{ $male }}</td>
                                            <td>{{ $currentParliamentaryParty->female_directly }}</td>
                                            <td>{{ $currentParliamentaryParty->female_proportionate }}</td>
                                            <td>{{ $female }}</td>
                                            <td>{{ $total }}</td>



                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">

                                                        <a class="dropdown-item "
                                                            href="{{ route('current-parliamentary-parties.edit', $currentParliamentaryParty) }}">Edit</a>

                                                        <form
                                                            action="{{ route('current-parliamentary-parties.destroy', $currentParliamentaryParty) }}"
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
                                    <tr>
                                        <td></td>
                                        <th>जम्मा</th>
                                        <td>{{ $male_directly_total }}</td>
                                        <td>{{ $male_proportionate_total }}</td>
                                        <td>{{ $grand_male }}</td>
                                        <td>{{ $female_directly_total }}</td>
                                        <td>{{ $female_proportionate_total }}</td>
                                        <td>{{ $grand_female }}</td>
                                        <td>{{ $grand_total }}</td>
                                        <td></td>
                                    </tr>
                                </tbody>


                            </table>
                        </div>
                        <button id="update-menu-order-btn" type="button" class="btn btn-primary mx-0 mt-3">
                            क्रमबद्ध मिलाउनुहोस्
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                // Sorting
                $('#sortable-current-parliamentary-parties').sortable({
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
                    var currentParliamentaryParties = [];
                    $('.order-updated').each(function() {
                        currentParliamentaryParties.push({
                            id: $(this).attr('data-id'),
                            position: $(this).attr('data-order')
                        });
                    });
                    console.table(currentParliamentaryParties);
                    axios({
                        method: 'put',
                        url: "{{ route('current-parliamentary-parties.sort') }}",
                        data: {
                            currentParliamentaryParties: currentParliamentaryParties,
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
