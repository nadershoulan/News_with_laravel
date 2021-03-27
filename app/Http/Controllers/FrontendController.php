<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Models\ContactInfoItem;
use App\Models\Faq;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\Services;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\HeaderSlider;
use App\Models\KeyFeatures;
use App\Models\PricePlan;
use App\Models\TeamMember;
use App\Models\User;
use App\Models\Counterup;
use App\Models\Testimonial;
use App\Models\Works;
use App\Models\WorksCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
// new
use App\Models\upcomming_events;
use App\Models\reservation;
use App\Models\sign_up;
use App\Models\about;
use App\Models\chef;
use App\Models\comment;
use App\Models\menu_category;
use App\Models\replay;
use App\Models\breaking_news;
use App\Models\youtube_link;
use App\Http\Controllers\toast;

// use DB;
// use Gate;
class FrontendController extends Controller
{

    public function index ( ){
        $all_blogs = Blog::all();
        $all_breaking_news= breaking_news::all();
        $all_blog_category = BlogCategory::all();
        $all_comment= comment::all();
        $all_youtube_link= youtube_link::all();
        return view('frontend.index')->with(
            [
                'all_youtube_link'=> $all_youtube_link,
                'all_comment'=> $all_comment,
                'all_breaking_news'=> $all_breaking_news,
            'blog'=> $all_blogs,
                'all_blog_category'=>$all_blog_category,]
        );
    }


    public function find_blog($id)
    {
        $blog_category_find = BlogCategory::where('id', $id)->get();
        $comment = comment::all();
        // where('lang', $lang)->get();
        $all_replay = replay::all();
        $blog_find = Blog::where('id', $id)->get();
        $all_blog_category = BlogCategory::all();
        $all_blog_category_desc = BlogCategory::orderBy('id', 'desc')->simplePaginate(3);

        return view('frontend.single-post')->with(
            [
                'blog_find' => $blog_find,
                'comment' => $comment,
                'all_replay' => $all_replay,
                'blog_category_find' => $blog_category_find,
                'all_blog_category' => $all_blog_category,
                'all_blog_category_desc' => $all_blog_category_desc,
            ],
        );
    }




    public function catagory()
    {
        // $about = about::all();
        // $chef = chef::all();
        $all_blogs = Blog::orderBy('id','desc')->simplePaginate(3);
        $all_blog_category = BlogCategory::all();
        $all_blog_category_desc = BlogCategory::orderBy('id', 'desc')->simplePaginate(3);
        return view('frontend.catagory')->with(
            [
                'blog' => $all_blogs,
                'all_blog_category' => $all_blog_category,
                'all_blog_category_desc' => $all_blog_category_desc,
            ],
        );
    }


    public function about()
    {
        $about = about::all();
        $chef = chef::all();
        $all_blogs = Blog::all();
        $all_blog_category = BlogCategory::all();
        return view('frontend.about')->with(
            [
                'about' => $about,
                'blog' => $all_blogs,
                'all_blog_category' => $all_blog_category,
                'chef' => $chef,
            ],
        );
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function gallery()
    {
        return view('frontend.gallery');
    }
    public function menu()
    {
        // $blog_category_find = BlogCategory::where('id', $id)->get();
        $menu = menu::all();
        // where('lang', $lang)->get();
        // $blog_find = Blog::where('id', $id)->get();
        $menu_category = menu_category::all();
        // $all_blog_category_desc = BlogCategory::orderBy('id', 'desc')->simplePaginate(3);

        return view('frontend.menu')->with(
            [
                'menu' => $menu,
                'menu_category' => $menu_category,

            ],
        );
    }

    public function about_us()
    {
        return view('frontend.about-us');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|string'
        ]);

        $nnn= new reservation();
        $nnn->Name = $request->name;
        $nnn->Date = $request->date;
        $nnn->Time = $request->time;
        $nnn->Phone = $request->phone;
        $nnn->Email = $request->email;
        $nnn->people = $request->people;
         $nnn->save();
        return redirect()->back()->with(
            [
                'msg' => ' you have seccessfully create . ',
                'type' => ' success ',
            ],
        );
    }

    public function sign(Request $request)
    {
        $this->validate($request, [
             'email' => [
                "unique:sign_up,email"
           ]
        ]);

        $nnn = new sign_up();
        $nnn->email = $request->email_address;
        $nnn->save();
        return redirect()->back()->with(
            [
                'msg' => ' you have seccessfully sign in . ',
                'type' => 'success',
            ],
        );
    }

    public function SEN_US_A_MESSAGE(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $nnn = new ContactInfoItem();
        $nnn->title = $request->name;
        $nnn->email = $request->email;
        $nnn->description = $request->message;
        $nnn->save();
        return redirect()->back()->with(
            [
                'msg' => ' you have seccessfully sent a message . ',
                'type' => ' success ',
            ],
        );
    }


    public function single_post()
    {
        // $blog_category_find = BlogCategory::where('id', $id)->get();
        $comment = comment::all();
        // where('lang', $lang)->get();
        $all_replay = replay::all();
        // $blog_find = Blog::where('id', $id)->get();
        $all_blog_category = BlogCategory::all();
        $all_blog_category_desc = BlogCategory::orderBy('id', 'desc')->simplePaginate(3);

        return view('frontend.single-post')->with(
            [
                // 'blog_find' => $blog_find,
                'comment' => $comment,
                'all_replay'=> $all_replay,
                // 'blog_category_find'=> $blog_category_find ,
                'all_blog_category' => $all_blog_category,
                'all_blog_category_desc' => $all_blog_category_desc,
            ],
        );
    }


    public function comment(Request $request,$id)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $nnn = new comment();
        $nnn->name = $request->name;
        $nnn->email = $request->email;
        $nnn->website = $request->website;
        $nnn->comment = $request->commentent;
        $nnn->blod_detail_id = $request->blod_detail_id;
        $nnn->save();
        return redirect()->back()->with(
            [
                'msg' => 'لقد تم ارسال تعليقك بنجاح وستم مراجعتة من قبل المشرف  ',
                'type' => ' success ',
            ],
        );
    }





}//end class
