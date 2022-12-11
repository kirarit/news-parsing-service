<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public function fetchAllNews()
    {
        $urlParams = 'everything?q=news';
        $response = makeApiCalls($urlParams);

        return Arr::get($response, 'articles');
    }
}
