@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        @if ($activity->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endif

        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">गतिविधिहरु <i>({{$department->name}})</i></div>
                <a href="{{route('department.activity.create',$department->slug)}}" class="btn btn-primary">गतिबिधि थप्नुहोस</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>शीर्षक</th>
                        <th>कार्य</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{$activities}} --}}
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activity->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('department.activity.edit', [$department->slug, $activity->id]) }}"
                                        class="btn btn-warning">Edit</a>

                                        <form action="{{route('department.activity.delete',$activity->id)}}" method="POST" onsubmit="return confirm('Are you sure ?')">
                                            @csrf

                                            @method('delete')
                                            <button class="
                                            btn btn-danger ml-2" type="submit">Delete</button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
