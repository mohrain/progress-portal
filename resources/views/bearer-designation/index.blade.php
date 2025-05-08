@extends('layouts.app', ['title' => __('पद')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                @php $title = 'पद'; @endphp
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <form
                        action="{{ $designation->id ? route('bearer-designations.update', $designation) : route('bearer-designations.store') }}"
                        method="post">
                        @csrf
                        @if ($designation->id)
                        @method('put')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label required">पद</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $designation->name) }}" id="name">
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label required">प्रकार</label>

                            <select name="type" id="" class="form-control">
                                <option value="mun">पालिका</option>
                                <option value="ward">वडा</option>
                            </select>
                     
                            <div class="invalid-feedback">
                                @error('type') {{ $message }} @enderror
                            </div>
                        </div>
{{-- 
                        <div class="mb-3">
                            <label for="status" class="form-label required">स्थिति</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', $designation->status) == 1 ? 'selected' : '' }}>सक्रिय</option>
                                <option value="0" {{ old('status', $designation->status) == 0 ? 'selected' : '' }}>निष्क्रिय</option>
                            </select>
                            <div class="invalid-feedback">
                                @error('status') {{ $message }} @enderror
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ $designation->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
                                <tr>
                                    <th>पद</th>
                                    <th>प्रकार</th>
                                    <th>स्थिति</th>
                                    <th class="text-right">कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($designations as $designation)
                                <tr>
                                    <td>{{ $designation->name }}</td>
                                    <td>{{ $designation->type == 'mun' ? "पालिका" : "वडा" }}</td>
                                    <td>
                                        @if ($designation->status)
                                        <span class="badge bg-success text-white">सक्रिय</span>
                                        @else
                                        <span class="badge bg-danger text-white">निष्क्रिय</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="{{ route('bearer-designations.edit', $designation->slug) }}">Edit</a>
                                                <form action="{{ route('bearer-designations.destroy', $designation->slug) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item form-control text-danger" type="submit"
                                                        onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="font-italic text-center">No Record Found</td>
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