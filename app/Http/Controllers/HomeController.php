<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Page;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
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
    public function index()
    {

        return view('home');
    }

    public function settings()
    {
        $data['setting'] = Setting::first();
        return view('pages.settings', $data);
    }

    public function saveSettings(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => "required|email",
            'phone' => "required",
            'fax' => "required",
            'copyright_text' => "required",
            'logo' => "sometimes|image|max:5000",
            'favicon' => "sometimes|image|max:5000",
            'slider_logo' => "sometimes|image|max:5000",
        ]);

        if($validate->fails()){
            Session::flash("error-msg", $validate->errors()->first());
            return redirect()->back()->withInput();
        }

        $s = Setting::first();
        if(is_null($s)){
            $s = new Setting;
        }
        $s->email = $request->email;
        $s->phone = $request->phone;
        $s->fax = $request->fax;
        $s->lat = $request->lat;
        $s->lng = $request->lng;
        $s->copyright_text = $request->copyright_text;

        $s->meta_title = $request->meta_title;
        $s->meta_description = $request->meta_description;
        $s->meta_keywords = $request->meta_keywords;

        if (request()->hasFile('logo') && request('logo') != '') {
            $file_path = public_path('storage/'.$s->logo);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                @unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('logo')->store('uploads', 'public'); //new file path

            $s->logo = $file;
        }

        if (request()->hasFile('favicon') && request('favicon') != '') {
            $file_path = public_path('storage/'.$s->favicon);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('favicon')->store('uploads', 'public'); //new file path

            $s->favicon = $file;
        }

        if (request()->hasFile('slider_logo') && request('slider_logo') != '') {
            $file_path = public_path('storage/'.$s->slider_logo);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                @unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('slider_logo')->store('uploads', 'public'); //new file path

            $s->slider_logo = $file;
        }

        $s->facebook_link = $request->facebook_link;
        $s->twitter_link = $request->twitter_link;
        $s->linkedin_link = $request->linkedin_link;
        $s->youtube_link = $request->youtube_link;
        $isSave = $s->save();
        if($isSave){
            Session::flash("success-msg", "Settings saved successfully");
            return redirect()->back();
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();
    }

    public function pageContent()
    {
        $data['page'] = Page::first();
        return view('pages.page_content', $data);
    }

    public function savePageSettings(Request $request)
    {
        $validate = Validator::make($request->all(), [
            // 'email' => "required|email",
            // 'phone' => "required",
            // 'fax' => "required",
            // 'copyright_text' => "required",
            // 'logo' => "sometimes|image|max:5000",
            // 'favicon' => "sometimes|image|max:5000",
            // 'slider_logo' => "sometimes|image|max:5000",
        ]);

        if($validate->fails()){
            Session::flash("error-msg", $validate->errors()->first());
            return redirect()->back()->withInput();
        }

        $s = Page::first();
        if(is_null($s)){
            $s = new Page;
        }
        $s->slider = $request->slider;
        $s->count = $request->count;
        $s->count_title = $request->count_title;
        
        $s->hero_title = $request->hero_title;
        $s->hero_body = $request->hero_body;
        
        $s->about_title = $request->about_title;
        $s->about_body = $request->about_body;

        if (request()->hasFile('about_signature') && request('about_signature') != '') {
            $file_path = public_path('storage/'.$s->about_signature);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                @unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('about_signature')->store('uploads', 'public'); //new file path

            $s->about_signature = $file;
        }
        $s->company_title = $request->company_title;
        $s->company_description = $request->company_description;
        $s->company_video = $request->company_video;

        if (request()->hasFile('company_video_image') && request('company_video_image') != '') {
            $file_path = public_path('storage/'.$s->company_video_image);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                @unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('company_video_image')->store('uploads', 'public'); //new file path

            $s->company_video_image = $file;
        }
        $s->intro_title = $request->intro_title;
        $s->intro_description = $request->intro_description;
        $s->intro_video = $request->intro_video;
        if (request()->hasFile('intro_video_image') && request('intro_video_image') != '') {
            $file_path = public_path('storage/'.$s->intro_video_image);
            //You can also check existance of the file in storage.
            if(File::exists($file_path)) {
                @unlink($file_path); //delete from storage
                // Storage::delete($file_path); //Or you can do it as well
            }

            $file = $request->file('intro_video_image')->store('uploads', 'public'); //new file path

            $s->intro_video_image = $file;
        }


        $isSave = $s->save();
        if($isSave){
            Session::flash("success-msg", "Page settings saved successfully");
            return redirect()->back();
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();
    }


    public function videoContent()
    {
        $data['videos'] = Video::paginate(100);
        return view('pages.videos', $data);
    }

    public function saveVideoSettings(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => "sometimes|image|max:5000",
            'url' => "sometimes|url",
            'video' => "sometimes"
        ]);

        if($validate->fails()){
            Session::flash("error-msg", $validate->errors()->first());
            return redirect()->back()->withInput();
        }

        $s = new Video;
        $s->url = $request->url;

        if (request()->hasFile('image') && request('image') != '') {

            $file = $request->file('image')->store('uploads', 'public'); //new file path

            $s->image = $file;
        }

        // if (request()->hasFile('video') && request('video') != '') {
        //     $file_path = public_path('storage/'.$s->video);
        //     //You can also check existance of the file in storage.
        //     if(File::exists($file_path)) {
        //         unlink($file_path); //delete from storage
        //         // Storage::delete($file_path); //Or you can do it as well
        //     }

        //     $file = $request->file('video')->store('uploads', 'public'); //new file path

        //     $s->video = $file;
        // }

        $isSave = $s->save();
        if($isSave){
            Session::flash("success-msg", "Settings saved successfully");
            return redirect()->back();
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();
    }

    public function deleteVideo($id)
    {
        $video = Video::find($id);
        $file_path = public_path('storage/'.$video->image);
        if(File::exists($file_path)) {
            @unlink($file_path); //delete from storage
            // Storage::delete($file_path); //Or you can do it as well
        }
        $isSave = $video->delete();
        if($isSave){
            Session::flash("success-msg", "Video has been deleted successfully");
            return redirect()->back();
        }

        Session::flash("error-msg", "Unable to connect with server, please try again later");
        return redirect()->back()->withInput();

    }

}
