<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

/**
 * route: page/{alias}
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    public function execute($alias)
    {
        if(!$alias){
            abort(404);
        }

        $page = Page::where('alias', $alias)->first();

        $data = [
            'title'=> $page->name,
            'page'=> $page
        ];

        if(view()->exists('site.page')){
            return view('site.page', $data);
        }else{
            abort(404);
        }
    }
}
