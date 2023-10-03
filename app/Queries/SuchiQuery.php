<?php

namespace App\Queries;

use App\Filters\FilterRegisteredFrom;
use App\Filters\FilterRegisteredTo;
use App\Suchi;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class SuchiQuery extends QueryBuilder
{
    public function __construct()
    {
        $projectQuery = Suchi::query()
            ->with(['suchiType'])
            ->where('fiscal_year_id', active_fiscal_year()->id);

        parent::__construct($projectQuery);

        $this
            ->allowedFilters([
                'token_no', 'reg_no', 'name',
                AllowedFilter::custom('register_date_from', new FilterRegisteredFrom),
                AllowedFilter::custom('register_date_to', new FilterRegisteredTo)
            ])
            ->defaultSort('-created_at');
    }
}
