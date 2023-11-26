<div class="mb-3">
    <label class="form-label required">पोस्टको किसिम</label>

    <select class="form-control text-capitalize required @error('post_category_id') is-invalid @enderror"
        name="post_category_id[]" id="post_category_id"  required>
        <option value="">छान्नुहोस्</option>
        @foreach ($postCategories as $firstLevelCategory)
            <option value="{{ $firstLevelCategory->id }}" @if (in_array($firstLevelCategory->id, $post->postCategories->pluck('id')->toArray())) selected @endif>
                {{ $firstLevelCategory->name }}
            </option>
            @foreach ($firstLevelCategory->childcategories as $secondLevelCat)
                <option value="{{ $secondLevelCat->id }}" @if (in_array($secondLevelCat->id, $post->postCategories->pluck('id')->toArray())) selected @endif>
                    -- {{ $secondLevelCat->name }}
                </option>
            @endforeach
        @endforeach
    </select>
    <div class="invalid-feedback">
        @error('post_category_id')
            {{ $message }}
        @enderror

    </div>
</div>
