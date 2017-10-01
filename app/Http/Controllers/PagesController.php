<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

/**
 * route: admin/pages
 * Class PagesController
 * @package App\Http\Controllers
 *
 */
class PagesController extends Controller
{
    public function execute()
    {

        if(view()->exists('admin.pages')){

            $pages = Page::all();
            $data = [
                'title'=>'Сторінки',
                'pages'=>$pages
            ];

            return view('admin.pages', $data);

        }

        abort(404);

    }
}
