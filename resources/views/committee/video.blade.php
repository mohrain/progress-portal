@extends('layouts.app', ['title' => __('समिति')])

@section('content')
    <div class="container-fluid">

        <x-committee-wizard-menu :committee="$committee" />

        <section class="box mt-4">
            <div class="box__header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="box__title">भिडिओ <i>({{ $committee->name }})</i></div>
                    <div>
                        <a href="{{ route('committee.video.create', $committee) }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
            </div>
            <div class="box__body">

                <table class="table table-bordered table-hover">
                    <tr>
                        <td>क्र स</td>
                        <td>नाम</td>
                        <td>भिडिओ</td>
                        <td></td>
                    </tr>

                    @foreach ($videos as $audio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $audio->name }}</td>
                            <td>
                                <a href="{{ $audio->url }}">
                                    <img src="{{asset('storage').'/'.$audio->thumbnail}}" alt="adsas" height="50px">
                                </a>
                            </td>
                            <td>
                                <div class="d-flex">

                                    <a href="{{ route('committee.edit.video', [$committee, $audio]) }}"
                                        class="btn btn-primary btn-sm mx-2">Edit</a>
                                    <form action="{{ route('committee.delete.video', [$audio]) }}"
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
