<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;
use Session;

class PagesEditController extends Controller
{
    /**
     * route: admin/pages/edit/{page_id}
     * Редагує дані потрібні для сторінки
     * Коли модель вводиться у якості параметру, у неї автоматично підставляється
     * параметр {page_id} і в метод повертаються вже потрібні дані з БД
     * @param Page $page
     * @param Request $request
     * @return mixed
     */
    public function execute(Page $page, Request $request)
    {
        /*DELETE*/
        if($request->isMethod('delete')){
            $page->delete();
            return redirect('admin/pages')->with('status', 'Сторінку '.$page['name'].' видалено');
        }

        /*POST*/
        if($request->isMethod('post')){

            $input = $request->except('_token');

            $message = [
                'required' => 'Поле :attribute обов\'язкове.',
                'max' => 'Поле :attribute не більше :max',
                'unique' => 'Такий :attribute вже існує'
            ];

            /*Перевіряємо дані*/
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:pages,alias,'.$input['id'],
                'text'=>'required'
            ], $message);

            /*якщо є помилки валідації, перенапр. ще раз на сторінку введення даних і записуємо
            помилки валідації у сесію*/
            if($validator->fails()){
                return redirect()->route('pagesEdit', ['page'=>$input['id']])->withErrors($validator);
            }

            /*Перевіряємо, чи прийшов файл з малюнком*/

            if($request->hasFile('images')){// якщо є файл

                $file = $request->file('images'); // отримуємо об'єкт файлу
                $file->move(public_path().'/assets/img', $file->getClientOriginalName());// переміщуємо до потрібного каталогу
                $input['images'] = $file->getClientOriginalName();//до масиву вхідних даних додаємо ім'я нового файлу
            }else{ // файл не завантажувався
                $input['images'] = $input['old_images'];// ім'я файлу - те, що було(отримане з прихованого поля форми)
            }

            /*Видаляємо непотрібні дані з масиву $input*/
            unset($input['old_images']);

            /*перезаписуємо нові доні у БД*/
            $page->fill($input);
            if($page->update()){
                return redirect()->route('pages')->with('status', 'Сторінку оновлено');
            }

        }


        /*GET*/
        $old = $page->toArray();// дані з БД у вигляді масиву
        //dd($page->id);
        if(view()->exists('admin.pages_edit')){

            $data = [
                'title'=>'Редагування сторінки '.$old['name'],
                'data'=> $old,
            ];

            return view('admin.pages_edit', $data);
        }


    }
}
