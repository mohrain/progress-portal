<?php

namespace App\Filters;

use Carbon\Carbon;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterRegisteredFrom implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $date = bs_to_ad($value);
        $date = Carbon::createFromDate($date)->startOfDay();
        $query->when($value, function($query) use($date) {
            $query->whereDate('reg_date_ad', '>=', $date);
        });
    }
}