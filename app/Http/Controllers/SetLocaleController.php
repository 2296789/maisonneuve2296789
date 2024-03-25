<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLocaleController extends Controller{
    public function index($locale){
        // return $locale;
        if (! in_array($locale, ['en', 'fr'])){
            abort(400);
            //停止执行，并返回一个400错误代码
        }
        session()->put('locale', $locale);
        return back();
        //选择好语言重新回到原网址位置
    }
}
