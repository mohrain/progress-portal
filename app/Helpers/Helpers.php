<?php

use App\Services\FiscalYearService;
use Illuminate\Support\Facades\Storage;

if (!function_exists('setActive')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function setActive($path, $active = 'active')
    {
        return Request::routeIs($path) ? $active : '';
    }
}

if (!function_exists('invalid_class')) {
    /**
     * Check for the existence of an error message and return a class name
     *
     * @param  string  $key
     * @return string
     */
    function invalid_class($key)
    {
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        return $errors->has($key) ? 'is-invalid' : '';
    }
}


if (!function_exists('invalid_feedback')) {
    /**
     * Check if the route is active or not
     *
     * @param  string  $key
     * @return string
     */
    function invalid_feedback($key)
    {
        $key = str_replace(['\'', '"'], '', $key);
        $errors = session()->get('errors') ?: new \Illuminate\Support\ViewErrorBag;
        if ($message = $errors->first($key)) {
            return '<?= <div class="invalid-feedback">' . $message . '</div>; ?';
        }
    }
}

if(!function_exists('referer_route_match')) {
    /**
     * referer_route_match
     *
     * @param  string $url
     * @return boolean
     */
    function referer_route_match(string $url)
    {
        return parse_url(request()->header('referer'), PHP_URL_PATH) == parse_url($url, PHP_URL_PATH);
    }
}

function running_fiscal_year($key = null)
{
    $running_fiscal_year = app(FiscalYearService::class)->getRunning();

    return $key != null
        ? $running_fiscal_year->$key
        : $running_fiscal_year;
}

function active_fiscal_year()
{
    return session()->get('active_fiscal_year');
}


if (!function_exists('slashDateFormat')) {
    /**
     * Format the date to slash(/) format
     *
     * @param  mixed $date
     * @return void
     */
    function slashDateFormat($date)
    {
        return str_replace('-', '/', $date);
    }
}

if (!function_exists('bs_to_ad')) {
    function bs_to_ad($npDate)
    {
        return \App\Helpers\BSDateHelper::BsToAd('-', $npDate);
    }
}

if (!function_exists('ad_to_bs')) {
    function ad_to_bs($enDate)
    {
        return \App\Helpers\BSDateHelper::AdToBsEn('-', $enDate);
    }
}

if (!function_exists('bs_date_today')) {
    function bs_date_today()
    {
        $today = now()->format('Y-m-d');
        return ad_to_bs($today);
    }
}

function get_file_url($path)
{
    return Storage::url($path);
}
