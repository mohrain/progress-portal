@extends('layouts.app', ['title' => __('किताब')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $title = 'किताब' }}
                            </div>
                            <div>
                                <a href="{{ route('provincial-assembly-library.create') }}" class="btn btn-sm btn-primary">नयाँ किताब</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>दर्ता नं.</th>
                                    <th>किताब</th>
                                    <th>कभर फोटो</th>
                                    <th>लेखक</th>
                                    <th>स्थिति</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($provincialAssemblyLibraries as $provincialAssemblyLibrary)
                                        <tr>

                                            <td>{{ $provincialAssemblyLibrary->entry_no }}</td>
                                            <td>{{ $provincialAssemblyLibrary->title }}</td>
                                            <td>
                                                <img id="newProfilePhotoPreview"
                                                    src="{{ $provincialAssemblyLibrary->cover_image ? asset('storage/' . $provincialAssemblyLibrary->cover_image) : asset('assets/img/no-image.png') }}"
                                                    class="feature-image-thum">
                                            </td>
                                            <td>{{ $provincialAssemblyLibrary->author }}</td>
                                            <td>
                                                @if ($provincialAssemblyLibrary->status == true)
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
                                                        <a class="dropdown-item "
                                                            href="{{ route('provincial-assembly-library.show', $provincialAssemblyLibrary) }}">Show</a>

                                                        <a class="dropdown-item "
                                                            href="{{ route('provincial-assembly-library.edit', $provincialAssemblyLibrary) }}">Edit</a>

                                                        <form action="{{ route('provincial-assembly-library.destroy', $provincialAssemblyLibrary) }}" method="post">
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
                        {{ $provincialAssemblyLibraries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection