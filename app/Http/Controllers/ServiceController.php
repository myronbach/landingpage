<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function execute(Service $service)
    {
        if(view()->exists('admin.services')){

            $services = $service->all();
            $data = [
                'title'=>'Services',
                'services'=> $services
            ];
            //dd($services);

            return view('admin.services', $data);
        }
    }
}
