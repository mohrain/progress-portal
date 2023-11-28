<form action="{{ $updateMode ?  route('downloads.update', $download) : route('downloads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($updateMode)
        @method('PUT')
    @endif
    {{-- <input type="text" name="downloadable_type" value="{{ $downloadableType }}">
    <input type="text" name="downloadable_id" value="{{ $downloadableId }}"> --}}

    {{-- @if ($redirectTo)
    <input type="text" name="redirect_to" value="{{ $redirectTo }}">
    @endif --}}

    <div class="mb-3">
        <label for="title" class="form-label required">शीर्षक</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $download->title) }}">
        <x-invalid-feedback field="title" />
    </div>

    <div class="mb-3">
        <label for="file" class="form-label required">Attachment</label>
        <div>
            <input type="file" name="file" class="@error('file') is-invalid @enderror">
            <x-invalid-feedback field="file" />
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
