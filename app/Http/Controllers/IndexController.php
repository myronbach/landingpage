<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use DB;
use Mail;
use Session;

class IndexController extends Controller
{
	public function execute(Request $request)
	{
		/*POST*/
		if($request->isMethod('post')){

			/*Користувацькі повідомлення при помилках валідації*/
			$messages = [
				'required' => 'Поле :attribute обов\'язкове.',
				'email' => 'Поле :attribute повинно відповідати email адресі.',
			];

			$this->validate($request, [
				'name'=>'required|max:255',
				'email'=>'required|email',
				'text'=>'required',
			], $messages);


			$data = $request->all();
		//dd(session()->all());

			/*mail send*/
			/*send('view',[дані, що необхідно передати], ф-ція для вказування параметрів)*/
			$result = Mail::send('site.email',['data'=>$data], function($message) use ($data){

				/*тут вказуємо потрібні параметри*/
				$mail_admin = env('MAIL_ADMIN');
				$message->from($data['email'], $data['name']);// скринька відправника // ім'я відправника
				$message->to($mail_admin, 'Mr. Admin')->subject('Question');// відправити на скриньку // тема листа
			});
			//dump($result);


				//return redirect()->route('home')->with('status', 'Email is send');
				Session::flash('status', 'Вашого листа успішно відправлено');
				return redirect()->route('home');


			//dump($data);


		}

		/*GET*/
		/*Добуваємо дані з БД*/
		$pages = Page::all(); // мето all можна використати для всіх інших моделей
		$portfolios = Portfolio::get(['name', 'filter', 'images']); // це для прикладу
		$services = Service::where('id', '<', 20)->get();
		$peoples = People::take(3)->get();
        //dd($portfolios);
		/* Вибираємо список фільтрів без дублювання*/
		$tags = DB::table('portfolios')->distinct()->pluck('filter');

		/*Формуємо головне меню*/
		$menu = []; // масив з даними для меню
		foreach($pages as $page){
			$item = ['title'=>$page->name, 'alias'=>$page->alias];
			array_push($menu, $item); // вставляємо дані для меню з БД
		}
		// вставляємо статичні дані для меню
		$item = ['title'=>'Services' , 'alias'=>'service'];
		array_push($menu, $item);

		$item = ['title'=>'Portfolio' , 'alias'=>'Portfolio'];
		array_push($menu, $item);

		$item = ['title'=>'Team' , 'alias'=>'team'];
		array_push($menu, $item);

		$item = ['title'=>'Contact' , 'alias'=>'contact'];
		array_push($menu, $item);


		//dd($tags);

		return view('site.index', array(
										'menu'=>$menu,
										'pages'=>$pages,
										'services'=>$services,
										'portfolios'=>$portfolios,
										'peoples'=>$peoples,
										'tags'=>$tags,
										));
    }
}
