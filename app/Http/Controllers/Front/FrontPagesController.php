<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Front\Aboutus;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Property;
use App\User;

class FrontPagesController extends Controller
{
    //----------------- Show about In The Website  ------------------
    public function aboutus()
    {
        $about_us= Aboutus::all();

        return view('includes.sitepages.aboutus', compact('about_us'));
    }



    //----------------- Show about In The Website  ------------------
    public function available_projects()
    {
        $available_projects = Property::where('status', 'for_sale')->orderBy('id', 'desc')->paginate(6);

        return view('includes.sitepages.available_projects', compact('available_projects'));
    }
    //----------------- Show about In The Website  ------------------
    public function previous_projects()
    {
        $previous_projects = Property::where('status', 'sold')->orderBy('id', 'desc')->paginate(6);

        return view('includes.sitepages.previous_projects', compact('previous_projects'));
    }



    //----------------- Show One Property In The Website  ------------------
    public function single_property($title_en)
    {

        $property = Property::where('title_en', $title_en)->first();

        $images = explode('|', $property->images);

        return view('includes.sitepages.single_property', compact('property', 'images'));

    }


    //----------------- Show gallery In The Website  ------------------

        public function gallery()
        {
            $galleries= Gallery::where('status', 0 )->paginate(9);

            return view('includes.sitepages.gallery', compact('galleries'));
        }


    //----------------- Show all Properties In The Website  ------------------

    public function all_properties()
    {
        $all_properties= Property::orderBy('id', 'desc')->paginate(9);

        return view('includes.sitepages.all_properties', compact('all_properties'));
    }

    //----------------- Show about In The Website  ------------------
    public function news()
    {
        $news = News::orderBy('id', 'desc')->paginate(6);

        return view('includes.sitepages.news', compact('news'));
    }
    //----------------- Show One Property In The Website  ------------------
    public function news_details($head_en)
    {

        $single_new = News::where('head_en', $head_en)->first();

        return view('includes.sitepages.news_details', compact('single_new'));
    }


//----------------- search In The Website  ------------------

    public function front_search(Request $request)
    {
    	$keyword = isset($request->keyword) && $request->keyword != '' ? $request->keyword : null;

        $properties= Property::orderBy('id', 'desc')->paginate(9);


        if ($keyword != null) {
            $properties = $properties->search($keyword, null, true);
        }

        $properties = $properties->post()->active()->orderBy('id', 'desc')->paginate(5);

        return view('includes.sitepages.all_properties', compact('properties'));
    }




    public function sign_in(Request $request)
    {
        try {
            $user = new User();
            $user->name          = $request->name;
            $user->name_ar       = $request->name_ar;
            $user->email         = $request->email;
            $user->password      = bcrypt($request->password);
            $user->save();

            toastr()->success(trans('messages.success'));
            return redirect()->back()->with([
                'message' => 'You Loged In Successfully',
                'alert-type' => 'success'
            ]);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



        //----------------- Show gallery In The Website  ------------------

        public function search_page()
        {
            return view('includes.sitepages.home_search');
        }



        public function home_search(Request $request)
        {
            $all_properties = Property::when($request->keyword, function ($query, $keyword) {
                return $query->where('title_en', 'like', "%{$keyword}%");

            })->when($request->category_id, function ($query, $category_id) {
                return $query->where('category_id', 'like', "%{$category_id}%");

            })->when($request->city_en, function ($query, $city_en) {
                return $query->where('city_en', 'like', "%{$city_en}%");
            })->when($request->city_ar, function ($query, $city_ar) {
                return $query->where('city_ar', 'like', "%{$city_ar}%");

            })->when($request->address_en, function ($query, $address_en) {
                return $query->where('address_en', 'like', "%{$address_en}%");
            })->when($request->address_ar, function ($query, $address_ar) {
                return $query->where('address_ar', 'like', "%{$address_ar}%");


            })->when($request->price && in_array($request->price, ['more_expensive', 'less_expensive']), function ($query) use ($request) {
                return $query->orderBy('price', $request->price == 'less_expensive' ? 'asc' : 'desc');
            })->when($request->size && in_array($request->size, ['more_size', 'less_size']), function ($query) use ($request) {
                return $query->orderBy('size', $request->size == 'less_size' ? 'asc' : 'desc');


            })->when( ($request->min_price && $request->max_price), function ($query) use ($request) {
                    $query = $query->where('price','>=',$request->min_price);
                    $query = $query->where('price','<=',$request->max_price);
                return $query ;

            })->when( ($request->min_size && $request->max_size), function ($query) use ($request) {
                $query = $query->where('size','>=',$request->min_size);
                $query = $query->where('size','<=',$request->max_size);
            return $query ;

            })->paginate(10);

            return view('includes.sitepages.all_properties', compact('all_properties'));
        }
}




