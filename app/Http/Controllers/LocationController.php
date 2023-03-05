<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    //
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function locationPins(Request $request)
    {
        $data['pins'] = Pin::paginate(100);
        $data['pin'] = Pin::find($request->id);
        return view('pages.location-pins', $data);
    }

    public function saveLocationPins(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'lat' => "required",
            'lng' => "required",
            'address' => "required",
            'pin_type' => "required"
        ]);

        if($validate->fails()){
            Session::flash("error-msg", $validate->errors()->first());
            return redirect()->back()->withInput();
        }

        if(!empty($request->id)){
            $pin = Pin::find($request->id);
            $removedImages = array_diff($pin->images, (array)$request->old_images);
            foreach($removedImages as $rimage){
                @unlink(public_path("storage/".$rimage));
            }
        }else{
            $pin = new Pin;
        }
        $pin->lat = $request->lat;
        $pin->lng = $request->lng;
        $pin->pin_type = $request->pin_type;
        $pin->address = $request->address;
        $pin->business_title = $request->business_title;
        $images = [];
        if($request->hasFile('images')){

            foreach ($request->file('images') as $imagefile) {
                $file = $imagefile->store('uploads', 'public'); //new file path
                $images[] = $file;
            }
        }
        if(is_array($request->old_images) && is_array($images)){
            $images = array_merge($images, $request->old_images);
        }
        $pin->images = $images;
        $isSave = $pin->save();

        if($isSave){
            Session::flash("success-msg", "Pin saved successfully");
            return redirect()->route("location-pins");
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();
    }

    public function deleteLocationPin($id)
    {
        $pin = Pin::find($id);
        foreach($pin->images as $image){
            $file_path = public_path('storage/'.$image);
            if(File::exists($file_path)) {
                unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }
        }
        $isSave = $pin->delete();
        if($isSave){
            Session::flash("success-msg", "Location pin has been deleted successfully");
            return redirect()->back();
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();
    }
}
