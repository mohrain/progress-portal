@extends('frontend.layouts.app', ['title' => __($postCategory->title)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="frontend-title">
                            {{ $postCategory->name }}
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">क्र.स.</th>
                                    <th scope="col">शीर्षक</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="kalimati-font">{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">पढ्नुहोस् <i class="bi bi-chevron-double-right"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="42" class="font-italic text-center text-secondary">कुनैपनि डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                    {{ $posts->links() }}
                </div>
            </div>
            <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
