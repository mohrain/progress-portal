@extends('deartments.backends.edit')

@section('departmentContent')
    <div class="card mt-2">
        @isset($information->id)
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#noticeExample").modal('show');
                    })
                </script>
            @endpush
        @endisset


        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">सूचनाहरु <i>({{ $department->name }})</i></div>
                <a href="{{ route('department.notices.create', $department->slug) }}" class="btn btn-primary">सूचना
                    थप्नुहोस</a>
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
                    @foreach ($informations as $information)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $information->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('information.edit', [$department->slug, $information->id]) }}"
                                        class="btn btn-warning">Edit</a>

                                    <form action="{{ route('information.delete', $information->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure ?')">
                                        @csrf

                                        @method('delete')
                                        <button class="
                                            btn btn-danger ml-2"
                                            type="submit">Delete</button>
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
