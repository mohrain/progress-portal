@extends('layouts.app', ['title' => __('पोस्टहरु')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'पोस्टहरु' }}
                            </div>
                            <div>
                                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">नयाँ पोस्ट</a>
                                {{-- <button class="btn btn-sm btn-secondary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Filter</button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                    aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Search</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="{{ route('posts.search') }}" method="get">
                                            <div class="mb-3">
                                                <label for="title" class="form-label required">Title</label>
                                                <input type="text" name="title"
                                                    class="form-control @error('title') is-invalid @enderror" value=""
                                                    id="title" aria-describedby="title">

                                            </div>
                                            <x-post-category-select />
                                            <x-user-select />

                                            <div class="mb-3">
                                                <label for="status" class="form-label">{{ __('Status') }}</label>

                                                <select class="form-control" name="status" id="status"
                                                    aria-label="Default select example">
                                                    <option value="">Choose</option>
                                                    <option value="1">
                                                        Publish</option>
                                                    <option value="0">
                                                        Unpublish</option>
                                                </select>


                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>पोस्ट नाम</th>
                                    <th>फिचर फोटो</th>
                                    <th>पोस्ट किसिम</th>
                                    <th>प्रकासित मिति</th>
                                    <th>स्थिति</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $post->feature_image ? asset('storage/' . $post->feature_image) : asset('assets/img/no-image.png') }}"
                                                    class="feature-image-thum">
                                            </td>
                                            <td>
                                                @foreach ($post->postCategories as $category)
                                                    <span class="badge badge-success">{{ $category->name ?? "" }}</span>
                                                    {{ $loop->last ? '' : '|' }}
                                                @endforeach
                                            </td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                @if ($post->status == true)
                                                    <span class="badge badge-primary">
                                                        प्रकाशित
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        अप्रकाशित
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class=" btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                        href="{{ route('posts.show', $post) }}">Show</a>
                                                        
                                                        <a class="dropdown-item "
                                                            href="{{ route('posts.edit', $post) }}">Edit</a>
     
                                                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="dropdown-item form-control text-danger"
                                                                type="submit" onclick="return confirm('Are You Sure ?')">
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
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
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
