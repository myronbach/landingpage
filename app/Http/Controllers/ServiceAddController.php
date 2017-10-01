<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceAddController extends Controller
{
    public function execute(Service $service, Request $request)
    {
        if(view()->exists('admin.services_add')){


            $data = [
                'title'=>'Новий сервіс'
            ];
            return view('admin.services_add', $data);
        }
        abort(404);
    }
}
