<?php  namespace Larabook\Http\Controllers;

use Flyingfoxx\CommandCenter\Laravel\Commander;
use Illuminate\Routing\Controller;
use View;
use Auth;

class BaseController extends Controller {

    use Commander;

    protected $layout = 'layouts.default';

    public function __construct()
    {
        $this->setupLayout();
    }

    protected function setupLayout()
    {
        if ( ! is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }

        View::share('currentUser', Auth::user());
        View::share('signedIn', Auth::user());
    }
}