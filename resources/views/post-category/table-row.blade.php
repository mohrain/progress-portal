<tr>
    <td>
        @if ($level == 1)
        @endif
        @if ($level == 2)
            &nbsp; - -
        @endif
        @if ($level == 3)
            &nbsp; &nbsp; - - - -
        @endif
        {{ $category->name }}
    </td>
    <td>{{ $category->slug }}</td>
    <td>
        {{ $parentCategoryName ?? null }}
    </td>
    <td>
        {{ $category->status == true ? 'Active' : 'Inactive' }}
    </td>
    <td class="text-right">
        <div>
            <a type="button" class="text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="svg-icon svg-baseline">
                    ...
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('post-categories.show', $category) }}">Show</a>
                <a class="dropdown-item" href="{{ route('post-categories.edit', $category) }}">Edit</a>
                <form class="form-inline d-inline" action="{{ route('post-categories.destroy', $category) }}"
                    onsubmit="return confirm('Are you sure to delete ?')" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="dropdown-item">Delete</button>
                </form>

            </div>
        </div>
    </td>
</tr>