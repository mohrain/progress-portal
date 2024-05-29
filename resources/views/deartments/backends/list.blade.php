@extends('layouts.app')

@section('content')
<div class="card mt-2">
    <div class="card-header row d-flex justify-content-between">
        सचिबलयका शाखाहरु

        <a href="{{route('department.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> &nbsp;नयाँ शाखा</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>क्र.स.</th>
                    <th>शाखा नाम</th>
                    <th>पदाधिकारी नाम</th>
                    <th>कार्य</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->employee->name}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('department.edit',$department->slug)}}" class="btn btn-info mr-2">View</a>
                                <form action="{{route('department.delete',$department->slug)}}" method="POST" onsubmit="return confirm('Are you sure ?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
