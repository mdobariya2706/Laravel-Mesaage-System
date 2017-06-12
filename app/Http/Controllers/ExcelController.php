<?php

namespace App\Http\Controllers;
use Illuminate\Session\Store;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
//use App\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Messages;
use DB;
use Excel;
class ExcelController extends Controller
{
    public function getImport(){
		return view('excel.importMessage');
	}
	public function postImport(){
		Excel::load(Input::file('messages'),function($reader){
			$reader->each(function($sheet){
				Messages::firstorCreate($sheet->toArray());
			});
		});
		
		return back();
	}
	public function getExport(){
		$messages=messages::all();
		Excel::create("Export Messages",function($excel) use($messages){
			$excel->sheet("sheet 1",function($sheet) use($messages){
				$sheet->fromArray($messages);
			});
		})->export("xlsx");
	}
	public function deleteAll(Store $session){
		DB::table('messages')->delete();
		$session->flash('deleteAll_success', 'Delete All Successfully');
		return back();
	}
}
