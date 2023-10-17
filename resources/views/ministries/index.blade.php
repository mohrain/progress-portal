@extends('layouts.app', ['title' => __('मन्त्रालय')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'मन्त्रालय' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $ministry->id ? route('ministries.update', $ministry) : route('ministries.store') }}"
                            method="post">
                            @csrf
                            @if ($ministry->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">मन्त्रालय</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $ministry->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="name_english" class="form-label required">Ministry</label>
                                <input type="text" name="name_english"
                                    class="form-control @error('name_english') is-invalid @enderror"
                                    value="{{ old('name_english', $ministry->name_english) }}" id="name_english">
                                <div class="invalid-feedback">
                                    @error('name_english')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $ministry->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
                                    <th>मन्त्रालय</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($ministries as $ministry)
                                        <tr>
                                            <td>{{ $ministry->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('ministries.show', $ministry) }}">Show</a> --}}
                                                        <a class="dropdown-item "
                                                            href="{{ route('ministries.edit', $ministry) }}">Edit</a>

                                                        <form action="{{ route('ministries.destroy', $ministry) }}"
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
