@extends('layouts.app', ['title' => __('स्लाइडर फोटो')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'स्लाइडर फोटो' }}
                            </div>
                            <div>
                                <a href="{{ route('carousel-images.create') }}" class="btn btn-sm btn-primary">नयाँ स्लाइडर</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>शीर्षक</th>
                                    <th>फोटो</th>
                                    <th>URL</th>
                                    <th>प्रकासित मिति</th>
                                    <th>स्थिति</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($carouselImages as $carouselImage)
                                        <tr>
                                            <td>{{ $carouselImage->title }}</td>
                                            <td>
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $carouselImage->image ? asset('storage/' . $carouselImage->image) : asset('assets/img/no-image.png') }}"
                                                    class="feature-image-thum">
                                            </td>
                                            <td>{{$carouselImage->url}}</td>
                                            <td>{{ $carouselImage->created_at }}</td>
                                            <td>
                                                @if ($carouselImage->status == true)
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
                                                    <a class="btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        <a class="dropdown-item "
                                                            href="{{ route('carousel-images.edit', $carouselImage) }}">Edit</a>

                                                        <form action="{{ route('carousel-images.destroy', $carouselImage) }}" method="post">
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
                        {{ $carouselImages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection