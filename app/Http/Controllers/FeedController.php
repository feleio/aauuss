<?php namespace App\Http\Controllers;

use App\Post;
use App\Tag;

class FeedController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//\DB::enableQueryLog();

		$location_tag_id = 0;
		$is_all_location = false;
		if(\Input::has('location'))
			$location_tag_id = \Input::get('location','0');
		else
			$is_all_location = true;

		$cata_tag_id = 0;
		$is_all_cata = false;
		if(\Input::has('cata'))
			$cata_tag_id = \Input::get('cata','0');
		else
			$is_all_cata = true;

		//checking
		$location_tag = Tag::find($location_tag_id);
		if( !$location_tag 
			|| ( $location_tag->type != 'state' 
				&& $location_tag->type != 'city' ))
		{
			$is_all_location = true;
		}

		$cata_tag = Tag::find($cata_tag_id);
		if( !$cata_tag
		    || ( $cata_tag->type == 'state' 
		    	|| $cata_tag->type == 'city' ))
		{
			$is_all_cata = true;
		}

		//$states = Tag::where('type', '=', 'state')->get();
		$cities = Tag::where('type', '=', 'city')->get();
		$otherTags = Tag::where('type', '=', 'none')->get();

		$posts = Post::with('source','tags','source.scraper');

		if(!$is_all_location)
		{
			$posts = $posts->whereHas('tags', function($q) use ($location_tag_id){
				$q->where('id','=',$location_tag_id);
			});
		}

		if(!$is_all_cata)
		{
			$posts = $posts->whereHas('tags', function($q) use ($cata_tag_id) {
				$q->where('id','=',$cata_tag_id);
			});
		}

		$posts = $posts->orderBy("posted_at", "desc")->paginate(40);

		if($is_all_location)
			$activeCity = "所有地區";
		else
		{
			$activeCityKey = array_search($location_tag_id, array_column($cities->lists('id','name'), 'id'));
			$activeCity = $cities[$activeCityKey]->name;
		}

		$queries =  \DB::getQueryLog();

		return view('feed', [
			"cities" => $cities,
			"otherTags" => $otherTags,
			"posts" => $posts,
			"is_all_location" => $is_all_location,
			"is_all_cata" => $is_all_cata,
			"location_tag_id" => $location_tag_id,
			"cata_tag_id" => $cata_tag_id,
			"activeCity" => $activeCity,
			"queries" => $queries,
			]);
	}
}
