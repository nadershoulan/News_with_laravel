<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\ContactInfoItem;
use App\Models\BlogCategory;
use App\Models\Language;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class ContactInfoItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $all_comment = ContactInfoItem::all()->groupBy('lang');
        return view('backend.pages.ContactInfoItem.index')->with([
            'all_blog' => $all_comment,
        ]);
    }

    public function edit_blog($id)
    {
        $blog_ContactInfoItemt = ContactInfoItem::find($id);
        return view('backend.pages.ContactInfoItem.edit')->with([
            'blog_ContactInfoItemt' => $blog_ContactInfoItemt,
        ]);
    }
    public function update_blog(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',

        ]);
        ContactInfoItem::where('id', $id)->update([
            'People' => $request->people,
            'phone' => $request->phone,
            'Date' => $request->Date,
            'Email' => $request->email,
            'Name' => $request->Name
        ]);


        return redirect()->back()->with([
            'msg' => 'Blog ContactInfoItem updated...',
            'type' => 'success'
        ]);
    }
    public function delete_blog(Request $request, $id)
    {
        $blog_post = ContactInfoItem::find($id);

        $blog_post->delete();
        return redirect()->back()->with([
            'msg' => 'ContactInfoItem Post Delete Success...',
            'type' => 'danger'
        ]);
    }



    public function Language_by_slug(Request $request)
    {
        $all_category = BlogCategory::where('lang', $request->lang)->get();

        return response()->json($all_category);
    }
}
