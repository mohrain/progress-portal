@extends('layouts.app')

@section('content')
    <div class="card mt-2">
        <div class="card-header row d-flex justify-content-between">
            शाखाहरु

            <a href="{{ route('department.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> &nbsp;नयाँ
                शाखा</a>
        </div>
        <div class="card-body">
            <table class="table table-md table-bordered">
                <thead>
                    <td>क्र स</td>
                    <th>शाखा नाम</th>
                    {{-- <th>सब-शाखा</th> --}}
                    <th>अबस्था</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                        $serialNumber = 1; // Initialize serial number
                    @endphp
                    @foreach ($departments as $department)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->status==1 ? 'Active' : 'Deactive'}}</td>
                        <td class="text-right">
                            <a class="btn btn-primary "
                                href="{{ route('department.edit', $department->slug) }}?menu=true">View</a>

                            <form action="{{ route('department.delete', $department->slug) }}"
                                method="post" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Are You Sure ?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{-- @foreach ($departments[null] as $parentDepartment)
                        <tr>
                            <td>{{ $serialNumber++ }}</td>
                            <td>{{ $parentDepartment->name }}</td>
                            <td></td>
                            <td>{{ $parentDepartment->status == true ? 'Active' : 'Deactive' }}</td>
                            <td class="text-right">
                                <a class="btn btn-primary "
                                    href="{{ route('department.edit', $parentDepartment->slug) }}">View</a>

                                <form action="{{ route('department.delete', $parentDepartment->slug) }}" method="post"
                                    class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are You Sure ?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @if (isset($departments[$parentDepartment->id]))
                            @foreach ($departments[$parentDepartment->id] as $subDepartment)
                                <tr>
                                    <td>{{ $serialNumber++ }}</td>
                                    <td>- - {{ $subDepartment->name }}</td>
                                    <td>{{ $subDepartment->department->name }}</td>
                                    <td>{{ $subDepartment->status == true ? 'Active' : 'Deactive' }}</td>

                                    <td class="text-right">
                                        <a class="btn btn-primary "
                                            href="{{ route('department.edit', $subDepartment->slug) }}">View</a>

                                        <form action="{{ route('department.delete', $subDepartment->slug) }}"
                                            method="post" class="d-inline-block">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach --}}
                </tbody>


            </table>
        </div>
    </div>
@endsection
