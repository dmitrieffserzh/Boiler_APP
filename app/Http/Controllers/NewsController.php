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
        $news = News::latest()->paginate(15);

        return view('main.news.index', [
            'categories' => $news
        ]);
    }


    public function getURL($route) {

        $route = explode('/', $route);
        $post = News::where('slug', end($route))->first();

        if ($post) {
            $valid = $this->CheckRoute($post, $route, "News");

            if ($valid) {
                return view('main.news.show', [
                    'item' => $post
                ]);
            }
        }

        $cat = Category::where('slug', end($route))->first();
        reset($route);

        if ($cat) {
            $valid = $this->CheckRoute($cat, $route, "Category");

            if ($valid) {

                $descendants = $cat->descendants;
                $descendants_ids[] = $cat->id;
                foreach ($descendants as $i => $category) {
                    $descendants_ids[] = $category->id;
                }


                $posts = News::whereIn('category_id', $descendants_ids)->latest()->paginate(15);

                return view('main.news.index', [
                    'categories' => $posts
                ]);
            }
        }

        abort('404');
    }


    private function CheckRoute($item, $route, $type) {

        if ($type == "News")
            $ancestors = $item->category->ancestors;
        if ($type == "Category")
            $ancestors = $item->ancestors;

        $ancestors_slugs = [];
        foreach ($ancestors as $i => $category) {
            $ancestors_slugs[] = $category->slug;
        }

        if ($type == "News") {
            $ancestors_slugs[] = $item->category->slug;
        }
        $ancestors_slugs[] = $item->slug;


        $valid = false;
        if (count($ancestors_slugs) == count($route)) {
            $valid = true;
            for ($i = 0; $i < count($ancestors_slugs); $i++) {
                $valid &= $route[$i] == $ancestors_slugs[$i];
            }
        }
        return $valid;
    }

}
