<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return redirect('back/status');
	}

	public function getStatus()
	{
		$numOfRun = 5;
		$runs = \Run::select('id')->take($numOfRun)->get();
		return view('admin.status')->with('run_ids', $run_ids);
	}

}
