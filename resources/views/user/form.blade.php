@extends('layouts.app')

@section('content')
<div class="container">
    <div class="font-roboto">
        @section('breadcrumb')
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.index')}}">@lang('navigation.users')</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New User</li>
            </ol>
        </nav>
        @endsection
        
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="box">
                    <div class="box__body">
                        <h2 class="box__title">{{ $user->exists ? 'Edit' : 'Add New' }} User</h2>

                        <div class="my-3">
                            @include('alerts.all')
                        </div>

                        <form action="{{ isset($user->id) ? route('user.update', $user) : route('user.store') }}" method="post" class="form">
                            @csrf
                            @isset($user->id)
                            @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label class="required">User's Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label class="required">User's Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" @isset($user->id) readonly @endisset>
                            </div>
                            <div class="form-group">
                                <label class="required">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label class="required">@lang('navigation.role')</label>
                                @foreach($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="roles[]" class="custom-control-input" id="role-checkbox-{{ $role->name }}" value="{{ $role->name }}" @if($user->hasRole($role->name)) checked @endif>
                                    <label class="custom-control-label" for="role-checkbox-{{ $role->name }}">{{ ucfirst($role->name) }}</label>
                                </div>
                                @endforeach
                            </div>
                            @if($user->id == null)
                            <div class="form-group">
                                <label class="required">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="required">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            @endisset

                            <div class="form-group">
                                @isset($user->id)
                                <button type="submit" class="btn btn-primary btn-block z-depth-0">Update</button>
                                @else
                                <button type="submit" class="btn btn-primary btn-block z-depth-0">Add</button>
                                @endisset
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End of user form --}}
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#ward-toggler').change(function() {
            $('#ward-selector').toggleClass('d-none');;
        })
    })
</script>
@endpush