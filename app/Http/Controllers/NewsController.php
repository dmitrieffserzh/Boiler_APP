<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $news = News::all();

        return view('main.news.index', [
            'news' => $news
        ]);
    }


    public function getURL()
    {
        $arr = array();
        $path = request()->getRequestUri();
        $segments = explode('/', $path);

        $news = News::whereId(end($segments))->first();

        if(!$news) {

            $cad = Category::where('slug', end($segments) )->firstOrFail()->children()->get();
            print_r($cad);
            die();
        }

        $news->category->parents;
        $parent_category = collect($news->category);

        array_splice($segments, 0, 2);
        $segments = array_reverse($segments);
        array_splice($segments, 0, 1);

        do {
            array_push($arr, $parent_category['slug']);
            $parent_category = $parent_category['parent'];
        } while (isset($parent_category));

        $result = false;
        if (count($arr) == count($segments)) {
            $result = true;
            for ($i = 0; $i < count($arr); $i++) {
                $result &= $segments[$i] == $arr[$i];
            }
        }

        if (!$result)
            abort(404);

        return view('main.news.show', [
            'item' => $news
        ]);

    }
}
