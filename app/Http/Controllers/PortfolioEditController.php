<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use DB;
use Validator;
use Session;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {

        /*DELETE*/
        if($request->isMethod('delete')){
            $portfolio->delete();
            return redirect()->route('portfolio')->with('status', 'Портфоліо '.$portfolio['name'].' видалено');
        }

        /*POST*/
        if($request->isMethod('post')){
            $input = $request->except('_token');
            //dd($input);
            $message = ['required' => 'Поле :attribute обов\'язкове.',
                        'max' => 'Поле :attribute не більше :max символів'];
            $validator = Validator::make($input, [
                'name' => 'required|max:250'
            ], $message);

            if($validator->fails()){
                return redirect()->route('portfolioEdit', ['portfolio'=>$input['id']])->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $file->move(public_path().'assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $portfolio->fill($input);
            if($portfolio->save()){
                return redirect()->route('portfolio')->with('status', 'Зміни до портфоліо '.$input['name'] .' збережено');
            }

        }

        /*GET*/

        if(view()->exists('admin.portfolios_edit')){
            $old = $portfolio->toArray();
            //dd($old);
            $filters = DB::table('portfolios')->distinct()->pluck('filter');
            //dd($filters);

            $data = [
                'title' => 'Редагування портфоліо '. $old['id'],
                'data' => $old,
                'filters' => $filters
            ];


            return view('admin.portfolios_edit', $data);
        }
        abort(404);
    }
}
