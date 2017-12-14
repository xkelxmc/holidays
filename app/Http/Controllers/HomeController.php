<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Category;
use Config;
use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          "categories" => Category::get(),
          "adverts" => Advert::where('main_page', true)->where('published', true)->where('accepted', true)->limit(3)->get(),
        ];
        $test = Config::get('settings.contact_email');
        return view('home', $data);
    }

    public function search(Request $request){
        $s_category=  $request->get('category');
        $search  =  $request->get('search');

        $category = Category::where('id', $s_category)->first();
        if($category){
            $adverts =  $category->adverts()->where('published', true)->where('accepted', true)->paginate(10);
        }else{
            return redirect()->guest('/');
        }
        $data = [
            "category" => $category,
            "adverts" => $adverts,
        ];
        return view('search', $data);
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        if($category){
            $adverts =  $category->adverts()->where('published', true)->where('accepted', true)->paginate(10);
        }else{
            abort(404, 'Вернуться на <a href="'.url('').'">главную</a>.');
        }
        return view('search', [
            'category' => $category,
            'adverts' => $adverts,
        ]);
    }

    public function advert($slug){
        $advert = Advert::where('slug', $slug)->where('published', true)->where('accepted', true)->first();
        if(!$advert){
            abort(404, 'Вернуться на <a href="'.url('').'">главную</a>.');
        }
        $advert_description = Markdown::convertToHtml($advert->description);
        return view('advert', [
            'advert' => $advert,
            'desc' => $advert_description,
        ]);
    }
}
