<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Property_Images;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class PropertyController extends Controller
{

    public function property_search(Request $request)
    {
        $properties = Property::when($request->keyword, function ($query, $keyword) {
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

        return view('pages.admin.properties.index', compact('properties'));
    }




    public function index()
    {
        $properties=Property::orderBy('id', 'desc')->get();

        $category_ar = Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
        $category_en = Category::orderBy('id', 'desc')->pluck('name_en', 'id');

        return view('pages.admin.properties.index', compact('properties', 'category_ar', 'category_en'));
    }


    public function create()
    {
        $category_ar = Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
        $category_en = Category::orderBy('id', 'desc')->pluck('name_en', 'id');

        $feature_ar = Feature::orderBy('id', 'desc')->pluck('name_ar', 'id');
        $feature_en = Feature::orderBy('id', 'desc')->pluck('name_en', 'id');

        return view('pages.admin.properties.create', compact('category_ar', 'category_en', 'feature_ar', 'feature_en'));
    }




    public function store(Request $request)
    {
        try{
            //To Store Multi Images
            $input=$request->all();
            $images=[];
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name           =$file->getClientOriginalName();
                    $fileextention  =$file->getClientOriginalExtension();  //get Extention of Image
                    $file_to_store  =time().'_'.explode('.',$name)[0].'_.'.$fileextention;

                    $file->move('image',$file_to_store);
                    $images[]=$file_to_store;
                }
            }

            //To Store One Photo For Home Page
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath =('image/photo');
                $image->move($destinationPath, $name);
                $photo=$name;
            }

            $property = new Property();
            $property->photo                = $photo;
            $property->images               =implode("|",$images);

            $property->title_ar             = strip_tags($request->title_ar);
            $property->title_en             = strip_tags($request->title_en);

            $property->price                = $request->price;
            $property->size                = $request->size;
            $property->discount             = $request->discount;
            $property->new_price            = $request->new_price;

            $property->purpose              = $request->purpose;
            $property->status               = $request->status;
            $property->video                = $request->video;

            $property->floornumber          = $request->floornumber;
            $property->bedroom              = $request->bedroom;
            $property->bathroom             = $request->bathroom;
            $property->no_of_floor          = $request->no_of_floor;

            $property->city_ar              = strip_tags($request->city_ar);
            $property->city_en              = strip_tags($request->city_en);
            $property->address_ar           = strip_tags($request->address_ar);
            $property->address_en           = strip_tags($request->address_en);
            $property->nearby_ar            = strip_tags($request->nearby_ar);
            $property->nearby_en            = strip_tags($request->nearby_en);

            $property->description_ar       = strip_tags($request->description_ar);
            $property->description_en       = strip_tags($request->description_en);

            $property->location_latitude    = $request->location_latitude;
            $property->location_longitude   = $request->location_longitude;
            $property->category_id          = $request->category_id;

            $property->save();

            $feature =new Feature;
            $property->features()->attach($request->get('feature_id'));

            toastr()->success('message', 'Property created successfully.');
            return redirect()->route('properties.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('pages.admin.properties.show', compact('property'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $category_ar = Category::pluck('name_ar');
        $category_en = Category::pluck('name_en');

        $properties=Property::all();

        $features = Feature::all();
        $checkfeatures  = $property->features->pluck('id')->toArray();

        return view('pages.admin.properties.edit', compact('category_ar', 'category_en', 'property', 'checkfeatures'));
    }


    public function update(Request $request, $id)
    {

        try {
            $property = Property::findOrFail($id);

            $property_id=Property::whereId($id)->first();
            $old_images= array(explode('|', $property_id->images));

            $images1=array();
            $new_array=[];
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $fileextention =$file->getClientOriginalExtension();  //get Extention of Image
                    $file_to_store=time().'_'.explode('.',$name)[0].'_.'.$fileextention;

                     if( $file->move('image',$file_to_store) ){
                        $images1[]= $file_to_store;
                        $new_array=array_merge($old_images[0], $images1 );
                        $images=implode("|",$new_array);
                        $property->update([
                            $property->images   = $images,
                        ]);
                    }
                }
            }

            //To Store One Photo For Home Page
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath =('image/photo');

                if ( $image->move($destinationPath, $name) ){
                    if($property->photo){
                    $old_photo = $property->photo; //get old photo
                    unlink('image/photo/'.$old_photo);  //delete old photo from folder
                    }
                    $property->photo = $name;
                    $property->save();
                }
            }

            $property->update([
                $property->title_ar             = strip_tags($request->title_ar),
                $property->title_en             = strip_tags($request->title_en),
                $property->price                = $request->price,
                $property->discount             = $request->discount,
                $property->new_price            = $request->new_price,

                $property->purpose              = $request->purpose,
                $property->status               = $request->status,
                $property->used                 = $request->used,
                $property->video                = $request->video,
                $property->size                 = $request->size,

                $property->floornumber          = $request->floornumber,
                $property->no_Of_floor          = $request->no_Of_floor,
                $property->bedroom              = $request->bedroom,
                $property->bathroom             = $request->bathroom,

                $property->city_ar              = strip_tags($request->city_ar),
                $property->city_en              = strip_tags($request->city_en),
                $property->address_ar           = strip_tags($request->address_ar),
                $property->address_en           = strip_tags($request->address_en),
                $property->nearby_ar            = strip_tags($request->nearby_ar),
                $property->nearby_en            = strip_tags($request->nearby_en),

                $property->description_ar       = strip_tags($request->description_ar),
                $property->description_en       = strip_tags($request->description_en),

                $property->location_latitude    = $request->location_latitude,
                $property->location_longitude   = $request->location_longitude,

                $property->category_id   = $request->category_id,
            ]);

                $array_of_features = $request->feature_id;

                $property->features()->sync($array_of_features);

            toastr()->success('message', 'Property Updated successfully.');
            return redirect()->route('properties.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            $property = Property::findOrFail($request->id);

            if ($property) {
                if ($property->images != '') {
                    foreach ($property->images as $images) {
                        if (File::exists('image/' . $images)) {
                            unlink('image/' . $images);
                        }
                    }
                }

                if($property->photo)
                {
                    if (File::exists('image/photo/' .$property->photo) ) {
                        unlink('image/photo/'.$property->photo);
                    }
                }
                $property->delete();

                toastr()->error(trans('messages.Delete'));
                return redirect()->route('properties.index');
            }
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function removeImage(Request $request)
    {
        //كنا بعتنا في صفحة التعديل ( id - Image)
        //دلوقتي هنفكها في صورة ارراي ونفصل بينهم
        $list        = explode(',', $request->get('key') );
        $image_name  = $list[0];
        $property_id = $list[1];

        //دلوقتي هنجيب العقار اللي بيحمل الاي دي اللي بعتناها معانا من صفحه التعديل
        //    بالتالي كده هنقدر نجيب اسماء الصور بتاع البرودكت دا بس علشان نقدر نفصل بينهم ونمسح اسم الصورة من الارااي دا
        $property = Property::whereId($property_id)->first();
        $images = explode('|', $property->images);

        // في الخطوه دي احنا مسحنا اسم الصورة المراد حذفها من الارااي
        if (($key = array_search($image_name, $images)) !== false) {
                unset($images[$key]);
        }

        //لو الصورة موجوده
        if ($image_name) {
            //هنا سوف يتم الوصول لمكان الصورة و حذفها
            if (File::exists('image/' . $image_name)) {
                unlink('image/' . $image_name);

                //هنا هيتم تعديل صف الصور في هذا العقار
                $property->update([
                    $property->images                = implode("|",$images),
                ]);
            }
            return true;
        }
        return false;
    }























    // public function store(Request $request)
    // {
    //     try {

    //         //To Store Multi Images
    //         $input=$request->all();
    //         $images=array();
    //         if($files=$request->file('images')){
    //             foreach($files as $file){
    //                 $name=$file->getClientOriginalName();
    //                 $fileextention =$file->getClientOriginalExtension();  //get Extention of Image
    //                 $file_to_store=time().'_'.explode('.',$name)[0].'_.'.$fileextention;

    //                 $file->move('image',$file_to_store);
    //                 $images[]=$file_to_store;
    //             }
    //         }


    //         //To Store One Photo For Home Page
    //         if ($request->hasFile('photo')) {
    //             $image = $request->file('photo');
    //             $name = time().'.'.$image->getClientOriginalExtension();
    //             $destinationPath = public_path('/image/photo');
    //             $image->move($destinationPath, $name);
    //             $photo=$name;
    //         }

    //         /*Insert your data*/
    //         $property= Property::create([
    //                 'images'                =>implode("|",$images),
    //                 'photo'                 =>$photo,
    //                 'title_ar'              =>$input['title_ar'],
    //                 'title_en'              =>$input['title_en'],
    //                 'price'                 =>$input['price'],
    //                 'discount'              =>$input['discount'],
    //                 'new_price'             =>$input['new_price'],
    //                 'purpose'               =>$input['purpose'],
    //                 'size'                  =>$input['size'],
    //                 'status'                =>$input['status'],
    //                 'used'                  =>$input['used'],
    //                 'video'                 =>$input['video'],
    //                 'floornumber'           =>$input['floornumber'],
    //                 'no_of_floor'           =>$input['no_of_floor'],
    //                 'bedroom'               =>$input['bedroom'],
    //                 'bathroom'              =>$input['bathroom'],
    //                 'city_ar'               =>$input['city_ar'],
    //                 'city_en'               =>$input['city_en'],
    //                 'address_ar'            =>$input['address_ar'],
    //                 'address_en'            =>$input['address_en'],
    //                 'nearby_ar'             =>strip_tags($input['nearby_ar']),
    //                 'nearby_en'             =>strip_tags($input['nearby_en']),
    //                 'description_ar'        =>strip_tags($input['description_ar']),
    //                 'description_en'        =>strip_tags($input['description_en']),
    //                 'location_latitude'     =>$input['location_latitude'],
    //                 'location_longitude'    =>$input['location_longitude'],
    //                 'category_id'           =>$input['category_id'],

    //                 //you can put other insertion here
    //         ]);

    //         $feature =new Feature;
    //         $property->features()->attach($request->get('feature_id'));

    //         toastr()->success('message', 'Property created successfully.');
    //         return redirect()->route('properties.index');
    //     }
    //     catch (\Exception $e){
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }

    // }









}
