<?php namespace Larabook\Http\Controllers;

class PagesController extends BaseController {

    public function home()
    {
        return view('pages.home');
    }

}
