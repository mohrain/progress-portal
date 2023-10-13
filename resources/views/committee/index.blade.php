@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid mt--7">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="box">
                <div class="box__header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="box__title">समिति</div>
                        <div>
                            <a href="{{ route('committee.create') }}" class="btn btn-sm btn-primary">नयाँ समिति</a>
                        </div>
                    </div>
                </div>

                <div class="box__body">
                    <div class="table-responsive">
                        <table class="table table-md table-bordered">
                            <thead>
                                <td>क्र स</td>
                                <th>पोस्ट नाम</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @forelse($committees as $committee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $committee->name }}</td>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-primary " href="{{ route('committee.general', $committee) }}">Edit</a>

                                        <form action="{{ route('posts.destroy', $committee) }}" method="post" class="d-inline-block">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are You Sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!</td>
                                </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
