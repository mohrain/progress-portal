@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">समिति सदस्यहरु</div>
                <div>
                    <a href="{{ route('committee.members.create', $committee) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>क्र स</td>
                    <td>फोटो</td>
                    <td>नाम</td>
                    <td>पद</td>
                    <td></td>
                </tr>
                @foreach ($committee->members as $member)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ $member->photoUrl() }}" alt="{{ $member->name }}" style="height: 3rem; width: 3rem"></td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->designation }}</td>
                    <td>
                        <a href="{{ route('committee.members.edit', [$committee, $member]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>
@endsection
