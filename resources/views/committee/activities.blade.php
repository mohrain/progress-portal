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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activity->title }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('committee.activities.edit', [$committee, $activity]) }}"
                                        class="btn btn-primary btn-sm mr-2">Edit</a>
                                    <form action="{{ route('committee.activities.destroy', [$committee, $activity]) }}"
                                        method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>
    </div>
@endsection
