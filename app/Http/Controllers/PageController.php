<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Backpack\PageManager\app\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Вернуться на <a href="'.url('').'">главную</a>.');
        }
        $data = [
            'title' => $page->title,
            'page' => $page->withFakes()
        ];

        return view('pages.'.$page->template, $data);
    }
}
