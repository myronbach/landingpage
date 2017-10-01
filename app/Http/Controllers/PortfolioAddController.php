<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;
use Session; //потрібно, щоб помилки записувалися у сесію

class PortfolioAddController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {
        /*POST*/
        if($request->isMethod('post')){
            $input = $request->except('_token');

            $message = [
                'required' => 'Поле :attribute обов\'язкове.',
                'max' => 'Поле :attribute не більше :max символів',
            ];
            //dd($input);
            $validator = Validator::make($input, [
                'name' => 'required|max:255',
            ], $message);

            if($validator->fails()){
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }else{
                $input['images'] = 'noimage.jpg';
            }

            /*save to DB*/
            $portfolio->fill($input);

            if($portfolio->save()){
                return redirect(route('portfolioAdd'))->with('status','Портфоліо успішно додано');
            }

        }


        /*GET*/
        if(view()->exists('admin.portfolios_add')){

            $filters = $portfolio::distinct()->pluck('filter');
            //dd($filters);

            $data = ['title' => 'Нове портфоліо',
                'filters' => $filters];
            return view('admin.portfolios_add', $data);
        }

        abort(404);
    }
}
