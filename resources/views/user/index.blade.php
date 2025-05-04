@extends('layouts.app')


@section('content')
<div class="container-fluid font-noto">
    <div class="box">
        <div class="box__header">
            <div class="d-flex">
                <div class="align-self-center box__title">@lang('navigation.users')</div>
                <div class="ml-auto">
                    <a class="btn btn-primary z-depth-0" href="{{ route('user.create') }}"><span class="mr-2"><i class="fa fa-plus"></i></span> New User</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr class="text-uppercase">
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->getRoleNames() as $role)
                            <span class="py-1 px-2 d-inline-block shadow-none text-left rounded text-capitalize" style="background-color: #f2f7fb; font-size: 13px; min-width: 110px;">{{ str_replace('-', ' ', $role) }}</span> @if (!$loop->last) | @endif
                            @endforeach
                        </td>
                        <td class="text-nowrap text-right">
                            <a href="{{ route('password.change.form', $user) }}" class="action-btn text-primary"><i class="fas fa-key"></i></a>
                            <span class="mx-2">|</span>
                            <a href="{{ route('user.edit', $user) }}" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                            <span class="mx-2">|</span>
                            <form action="{{ route('user.destroy', $user) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="42" class="text-center">** Users does not exist **</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection