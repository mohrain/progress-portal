@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box__body">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <form action="{{ $election->id ? route('elections.update', $election) : route('elections.store') }}" method="POST" class="form">
                                @csrf
                                @if($election->id)
                                @method('put')
                                @endif
                                <div class="form-group">
                                    <label class="required" for="input-elections">
                                        निर्वाचन वर्ष</label>
                                    <input type="text" id="input-elections" name="name" class="form-control font-roboto" value="{{ old('name', $election->name) }}">
                                </div>
                                <div class="form-group">
                                    <label class="required" for="input-elections-start">सुरु मिति</label>
                                    <input type="text" name="start" id="input-elections-start" class="form-control elections-date" value="{{ old('start', $election->start) }}" placeholder="Nepali YYYY-MM-DD">
                                </div>
                                <div class="form-group">
                                    <label class="required" for="input-elections-end">समाप्त मिति</label>
                                    <input type="text" name="end" id="input-elections-end" class="form-control elections-date" value="{{ old('end', $election->end) }}" placeholder="Nepali YYYY-MM-DD">
                                </div>
                            
                                    <button type="submit" class="btn btn-primary z-depth-0 ml-0">{{ $election->id ? 'अपडेट गर्नुहोस्' : 'सेभ गर्नुहोस्'}}</button>
                            </form>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box__header">
                    <h1 class="box__title d-inline-block">निर्वाचन वर्षहरु</h1>
                    <small>(हाल {{ $elections->count() }} निर्वाचन वर्षहरु छन्)</small>
                </div>
                <div class="box__body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>निर्वाचन वर्ष</th>
                                <th>सुरु मिति</th>
                                <th>समाप्त मिति</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($elections as $election)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-roboto">{{ $election->name }}</td>
                                <td class="font-roboto">{{ $election->start }}</td>
                                <td class="font-roboto">{{ $election->end }}</td>
                                <td>
                                    <a class="action-btn text-primary" href="{{ route('elections.edit', $election) }}"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('elections.destroy', $election) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center font-italic">
                                <td colspan="10">
                                    <div>
                                        <svg id="Layer_1" enable-background="new 0 0 512 512" height="40" fill="#fefefe" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" /></svg>
                                    </div>
                                    <div class="mt-3">
                                        डाटाबेसमा कुनै डाटा छैन |
                                    </div>
                                </td>
        
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

@push('scripts')
<script>
    $(function() {
        if ($('.elections-date')[0]) {
            $('.elections-date').nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 200,
                readOnlyInput: true
            });
        }

    })

</script>
@endpush
