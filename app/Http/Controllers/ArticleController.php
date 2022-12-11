<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayNews(Request $request)
    {
        $response = array();

        $response['news'] = $this->fetchAllNews();

        return view('welcome', $response);
    }

    /**
     * @return mixed
     */
    public function parseNews()
    {
        $response = Cache::remember('allNewsSources', 22 * 60, function () {
            $api = new Article();
            return $api->getAllNews();
        });
        return Arr::get($response, 'articles');
    }

    public function fetchAllNews()
    {
        $response = Cache::remember('allNewsSources', 22 * 60, function () {
            $api = new Article();
            return $api->fetchAllNews();
        });

        return collect($response)->paginate(10);
    }
}
