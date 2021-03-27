<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use App\models\Blog;
use App\Admin;
use App\Models\Language;
use App\Models\Services;
use App\Models\ContactInfoItem;
use App\Models\Counterup;
use App\Models\KeyFeatures;
use App\Models\PricePlan;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Works;
use App\Models\User;

use App\Models\Faq;
// use App\Models\Menu;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\HeaderSlider;
use App\Models\WorksCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// new
// use App\Models\upcomming_events;
// use App\Models\reservation;
use App\Models\sign_up;
use App\Models\about;
// use App\Models\chef;
use App\Models\comment;
// use App\Models\menu_category;
use App\Models\StaticOption;


class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function adminIndex()
    {

        $all_blogs = Blog::count();
        $total_admin = Admin::count();
        $total_BlogCategory = BlogCategory::count();
        // $total_chef = chef::count();
        $total_comment = comment::count();
        // $total_Menu = Menu::count();
        // $total_menu_category = menu_category::count();
        // $total_upcomming_events = upcomming_events::count();
        // $total_reservation = reservation::count();
        $total_sign_up = sign_up::count();


        return view('backend.admin-home')->with([
            'blog_count' => $all_blogs,
            'total_admin' => $total_admin,
            'total_BlogCategory' => $total_BlogCategory,
            // 'total_chef' => $total_chef,
            'total_comment' => $total_comment,
            // 'total_Menu' => $total_Menu,
            // 'total_menu_category' => $total_menu_category,
            // 'total_upcomming_events' => $total_upcomming_events,
            // 'total_reservation' => $total_reservation,
            'total_sign_up' => $total_sign_up,
        ]);
    }

    public function site_identity()
    {
        return view('backend.general-settings.site-identity');
    }

    public function update_site_identity(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'mimes:jpg,jpeg,png|max:2064',
            'site_favicon' => 'mimes:jpg,jpeg,png|max:2064',
            'site_breadcrumb_bg' => 'mimes:jpg,jpeg,png|max:2064'
        ]);
        if ($request->hasFile('site_logo')) {
            $image = $request->site_logo;
            $image_extenstion = $image->getClientOriginalExtension();
            $image_name = 'site-logo-'.rand(999,999999) .'.'. $image_extenstion;
            if (check_image_extension($image)) {
                $image->move('assets/uploads/', $image_name);
                update_static_option('site_logo', $image_name);
            }
        }
        if ($request->hasFile('site_white_logo')) {
            $image = $request->site_white_logo;
            $image_extenstion = $image->getClientOriginalExtension();
            $image_name = 'site-white-logo-' .rand(999,999999) .'.'. $image_extenstion;
            if (check_image_extension($image)) {
                $image->move('assets/uploads/', $image_name);
                update_static_option('site_white_logo', $image_name);
            }
        }
        if ($request->hasFile('site_favicon')) {
            $image = $request->site_favicon;
            $image_extenstion = $image->getClientOriginalExtension();
            $image_name = 'site-favicon-' .rand(999,999999) .'.'. $image_extenstion;
            if (check_image_extension($image)) {
                $image->move('assets/uploads/', $image_name);
                update_static_option('site_favicon', $image_name);
            }
        }
        if ($request->hasFile('site_breadcrumb_bg')) {
            $image = $request->site_breadcrumb_bg;
            $image_extenstion = $image->getClientOriginalExtension();
            $image_name = 'breadcrumb-bg-' .rand(999,999999) .'.'. $image_extenstion;
            if (check_image_extension($image)) {
                $image->move('assets/uploads/', $image_name);
                update_static_option('site_breadcrumb_bg', $image_name);
            }
        }
        return redirect()->back()->with([
            'msg' => 'Site Identity Has Been Updated..',
            'type' => 'success'
        ]);
    }

    public function admin_settings()
    {
        return view('auth.admin.settings');
    }

    public function admin_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'image' => 'mimes:jpg,jpeg,png|max:2064'
        ]);
        $image_ext = Auth::user()->image;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_extenstion = $request->image->getClientOriginalExtension();
            $image_ext = $image_extenstion;
            $image_name = 'admin-pic-' . Auth::user()->id . '.' . $image_extenstion;
            if (check_image_extension($request->image)) {
                $image->move('assets/uploads/admins', $image_name);
            }
        }
        Admin::find(Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email, 'image' => $image_ext]);
        return redirect()->back()->with(['msg' => 'Profile Update Success', 'type' => 'success']);
    }

    public function admin_password_chagne(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = Admin::findOrFail(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.login')->with(['msg' => 'Password Changed Successfully', 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => 'Somethings Going Wrong! Please Try Again or Check Your Old Password', 'type' => 'danger']);
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with(['msg' => 'You Logged Out !!', 'type' => 'danger']);
    }

    public function admin_profile()
    {
        return view('auth.admin.edit-profile');
    }

    public function admin_password()
    {
        return view('auth.admin.change-password');
    }

    public function contact()
    {
        $all_contact_info_items = ContactInfoItem::all();
        return view('backend.pages.contact')->with([
            'all_contact_info_item' => $all_contact_info_items
        ]);
    }

    public function update_contact(Request $request)
    {
        $this->validate($request, [
            'page_title' => 'required|string|max:191',
            'get_title' => 'required|string|max:191',
            'get_description' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        update_static_option('contact_page_title', $request->page_title);
        update_static_option('contact_page_get_title', $request->get_title);
        update_static_option('contact_page_get_description', $request->get_description);
        update_static_option('contact_page_latitude', $request->latitude);
        update_static_option('contact_page_longitude', $request->longitude);

        return redirect()->back()->with(['msg' => 'Contact Page Info Update Success', 'type' => 'success']);
    }


    public function blog_page()
    {
        $all_languages = Language::all();
        return view('backend.pages.blog')->with(['all_languages' => $all_languages]);
    }

    public function blog_page_update(Request $request)
    {
        $all_language = Language::all();
        foreach ($all_language as $lang){
            $this->validate($request, [
                'blog_page_'.$lang->slug.'_title' => 'nullable',
                'blog_page_'.$lang->slug.'_item' => 'nullable',
                'blog_page_'.$lang->slug.'_category_widget_title' => 'nullable',
                'blog_page_'.$lang->slug.'_recent_post_widget_title' => 'nullable',
                'blog_page_'.$lang->slug.'_recent_post_widget_item' => 'nullable',
            ]);
            $blog_page_title = 'blog_page_'.$lang->slug.'_title';
            $blog_page_item = 'blog_page_'.$lang->slug.'_item';
            $blog_page_category_widget_title = 'blog_page_'.$lang->slug.'_category_widget_title';
            $blog_page_recent_post_widget_title = 'blog_page_'.$lang->slug.'_recent_post_widget_title';
            $blog_page_recent_post_widget_item = 'blog_page_'.$lang->slug.'_recent_post_widget_item';

            update_static_option('blog_page_'.$lang->slug.'_title', $request->$blog_page_title);
            update_static_option('blog_page_'.$lang->slug.'_item', $request->$blog_page_item);
            update_static_option('blog_page_'.$lang->slug.'_category_widget_title', $request->$blog_page_category_widget_title);
            update_static_option('blog_page_'.$lang->slug.'_recent_post_widget_title', $request->$blog_page_recent_post_widget_title);
            update_static_option('blog_page_'.$lang->slug.'_recent_post_widget_item', $request->$blog_page_recent_post_widget_item);
        }


        return redirect()->back()->with(['msg' => 'Blog Settings Update Success', 'type' => 'success']);
    }

    public function basic_settings()
    {
        return view('backend.general-settings.basic');
    }

    public function update_basic_settings(Request $request)
    {
        $this->validate($request, [
            'site_title' => 'required|string',
            'site_tag_line' => 'required|string',
            'site_footer_copyright' => 'required|string',
            'site_color' => 'required|string',
            'site_main_color_two' => 'required|string',
        ]);

        update_static_option('site_title', $request->site_title);
        update_static_option('site_tag_line', $request->site_tag_line);
        update_static_option('site_footer_copyright', $request->site_footer_copyright);
        update_static_option('site_color', $request->site_color);
        update_static_option('site_main_color_two', $request->site_main_color_two);

        return redirect()->back()->with(['msg' => 'Basic Settings Update Success', 'type' => 'success']);
    }

    public function seo_settings()
    {
        return view('backend.general-settings.seo');
    }

    public function update_seo_settings(Request $request)
    {
        $this->validate($request, [
            'site_meta_tags' => 'required|string',
            'site_meta_description' => 'required|string'
        ]);

        update_static_option('site_meta_tags', $request->site_meta_tags);
        update_static_option('site_meta_description', $request->site_meta_description);

        return redirect()->back()->with(['msg' => 'SEO Settings Update Success', 'type' => 'success']);
    }

    public function scripts_settings()
    {
        return view('backend.general-settings.thid-party');
    }

    public function update_scripts_settings(Request $request)
    {

        $this->validate($request, [
            'site_disqus_key' => 'nullable|string',
            'tawk_api_key' => 'nullable|string',
            'site_google_map_api' => 'nullable|string',
            'site_google_analytics' => 'nullable|string',
            'site_google_captcha_v3_secret_key' => 'nullable|string',
            'site_google_captcha_v3_site_key' => 'nullable|string',
        ]);

        update_static_option('site_disqus_key', $request->site_disqus_key);
        update_static_option('site_google_analytics', $request->site_google_analytics);
        update_static_option('tawk_api_key', $request->tawk_api_key);
        update_static_option('site_google_map_api', $request->site_google_map_api);
        update_static_option('site_google_captcha_v3_site_key', $request->site_google_captcha_v3_site_key);
        update_static_option('site_google_captcha_v3_secret_key', $request->site_google_captcha_v3_secret_key);

        return redirect()->back()->with(['msg' => 'Third Party Scripts Settings Updated..', 'type' => 'success']);
    }

    public function email_template_settings()
    {
        return view('backend.general-settings.email-template');
    }

    public function update_email_template_settings(Request $request)
    {

        $this->validate($request, [
            'site_global_email' => 'required|string',
            'site_global_email_template' => 'required|string',
        ]);

        update_static_option('site_global_email', $request->site_global_email);
        update_static_option('site_global_email_template', $request->site_global_email_template);

        return redirect()->back()->with(['msg' => 'Email Settings Updated..', 'type' => 'success']);
    }

    public function home_variant()
    {
        return view('backend.pages.home.home-variant');
    }

    public function update_home_variant(Request $request)
    {
        $this->validate($request, [
            'home_page_variant' => 'required|string'
        ]);
        update_static_option('home_page_variant', $request->home_page_variant);
        return redirect()->back()->with(['msg' => 'Home Variant Settings Updated..', 'type' => 'success']);
    }

    public function navbar_settings()
    {
        return view('backend.pages.navbar-settings');
    }

    public function update_navbar_settings(Request $request)
    {

        $this->validate($request, [
            'navbar_button' => 'nullable|string'
        ]);

        update_static_option('navbar_button', $request->navbar_button);
        $all_lang  = Language::all();
        foreach ($all_lang as $lang){
            $filed_name = 'navbar_'.$lang->slug.'_button_text';
            update_static_option('navbar_'.$lang->slug.'_button_text', $request->$filed_name);
        }

        return redirect()->back()->with(['msg' => 'Navbar Settings Updated..', 'type' => 'success']);
    }

    public function cache_settings()
    {
        return view('backend.general-settings.cache-settings');
    }

    public function update_cache_settings(Request $request)
    {

        $this->validate($request, [
            'cache_type' => 'required|string'
        ]);

        Artisan::call($request->cache_type . ':clear');

        return redirect()->back()->with(['msg' => 'Cache Cleaned...', 'type' => 'success']);
    }
    public function new_backup_settings()
    {
        /*
          Needed in SQL File:

    SET GLOBAL sql_mode = '';
    SET SESSION sql_mode = '';
    */


    $get_all_table_query = "SHOW TABLES";
    $result = DB::select(DB::raw($get_all_table_query));

    $tables = [
            'chef',
            'about',
    ];

    $structure = '';
    $data = '';
    foreach ($tables as $table) {
        $show_table_query = "SHOW CREATE TABLE " . $table . "";

        $show_table_result = DB::select(DB::raw($show_table_query));

        foreach ($show_table_result as $show_table_row) {
            $show_table_row = (array)$show_table_row;
            $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
        }
        $select_query = "SELECT * FROM " . $table;
        $records = DB::select(DB::raw($select_query));

        foreach ($records as $record) {
            $record = (array)$record;
            $table_column_array = array_keys($record);
            foreach ($table_column_array as $key => $name) {
                $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
            }

            $table_value_array = array_values($record);
            $data .= "\nINSERT INTO $table (";

            $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

            foreach($table_value_array as $key => $record_column)
                $table_value_array[$key] = addslashes($record_column);

            $data .= "('" . implode("','", $table_value_array) . "');\n";
        }
    }
    $file_name ='./database/food_database_backup_on_' . date('y_m_d') . '.sql';
    $file_handle = fopen($file_name, 'w + ');

    $output = $structure . $data;
    fwrite($file_handle, $output);
    fclose($file_handle);
    // echo "DB backup ready";

        return redirect()->back()->with(['msg' => 'Database Backup Completed...', 'type' => 'success']);
    }

    public function backup_settings()
    {
        // Artisan::call('backup:run');
        $all_backuped_db = glob('database/*');
        return view('backend.general-settings.backup')->with(['all_backuped_db' => $all_backuped_db]);
    }

    public function update_backup_settings(Request $request)
    {

        $process = new Process(array(sprintf(
            'mysqldump -u%s -p%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            'backup/' . config('database.connections.mysql.database') . '_' . date('j_F_Y_h:m:s') . '.sql'
        )));
        $process->mustRun();
        return redirect()->back()->with(['msg' => 'Database Backup Completed...', 'type' => 'success']);
    }

    public function delete_backup_settings(Request $request)
    {

        if (file_exists($request->db_name)) {
            unlink($request->db_name);
        }

        return redirect()->back()->with(['msg' => 'Database Deleted...', 'type' => 'danger']);
    }

    public function restore_backup_settings(Request $request)
    {
        $process = new Process(array(sprintf(
            'mysql -u%s -p%s %s < %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.database'),
            'backup/' . $request->db_name
        )));
        $process->mustRun();
        return redirect()->back()->with(['msg' => 'Database Restore Completed...', 'type' => 'success']);
    }

    public function license_settings()
    {
        return view('backend.general-settings.license-settings');
    }

    public function update_license_settings(Request $request)
    {
        $this->validate($request, [
            'item_purchase_key' => 'required|string|max:191'
        ]);
        update_static_option('item_purchase_key', $request->item_purchase_key);

        $data = array(
            'action' => env('XGENIOUS_API_ACTION'),
            'purchase_code' => get_static_option('item_purchase_key'),
            'author' => env('XGENIOUS_API_AUTHOR'),
            'site_url' => url('/'),
            'item_unique_key' => env('XGENIOUS_API_KEY'),
        );
        //item_license_status
        $api_url = env('XGENIOUS_API_URL') . '?' . http_build_query($data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);
        update_static_option('item_license_status', $result->license_status);
        $type = 'verified' == $result->license_status ? 'success' : 'danger';
        $license_info = [
            "item_license_status" => $result->license_status,
            "last_check" => time(),
            "purchase_code" => get_static_option('item_purchase_key'),
            "xgenious_app_key" => env('XGENIOUS_API_KEY'),
            "author" => env('XGENIOUS_API_AUTHOR'),
            "message" => $result->message
         ];
        //file_put_contents('@core/license.json',json_encode($license_info));

        return redirect()->back()->with(['msg' => $result->message, 'type' => $type]);
    }

    public function custom_css_settings(){
        $custom_css = '/* Write Custom Css Here */';
        if (file_exists('assets/frontend/css/dynamic-style.css')){
            $custom_css = file_get_contents('assets/frontend/css/dynamic-style.css');
        }
        return view('backend.general-settings.custom-css')->with(['custom_css' => $custom_css]);
    }

    public function update_custom_css_settings(Request $request){
        $custom_css = minify_css_lines($request->custom_css_area);
        file_put_contents('assets/frontend/css/dynamic-style.css',$custom_css);

        return redirect()->back()->with(['msg' => 'Custom Style Added Success...', 'type' => 'success']);
    }
     public function edit_words_settings(){
        $all_word = StaticOption::all();
        return view('backend.general-settings.edit-words')->with([
            'all_word' => $all_word,
        ]);
    }
    public function update_edit_words_settings(Request $request)
    {
        //  $ca = sign_up::find($request->word[1]);
        // $nader= sign_up::findOrFail($request->word[2]);
        // $nader->update($request->all());

        // update_static_option($request->wo, $request->word2);
        // sign_up::where('id', $id)->update([
        // $ca->update($request->all());
        // 'email' => $request->email,
        // ]);
            // for( $x=1; $x<12; $x++){
        StaticOption::where('id', $request->m[$request->lw])->update([
            'option_value' => $request->word[$request->lw],
            ]);
        // }
            $all_word = StaticOption::all();
        // update_static_option('word', $request->word[1]);
        return view('backend.general-settings.edit-words')->with([
            // 'all_word' => $all_word,
            'all_word' => $all_word,
        ]);
    }


}
