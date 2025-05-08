@extends('layouts.app', ['title' => __('श्रेणी')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">श्रेणी थप्नुहोस्</div>
                <div class="card-body">
                    <form action="{{ $rank->id ? route('ranks.update', $rank) : route('ranks.store') }}" method="post">
                        @csrf
                        @if ($rank->id)
                        @method('put')
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label required">श्रेणी</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $rank->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- <div class="mb-3">
                            <label for="status" class="form-label required">स्थिति</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="1" {{ old('status', $rank->status) == 1 ? 'selected' : '' }}>सक्रिय</option>
                                <option value="0" {{ old('status', $rank->status) == 0 ? 'selected' : '' }}>निष्क्रिय</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">{{ $rank->id ? 'सम्पादन गर्नुहोस्' : 'सुरक्षित गर्नुहोस्' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">श्रेणी सूची</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>नाम</th>
                                <!-- <th>प्रकार</th> -->
                                <th>स्थिति</th>
                                <th class="text-end">कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ranks as $r)
                            <tr>
                                <td>{{ $r->name }}</td>
                                <!-- <td>{{ $r->type }}</td> -->
                                <td>{{ $r->status ? 'सक्रिय' : 'निष्क्रिय' }}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                                href="{{ route('ranks.edit',$r) }}">Edit</a>
                                            <form action="{{ route('ranks.destroy', $r) }}" method="post">
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
                                <td colspan="4" class="text-center text-muted">कुनै श्रेणी फेला परेन</td>
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