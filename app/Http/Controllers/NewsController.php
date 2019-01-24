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
            'categories' => $news
        ]);
    }


    public function getURL($route) {

        $categories = explode('/', $route);

        $main = Category::where('slug', end($categories))->first();
        reset($categories);

        if($main) {
            $ancestors = $main->ancestors;
            $descendants = $main->descendants;

            $ancestors_slugs = [];
            foreach ($ancestors as $i => $category) {
                $ancestors_slugs[] = $category->slug;
            }
            $ancestors_slugs[] = $main->slug;

            $valid = false;
            if (count($ancestors_slugs) == count($categories)) {
                $valid = true;
                for ($i = 0; $i < count($ancestors_slugs); $i++) {
                    $valid &= $categories[$i] == $ancestors_slugs[$i];
                }
            }

            $descendants_ids[] = $main->id;
            foreach ($descendants as $i => $category) {
                $descendants_ids[] = $category->id;

            }

            if($valid) {
                $posts = News::whereIn('category_id', $descendants_ids )->get();

                return view('main.news.index', [
                    'categories' => $posts
                ]);
            }
        }

        abort('404');


       // Category::fixTree();

       // $categories = Category::get()->toTree();
//        $nodes = Category::get()->toTree();
//
//        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
//            foreach ($categories as $category) {
//                echo PHP_EOL.$prefix.' '.$category->title;
//
//                $traverse($category->children, $prefix.'-');
//            }
//        };
//
//        $traverse($nodes);
////print_r($categories);
//die();

        return view('main.news.index', [
            'categories' => $categories
        ]);
// in view for breadcrumbs:




//        $arr = array();
//
//        $path = request()->getRequestUri();
//        $segments = explode('/', $path);
//        $segments = array_diff($segments, array(''));
//        array_splice($segments, 0, 1);
//
//        $slug = end($segments);
//        $segments = array_reverse($segments);
//
//        $category = News::where('id', $slug )->first();
//
//
//
//        $category = Category::where('slug', $slug)->first();
//        $posts = $category->posts;
//
//        $category->parents;
//        $category = collect($category);
//
//
//        do {
//            array_push($arr, $category['slug']);
//            $category = $category['parent'];
//        } while (isset($category));
//
//        $result = false;
//        if (count($arr) == count($segments)) {
//            $result = true;
//            for ($i = 0; $i < count($arr); $i++) {
//                $result &= $segments[$i] == $arr[$i];
//            }
//        }
//
//        if (!$result)
//            abort(404);
//
//        return view('main.news.index', [
//            'news' => $posts
//        ]);
//


        ////////////
//        $news = News::whereId(end($segments))->first();
//
//        if(!$news) {
//
//            $cad = Category::where('slug', end($segments) )->firstOrFail()->children()->get();
//            print_r($cad);
//            die();
//
//
//            $news->category->parents;
//            $parent_category = collect($news->category);
//
//            array_splice($segments, 0, 2);
//            $segments = array_reverse($segments);
//            array_splice($segments, 0, 1);
//
//            do {
//                array_push($arr, $parent_category['slug']);
//                $parent_category = $parent_category['parent'];
//            } while (isset($parent_category));
//
//            $result = false;
//            if (count($arr) == count($segments)) {
//                $result = true;
//                for ($i = 0; $i < count($arr); $i++) {
//                    $result &= $segments[$i] == $arr[$i];
//                }
//            }
//
//            if (!$result)
//                abort(404);
//
//            return view('main.news.show', [
//                'item' => $news
//            ]);
//        }

    }
}
