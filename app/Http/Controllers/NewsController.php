<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class NewsController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function index() {

        $news = News::latest()->paginate(20);

        Category::fixTree();

        return view('main.news.index', [
            'categories' => $news,
            'tree' => $tree = Category::get()->toTree()
        ]);
    }


    public function getURL($route) {

        $route = explode('/', $route);

        $post = News::where('slug', end($route))->first();

        if ($post) {
            $valid = $this->checkRoute($post, $route, "News");

            if ($valid) {
                Event::fire( 'news.show', $post );
                return view('main.news.show', [
                    'item' => $post
                ]);
            }
        }

        $cat = Category::where('slug', end($route))->first();

        if ($cat) {
            $valid = $this->CheckRoute($cat, $route, "Category");

            if ($valid) {

                $descendants = $cat->descendantsAndSelf($cat->id);

                foreach ($descendants as $i => $category) {
                    $descendants_ids[] = $category->id;
                }

                $posts = News::whereIn('category_id', $descendants_ids)->latest()->paginate(20);

                return view('main.news.index', [
                    'categories' => $posts,
                    'tree' => $tree = Category::get()->toTree()
                ]);
            }
        }

        return abort('404');
    }



    // FUNCTIONS
    private function checkRoute($item, $route, $type) {

        switch ($type) {
            case "News":
                $ancestors = $item->category->ancestorsAndSelf($item->category->id);
                break;
            case "Category":
                $ancestors = $item->ancestors;
                break;
        }

        $ancestors_slugs = [];
        foreach ($ancestors as $i => $category) {
            $ancestors_slugs[] = $category->slug;
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
