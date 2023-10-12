@extends('layouts.app', ['title' => __('गतिविधिहरु')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">गतिविधिहरु</div>
                <div>
                    <a href="{{ route('committee.activities.create', $committee) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>क्र स</td>
                    <td>शीर्षक</td>
                    <td></td>
                </tr>
                @foreach ($committee->activities as $activity)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$activity->title}}</td>
                    <td>
                        <a href="{{ route('committee.activities.edit', [$committee, $activity]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>
@endsection
