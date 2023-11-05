<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['video_id'];

    public function getVideoIdAttribute()
    {
        // $full  = 'https://www.youtube.com/watch?v=U6s2pdxebSo';
        // $short = 'https://youtu.be/DCRcFf39SYo?si=wG0kb6V0WhnT60K_';
        $url = $this->url;
        if (Str::contains($url, 'youtube.com')) {
            // Use regular expression to extract the video ID
            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
            if (isset($matches[1])) {
                return $matches[1];
            }
        }
        // If it's a shortened URL (youtu.be), extract the video ID
        elseif (Str::contains($url, 'youtu.be')) {
            $parsedUrl = parse_url($url);
            if (isset($parsedUrl['path'])) {
                $pathParts = explode('/', $parsedUrl['path']);
                $videoID = end($pathParts);

                return $videoID;
            }
        }

        // If the URL doesn't match the expected formats, return null or handle the error accordingly
        return null;
    }
}
