<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;

class AdminPanel extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		$this->middleware('auth');
        if(Gate::allows('isAdmin')){
            return redirect()->route('watches.index');
        }
    }

	//----------------- [ adminPanel ] -------------------

	public function adminPanel(){
		return view('watches.index');
	}

	//----------------- [ watches ] -------------------
	
	public function watchesConfig(){
    	$watches = \App\Wshop::all();
    	$correct = "";
    	return view('adminpanel.watches_config',['correct'=>$correct,'watches'=>$watches]);
    }

	public function addWatches(){ // addPage
    	return view('adminpanel.watches_add');
    }

    public function addWatchesAction(Request $request){ //addActiion
		$wshop = new \App\Wshop;
		$wshop->watchid = $request->watchid;
		$wshop->name = $request->name;
		$wshop->price = $request->price;
		$wshop->watchid = $request->watchid;
		$path = $request->file('img')->store('images',['disk' => 'upload']);
		$wshop->image = $path;
		$wshop->save();
		//$shop = \App\Watches::create($request->all());
    	return redirect()->route('watches.config');
    }

    public function deleteWatchesPage(){ //deletePage
    	$watches = \App\Wshop::all();
    	$correct = "";
    	return view('adminpanel.watches_delete',['correct'=>$correct,'watches'=>$watches]);
    }

    public function deleteWatchesAction(Request $records) { //deleteAction
        $watches = \App\Wshop::all();
    	$recordsform = $records->input('records');
		if(empty($records->input('records'))){
			$correct = "Выберите хотя бы одну запись для удаления.";
			return view('adminpanel.watches_delete',['correct'=>$correct,'watches'=>$watches]);
		}
		else{
			for ($i=0; $i < count($recordsform); $i++) {
				$img = \App\Wshop::all();
				unlink(public_path()."/".$img[$i]->image);
				\App\Wshop::destroy($recordsform[$i]);
			}
			return redirect()->route('watches.config');
		}
	}
	

	// ----------------------[ orders ]-----------------------------

	public function ordersConfig(){
		$orders = \App\Orders::all();
    	$correct = "";
    	return view('adminpanel.orders_config',['correct'=>$correct,'orders'=>$orders]);
    }

	public function addOrders(Request $request){ // addPage
    	return view('watches.order',['data'=>$request]);
    }

    public function addOrdersAction(Request $request){ //addActiion
		$shop = \App\Orders::create($request->all());
    	return redirect()->route('watches.index');
    }

	public function deleteOrdersPage(){ //deletePage
		$orders = \App\Orders::all();
    	$correct = "";
    	return view('adminpanel.orders_delete',['correct'=>$correct,'orders'=>$orders]);
    }

    public function deleteOrdersAction(Request $records) { //deleteAction
        $orders = \App\Orders::all();
    	$recordsform = $records->input('records');
		if(empty($records->input('records'))){
			$correct = "Выберите хотя бы одну запись для удаления.";
			return view('adminpanel.orders_delete',['correct'=>$correct,'orders'=>$orders]);
		}
		else{
			for ($i=0; $i < count($recordsform); $i++) { 
				\App\Orders::destroy($recordsform[$i]);
			}
			return redirect()->route('orders.config');
		}
	}

    // ----------------------[ feedback ]-----------------------------
	
    public function feedbackConfig(){
        $feedback = \App\Feedback::all();
        $correct = "";
        return view('adminpanel.feedback_config',['correct'=>$correct,'feedback' => $feedback]);
    }

    public function deletefeedbackPage(){
        $feedback = \App\Feedback::all();
        $correct = "";
        return view('adminpanel.feedback_delete',['correct'=>$correct,'feedback'=>$feedback]);
    }

    public function deletefeedbackAction(Request $records) {
        $feedback = \App\Feedback::all();
        $recordsform = $records->input('records');
        if(empty($records->input('records'))){
            $correct = "Выберите хотя бы одну запись для удаления.";
            return view('adminpanel.feedback_delete',['correct'=>$correct,'feedback'=>$feedback]);
        }
        else{
            for ($i=0; $i < count($recordsform); $i++) { 
                \App\Feedback::destroy($recordsform[$i]);
            }
            return redirect()->route('feedback.config');
        }
    }

}

