@extends('layouts.app', ['title' => __('विधयेक प्रकार')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'विधयेक प्रकार' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $billType->id ? route('bill-types.update', $billType) : route('bill-types.store') }}"
                            method="post">
                            @csrf
                            @if ($billType->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">विधयेक प्रकार</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $billType->name) }}" id="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $billType->id ? 'सम्पादन' : 'सुरक्षित' }}</button>
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
                                    <th>विधयेक प्रकार</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($billTypes as $billType)
                                        <tr>
                                            <td>{{ $billType->name }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                        href="{{ route('bill-types.show', $billType) }}">Show</a>
                                                        <a class="dropdown-item "
                                                            href="{{ route('bill-types.edit', $billType) }}">Edit</a>

                                                        <form action="{{ route('bill-types.destroy', $billType) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit" onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
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