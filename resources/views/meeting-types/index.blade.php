@extends('layouts.app', ['title' => __('बैठक प्रकार')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">बैठक प्रकार थप्नुहोस्</div>
                <div class="card-body">
                    <form action="{{ $meetingType->id ? route('meeting-types.update', $meetingType) : route('meeting-types.store') }}" method="post">
                        @csrf
                        @if ($meetingType->id)
                        @method('put')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label required">बैठक प्रकार</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $meetingType->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ $meetingType->id ? 'सम्पादन गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">बैठक प्रकार सूची</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>नाम</th>
                                <th>स्थिति</th>
                                <th class="text-end">कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($meetingTypes as $type)
                            <tr>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->status ? 'सक्रिय' : 'निष्क्रिय' }}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('meeting-types.edit', $type) }}">Edit</a>
                                            <form action="{{ route('meeting-types.destroy', $type) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item form-control text-danger" type="submit"
                                                    onclick="return confirm('के तपाई सुनिचित हुनुहुन्छ ?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">कुनै बैठक प्रकार फेला परेन</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection