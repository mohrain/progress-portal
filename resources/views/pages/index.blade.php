@extends('layouts.app', ['title' => __('पेज')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'पेज' }}
                            </div>
                            <div>
                                <a href="{{ route('pages.create') }}" class="btn btn-sm btn-primary">नयाँ पेज</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>पेज</th>
                                    <th>फिचर फोटो</th>
                                    <th>प्रकाशीत मिति</th>
                                    <th>स्थिति</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($pages as $page)
                                        <tr>
                                            <td>{{ $page->title }}</td>
                                            <td>
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $page->feature_image ? asset('storage/' . $page->feature_image) : asset('assets/img/no-image.png') }}"
                                                    class="feature-image-thum">
                                            </td>
                                            <td>{{ $page->created_at }}</td>
                                            <td>
                                                @if ($page->status == true)
                                                    <span class="badge badge-primary">
                                                        Published
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        Unpublish
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item "
                                                            href="{{ route('pages.show', $page) }}">Show</a> --}}

                                                        <a class="dropdown-item "
                                                            href="{{ route('pages.edit', $page) }}">Edit</a>

                                                        <form action="{{ route('pages.destroy', $page) }}" method="post">
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
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection