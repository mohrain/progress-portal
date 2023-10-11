@extends('layouts.app', ['title' => __('बैठक')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'बैठक' }}</div>
                    <div class="card-body">
                        <form action="{{ $meeting->id ? route('meetings.update', $meeting) : route('meetings.store') }}"
                            method="post">
                            @csrf
                            @if ($meeting->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="type" class="form-label">{{ __('बैठक किसिम') }}</label>

                                <select class="form-control" name="type" id="type"
                                    aria-label="Default select example">
                                    <option value="1" {{ old('type', $meeting->type) == '1' ? 'selected' : '' }}>
                                        प्रदेश सभा बैठक</option>
                                    <option value="0" {{ old('type', $meeting->type) == '0' ? 'selected' : '' }}>
                                        समिति बैठक</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label required">बैठक</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $meeting->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="date_bs" class="form-label required">मिति</label>
                                <input type="text" name="date_bs"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date_bs', $meeting->date_bs) }}" id="date_bs">
                                <div class="invalid-feedback">
                                    @error('date')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3" hidden>
                                <label for="date" class="form-label required">मिति</label>
                                <input type="date" name="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', $meeting->date) }}" id="date" readonly>
                                <div class="invalid-feedback">
                                    @error('date')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label required">समय</label>
                                <input type="time" name="time"
                                    class="form-control kalimati-font @error('time') is-invalid @enderror"
                                    value="{{ old('time', $meeting->time) }}" id="time">
                                <div class="invalid-feedback">
                                    @error('time')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('स्थिति') }}</label>

                                <select class="form-control" name="status" id="status"
                                    aria-label="Default select example">
                                    <option value="1" {{ $meeting->status == '1' ? 'selected' : '' }}>
                                        प्रकाशित</option>
                                    <option value="0" {{ $meeting->status == '0' ? 'selected' : '' }}>
                                        अप्रकाशित</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" onclick="nepaliDate()">
                                    {{ $meeting->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
                                    <th>बैठकको किसिम</th>
                                    <th>शीर्षक</th>
                                    <th>मिति</th>
                                    <th>समय</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($meetings as $meeting)
                                        <tr>
                                            <td>{{ $meeting->type == true ? 'प्रदेश सभा बैठक' : 'समिति बैठक' }}</td>
                                            <td>{{ $meeting->name }}</td>
                                            <td id="date_bs_table-{{ $meeting->id }}">

                                                {{-- {{ $meeting->date }} --}}

                                            </td>
                                            <td class="kalimati-font">
                                                <?php
                                                // Assuming $meeting->time is a valid time string, e.g., "14:30:00"
                                                $time = strtotime($meeting->time . 'Asia/Kathmandu');
                                                $formatted_time = date('g:i a', $time);
                                                
                                                if (date('a', $time) == 'am') {
                                                    echo 'बिहानको';
                                                } elseif (date('a', $time) == 'pm') {
                                                    echo 'दिनको';
                                                }
                                                ?>
                                                {{ date('g:i', strtotime("$meeting->time Asia/Kathmandu")) }}
                                                बजे
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('meetings.show', $meeting) }}">Show</a> --}}
                                                        <a class="dropdown-item "
                                                            href="{{ route('meetings.edit', $meeting) }}">Edit</a>

                                                        <form action="{{ route('meetings.destroy', $meeting) }}"
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
                                        @push('scripts')
                                            <script>
                                                document.getElementById("date_bs_table-{{ $meeting->id }}").innerHTML = NepaliFunctions.GetBsFullDate(
                                                    NepaliFunctions.AD2BS("{{ $meeting->date }}"), true, "YYYY-MM-DD");
                                            </script>
                                        @endpush
                                    @empty
                                        <tr>
                                            <td colspan="42" class="font-italic text-center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        /* Select your element */
        var elm = document.getElementById("date_bs");
        /* Initialize Datepicker with options */
        elm.nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 200,
            readOnlyInput: true
        });
    </script>
    @if ($meeting->id)
        <script>
            // document.getElementById('date_bs').value = NepaliFunctions.AD2BS(
            //     "{{ $meeting->date }}");
            // let bsDate = NepaliFunctions.AD2BS("{{ $meeting->date }}");
            //  document.getElementById('date_bs').value = bsDate;
            // console.log("{{ $meeting->date }}");
        </script>
    @else
    @endif
    <script>
        function nepaliDate() {
            document.getElementById('date').value = NepaliFunctions.BS2AD(document.getElementById('date_bs').value);
        }
    </script>
    @if ($meeting->id)
        <script>
            document.getElementById('date_bs').value = NepaliFunctions.AD2BS(document.getElementById('date').value);
        </script>
    @endif

@endpush
