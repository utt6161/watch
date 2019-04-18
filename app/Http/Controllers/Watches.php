<?php


//          view обращается к пути файла
//          route к имени в web.php


namespace App\Http\Controllers;

use Cart;
use Session;
use Illuminate\Http\Request;

class Watches extends Controller
{

    public function index(){  // main page
        Session::forget('message');
        $watches = \App\Wshop::all()->take(3);
        return view('watches.index',['watches'=>$watches]);
    }
    public function watches(){ // страница с продуктами
        Session::forget('message');
    	$watches = \App\Wshop::all();
    	return view('watches.watches',['watches'=>$watches]);
    }

    public function viewWatches($id){ // просмотр выбранного товара
        Session::forget('message');
    	$watches = \App\Wshop::find((int)$id);
    	return view('watches.view',['watches'=>$watches]);
    }

    public function addOrder(){  
        Session::forget('message');
        return view('watches.order');
    }

    public function addOrderAction(Request $request){ 
        $shop = \App\Orders::create($request->all());
        return redirect()->route('watches.index');
    }

    public function addFeedback(){  
        Session::forget('message');
        return view('watches.feedback');
    }

    public function addfeedbackAction(Request $request){ //addActiion
        $shop = \App\Feedback::create($request->all());
        return redirect()->route('watches.index');
    }

    public function about(){
        Session::forget('message');
        return view('watches.aboutus');
    }

}
