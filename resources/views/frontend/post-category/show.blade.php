@extends('frontend.layouts.app', ['title' => __($postCategory->title)])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="frontend-title">
                    {{ $postCategory->name }}
                    <hr>
                </div>
                <div class="box p-3">
                    <form action="{{ route('posts.frontendSearch', $postCategory) }}" method="get">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label for="created_date_from" class="form-label">शुरु मिति</label>
                                <input type="date" name="created_date_from"
                                    class="form-control @error('created_date_from') is-invalid @enderror" value=""
                                    id="created_date_from" aria-describedby="created_date_from">

                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="created_date_to" class="form-label">अन्त्य मिति</label>
                                <input type="date" name="created_date_to"
                                    class="form-control @error('created_date_to') is-invalid @enderror" value=""
                                    id="created_date_to" aria-describedby="created_date_to">

                            </div>


                            <div class="col-md-4 mb-2">
                                <label for="title" class="form-label">शीर्षक</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" value="" id="title"
                                    aria-describedby="title">

                            </div>


                            <div class="col-md-2 mb-2 mt-auto">
                                <button type="submit" class="btn btn-primary bi bi-search">
                                    खोजी गर्नुहोस्
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover box p-2">
                            <thead>
                                <tr>
                                    <th scope="col">क्र.स.</th>
                                    <th scope="col">शीर्षक</th>
                                    {{-- <th>प्रकाशन मिति</th> --}}
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="kalimati-font">{{ $loop->iteration }}</td>
                                        <td>
                                            <div>

                                                {{ $post->title }}
                                            </div>
                                            <small class="text-secondary">
                                                {{ $post->created_at }}
                                            </small>
                                        </td>
                                        
                                        <td class="text-end">
                                            <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">पढ्नुहोस् <i
                                                    class="bi bi-chevron-double-right"></i></a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="42" class="font-italic text-center text-secondary">कुनैपनि डाटा
                                            उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                    {{ $posts->links() }}
                </div>
            </div>
            {{-- <div class="col-md-3">
                @include('frontend.layouts.sidebar')
            </div> --}}
        </div>
    </div>
@endsection
