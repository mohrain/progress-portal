@extends('layouts.app', ['title' => __('कर्मचारी पदहरू')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'कर्मचारी पद' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $employeeDesignation->id ? route('employee-designations.update', $employeeDesignation) : route('employee-designations.store') }}"
                            method="post">
                            @csrf
                            @if ($employeeDesignation->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">कर्मचारी पद</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $employeeDesignation->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $employeeDesignation->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
                              
                                <tbody>
                                    @forelse($employeeDesignations as $employeeDesignation)
                                        <tr>
                                            <td>{{ $employeeDesignation->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                        href="{{ route('employee-designations.show', $employeeDesignation) }}">Show</a> --}}
                                                        <a class="dropdown-item "
                                                            href="{{ route('employee-designations.edit', $employeeDesignation) }}">Edit</a>

                                                        <form action="{{ route('employee-designations.destroy', $employeeDesignation) }}"
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