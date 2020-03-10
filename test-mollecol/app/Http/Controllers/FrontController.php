<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\Advertisement;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function indexapi(){
        $advertisement = Advertisement::get()->toJson(JSON_PRETTY_PRINT);
        return response($advertisement, 200);
    }
    public function index()
    {
       

        $topnewslist = News::latest()->whereHas('category')->where('status',1)->take(5)->get();

        $newscategory_one   = News::latest()->whereHas('category')->where('category_id',6)->where('status',1)->take(9)->get();
        $newscategory_two   = News::latest()->whereHas('category')->where('category_id',7)->where('status',1)->take(3)->get();
        $newscategory_three = News::latest()->whereHas('category')->where('category_id',3)->where('status',1)->take(10)->get();

        return view('frontend.index',compact(
                'topnewslist',
                'newscategory_one',
                'newscategory_two',
                'newscategory_three'
            )
        );
    }

    public function getAllCategory()
    {
        $category = Category::get()->toJson(JSON_PRETTY_PRINT);
        return response($category, 200);
    }

    public function getCategory($id) 
    {
        $data = Category::where('id',$id)->get();
        return response ($data);
    }

    public function storeCategory(Request $request){
        $data = new Category();
        $data->name = $request->input('name');
        $data->slug = $request->input('slug');
        $data->image = $request->input('image');
        $data->status = $request->input('status');
        $data->save();
    
        return response('success');
    }

    public function pageCategory(Request $request)
    {
        
        $category           = Category::where('slug',$slug)->first();
        $featurednewslist   = $category->newslist()->where('status',1)->where('featured',1)->take(5)->get();
        $newscategorylist   = $category->newslist()->where('status',1)->where('featured',0)->get();
        $advertisements     = Advertisement::where('type','category')->where('slug',$request)->first();

        
        return view('frontend.pages.category',compact('category','featurednewslist','newscategorylist','advertisements'));
    }

    public function getAllNews() 
    {
        $news = News::get()->toJson(JSON_PRETTY_PRINT);
        return response($news, 200);
    }

    public function getNews($id) 
    {
        $data = News::where('id',$id)->get();
        return response ($data);
    }

    public function storeNews(Request $request){
        $data = new News();
        $data->title = $request->input('title');
        $data->slug = $request->input('slug');
        $data->details = $request->input('details');
        $data->image = $request->input('image');
        $data->category_id = $request->input('category_id');
        $data->status = $request->input('status');
        $data->featured = $request->input('featured');
        $data->view_count = $request->input('view_count');
        $data->save();
    
        return response('success');
    }

    public function pageNews($slug)
    {
        $newssingle = News::with('category')->where('slug',$slug)->first();

        $newssessionkey = 'news-'.$newssingle->id;
        if(!session()->has($newssessionkey)){
            $newssingle->increment('view_count');
            session()->put($newssessionkey,1);
        }

        return view('frontend.pages.single',compact('newssingle'));
    }

    public function pageSearch()
    {
        $search = request()->input('search');

        $newssearch = News::with('category')->where('title','like','%'.$search.'%')->whereHas('category')->where('status',1)->get();

        return view('frontend.pages.search',compact('newssearch'));
    }

    public function pageArchive()
    {
        $newsarchives = Category::with('newslist')->whereHas('newslist')->get();

        return view('frontend.pages.index',compact('newsarchives'));
    }

}
