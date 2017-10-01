<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;
use Session;

/**
 * route: pages/add
 * Class PagesAddController
 * @package App\Http\Controllers
 *
 */
class PagesAddController extends Controller
{
    public function execute(Request $request)
    {
        /*Method POST*/
        if($request->isMethod('post')){

            $input = $request->except('_token');

            $message = [
                'required' => 'Поле :attribute обов\'язкове.',
                'max' => 'Поле :attribute  :max',
                'unique' => 'Такий :attribute вже існує'
            ];

            $validator = Validator::make($input,[
                'name'=>'required|max:255',
                'alias'=>'required|unique:pages|max:255',//унікальний в таблиці pages
                'text'=>'required'
            ], $message);

            if($validator->fails()){

                //перенаправлення->іменований шлях->добути помилки->записати введені дані у сесію
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();// /берігає інформацію з форми у сесію
            }

            /*перевіряємо, чи завантажено файл*/
            if($request->hasFile('images')){
                /*зберігаємо отриманий файл  вигляді об'єкту*/
                $file = $request->file('images');

                /*добуваємо ім'я файлу і перезаписуємо до масиву вхідних даних*/
                $input['images'] = $file->getClientOriginalName();

                /*копіюємо файл в свою директорію*/
                $file->move(public_path().'/assets/img', $input['images']);
            }

            /*Зберігаємо дані в БД */
            $page = new Page();
            $page->fill($input);

            if($page->save()){
                return redirect()->route('pagesAdd')->with('status', 'Сторінку успішно додано');
            }



        }


        /*Method GET*/

        if(view()->exists('admin.pages_add')){
            $data = [
                'title'=>'Нова сторінка'
            ];

            return view('admin.pages_add', $data);

        }

        abort(404);
    }
}
