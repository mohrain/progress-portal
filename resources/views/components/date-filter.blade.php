@props(['action'])

<form method="GET" action="{{ $action }}" class="row mb-4">
    <div class="col-md-3">
        <label for="fiscal_year_id">आर्थिक वर्ष</label>
        <select id="fiscal_year_id" name="fiscal_year_id" class="form-control" required>
            @foreach ($fiscalYears as $fy)
            <option value="{{ $fy->id }}" {{ request('fiscal_year_id', running_fiscal_year()->id) == $fy->id ? 'selected' : '' }}>
                {{ $fy->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="month">महिना</label>
        <select name="month" class="form-control">
            <option value="">सबै</option>
            @foreach($nepaliMonths as $key => $month)
            <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>
                {{ $month }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2 align-self-end">
        <button type="submit" class="btn btn-success">Filter</button>
    </div>
</form>