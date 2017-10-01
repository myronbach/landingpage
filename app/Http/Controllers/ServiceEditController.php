<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceEditController extends Controller
{
    public function execute(Service $service, Request $request)
    {
        if(view()->exists('admin.services_edit')){
            $old = $service->toArray();
            $data = [
                'title'=>'edit service '.$old['name'],
                'old'=>$old,
            ];

            return(view('admin.services_edit', $data));
        }
        abort(404);
    }
}
