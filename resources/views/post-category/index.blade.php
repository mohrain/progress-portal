@extends('layouts.app', ['title' => __('पोस्ट किसिम')])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ $title = 'पोस्ट किसिम' }}</div>
                    <div class="card-body">
                        <form
                            action="{{ $postCategory->id ? route('post-categories.update', $postCategory) : route('post-categories.store') }}"
                            method="post">
                            @csrf
                            @if ($postCategory->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label required">पोस्ट किसिम</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $postCategory->name) }}" id="name" aria-describedby="name">
                                <div class="invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <select name="parent_id" class="custom-select @error('parent_id') is-invalid @enderror "
                                    id="">
                                    <option value="">None</option>
                                    @foreach ($postCategories as $firstLevelCategory)
                                        <option value="{{ $firstLevelCategory->id }}"
                                            @if ($postCategory->parentCategory && $postCategory->parentCategory->id == $firstLevelCategory->id) selected @endif>
                                            {{ $firstLevelCategory->name }}
                                        </option>
                                        @foreach ($firstLevelCategory->childcategories as $secondLevelCat)
                                            <option value="{{ $secondLevelCat->id }}"
                                                @if ($postCategory->parentCategory && $postCategory->parentCategory->id == $secondLevelCat->id) selected @endif>
                                                -- {{ $secondLevelCat->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @error('parent_id')
                                        {{ $message }}
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ $postCategory->id ? 'सम्पादन' : 'सुर्क्षित्' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-md table-bordered">
                                <thead>
                                    <th>नाम</th>
                                    <th>स्लग</th>
                                    <th>सब-किसिम</th>
                                    <th>अबस्था</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse($postCategories as $firstLevelCategory)
                                        @include('post-category.table-row', [
                                            'category' => $firstLevelCategory,
                                            'level' => 1,
                                        ])

                                        {{-- Second level --}}
                                        @foreach ($firstLevelCategory->childCategories as $secondLevelCategory)
                                            @include('post-category.table-row', [
                                                'category' => $secondLevelCategory,
                                                'level' => 2,
                                                'parentCategoryName' => $firstLevelCategory->name,
                                            ])

                                            {{-- Third level --}}
                                            @foreach ($secondLevelCategory->childCategories as $thirdLevelCategory)
                                                @include('post-category.table-row', [
                                                    'category' => $thirdLevelCategory,
                                                    'level' => 3,
                                                    'parentCategoryName' => $secondLevelCategory->name,
                                                ])
                                            @endforeach
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="42" class="font-italic text-center">कुनै पनि डाटा भेटिएन !!!</td>
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
