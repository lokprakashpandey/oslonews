<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Page;
use App\Hub;
use App\Country;
use App\CountryHub;
use App\Category;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

			/*$slide_news = News::whereHas('categories',function($query){ $query->where('cat_type','!=',2);})
												->where('publish','1')
												->orderBy('created_at', 'desc')
												->take(10)
												->get();
												
		
			$front_categories_first_col = Category::where('in_front', 1)->orderBy('position', 'asc')->take(2)->get();
			$front_categories_second_col = Category::where('in_front', 1)->orderBy('position', 'asc')->skip(2)->take(3)->get();
			$front_categories_third_col = Category::where('in_front', 1)->orderBy('position', 'asc')->skip(5)->take(2)->get();
			$front_categories_rest = Category::where('in_front', 1)->orderBy('position', 'asc')->skip(7)->take(10)->get();
				
			return view('pages.index',compact('slide_news','front_categories_first_col','front_categories_second_col','front_categories_third_col','front_categories_rest'));
			*/
			$slide_news = News::whereHas('categories',function($query){ $query->where('cat_type','!=',2);})
												->where('publish','1')
												->orderBy('created_at', 'desc')
												->take(10)
												->get();
			$front_categories_first_col = Category::with('news')->where('default_front', 1)->orderBy('position', 'asc')->take(2)->get();
			return view('pages.index',compact('front_categories_first_col','slide_news'));
    }
	
	public function hub_index($hub_slug)
    {
		$hub_id = Hub::where('slug',$hub_slug)->first();

		$hub = Hub::find($hub_id->id);
		
		$slide_news = $hub->news()->whereHas('categories',function($query){ $query->where('cat_type','!=',2);})
									->where('publish','1')
									->orderBy('created_at', 'desc')
									->take(10)
									->get();
		
		$front_categories_first_col = $hub->categories()->with('news')->where('in_front',1)->orderBy('position', 'asc')->take(2)->get();

		return view('pages.hub_index',compact('front_categories_first_col','slide_news','hub'));
    }
	
	public function hub($id)
	{
		return view('pages.index');
	}
	
	public function country($hub_slug,$country_slug)
	{
	
		$hub = Hub::where('slug',$hub_slug)->first();
			
		$country = Country::where('slug',$country_slug)->first();
			
			
		$country_hub = CountryHub::where('hub_id',$hub->id)
							   ->where('country_id',$country->id)
							   ->first();
							   
		$front_categories_first_col = CountryHub::find($country_hub->id)->categories()
															->where('cnt_cat_in_front', '1')
															->orderBy('position','asc')->get();

		//dd($front_categories_first_col->toArray());
		return view('pages.country',compact('front_categories_first_col'));
	}
	
	public function hub_country_category_news($hub_slug,$country_slug,$category_slug)
	{
		$hub = Hub::where('slug',$hub_slug)->first();
			
		$country = Country::where('slug',$country_slug)->first();
		
		$category = Category::where('slug',$category_slug)->first();
			
		$country_hub = CountryHub::where('hub_id',$hub->id)
							   ->where('country_id',$country->id)
							   ->first();
		$front_categories_first_col = CountryHub::find($country_hub->id)->categories()
															->where('category_id', $category->id)
															->first();
		//dd($front_categories_first_col);													
		return view('pages.hub_country_category_news',compact('front_categories_first_col'));
	}
	public function archive()
	{
		$categories = Category::getTopCategoriesAll();
		$news = News::orderBy('created_at', 'desc')->paginate(21);
		return view('pages.archive',compact('news','categories'));
	}
	
	
	public function result()
	{
		$categories = Category::getTopCategoriesAll();
		
		/*$news = News::whereHas('categories',function($query){ $query->where('category_id',Input::get('category_id'));})
						->whereYear('created_at','=',Input::get('year'))
						->whereMonth('created_at','=',Input::get('month'))
						->orderBy('created_at', 'desc')->paginate(20);*/
		
		$category = Category::find(Input::get('category_id'));
		
		$news = $category->news()
						->whereYear('created_at','=',Input::get('year'))
						->whereMonth('created_at','=',Input::get('month'))
						->orderBy('created_at', 'desc')->paginate(21);
									
		/*$category = Category::with(array('news'=>function($query){
									$query->whereYear('created_at','=',Input::get('year'))
									->whereMonth('created_at','=',Input::get('month'))
									->orderBy('created_at', 'desc')->paginate(2);
									}))
									->where('id',Input::get('category_id'))
									->first();
		*/

		return view('pages.result',compact('category','categories','news'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
				'name'        => 'required',
				'content'     => 'required'
			]);
		
		$slug = str_slug($request['name']);

		$count = Page::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
		$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		
		 Page::create([
		   'name'				=> $request['name'],
		   'content'			=> $request['content'],
		   'slug'				=> $request['slug']	   
	   ]);
	   
	   return redirect('pages/lists')->with('message', 'Page Added');
    }

	public function lists()
	{
		$pages = Page::all();
		
		return view('pages.lists', compact('pages'));
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
         //$news = News::where('slug', $slug)->with('news_category','comments','user')->first();
		 $news = News::where('slug', $slug)->with(['categories',
												   'comments'=>function($query) {
																$query->orderBy('created_at', 'desc');
															},
													'author_profile'])->first();

		foreach($news->categories as $cat_id)
		{
			$cat_ids[]=$cat_id->id;
		}

		//get related content of this category
		$related_news = News::whereHas('categories',
											function($query) use ($cat_ids){
												$query->whereIn('category_id',$cat_ids);
											}
									)->where('publish','1')->where('slug','!=',$news->slug)->orderBy('created_at', 'desc')->take(6)->get();

		 return view('pages.news_detail',compact('news','related_news'));
    }
	
	 public function column_show($slug)
    {
        
		 $news = News::where('slug', $slug)->with(['categories',
												   'comments'=>function($query) {
																$query->orderBy('created_at', 'desc');
															},
													'user'])->first();
													
		//get related content of this category
		//$user_columns = News::where('user_id',$news->user_id)->get();
		/*
		$categories = NewsCategory::where('cat_type',2)->with(['news'=>
													function($query) {
																$query->orderBy('user_id',$news->user_id);
															},
													])->lists('id');
		
		$user_columns = News::whereHas('news_category',
														function($query) use ($categories,$news){
																$query->whereIn('news_category_id',$categories);
																}
													)->where('publish','1')->where('user_id',$news->user_id)->where('id','!=',$news->id)->orderBy('created_at', 'desc')->get();
									

		*/
		 return view('pages.news_column_detail',compact('news','user_columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id); //find by id
		return view('pages.edit',compact('page'));
    }

	 public function display($slug)
    {
        $page = Page::where('slug',$slug)->first();
		return view('pages.display',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         $page = Page::findOrFail($id);
		
		if($page['name'] != $request['name']){
			
			$slug = str_slug($request['name']);

			$count = Page::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
		
			$request['slug'] = $count ? "{$slug}-{$count}" : $slug;
		}
		
		$page->update($request->all());
 
		//return Redirect::route('main_menus.admin_index')->with('message', 'Menu Added');
		return redirect('pages/lists')->with('message', 'Page Updated');
    }

	public function emailSent()
	{
		return view('pages.email_sent');
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id); //find by id
		
		$page->delete();

		return redirect('pages/lists')->with('message', 'Page Deleted');
    }
	
}
