<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use Illuminate\Http\Request;
// use App\Task;
use Laravel\Sanctum\SanctumServiceProvider;
// dashboard    Controllers
use App\Http\Controllers\TasksController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Post;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserRoleManageController;
use App\Http\Controllers\KeyFeaturesController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HeaderSliderController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FrontendController;
// new
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\sign_upController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\ContactInfoItemController;
use App\Http\Controllers\AboutPageController;

// End of dashboard    Controllers


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cache-clear', function () {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
});
/////////////////////////////////
// FrontEnd
/////////////////////////////////

// Route::group(['middleware' => ['globalVariable']],function (){
// Route::middleware(['auth'])->group(function () {
// Route::group(['middleware' => 'auth'], function () {
//     //frontend routes


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/catagory', [FrontendController::class, 'catagory'])->name('catagory');
Route::get('/single-post', [FrontendController::class, 'single_post'])->name('single-post');
Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about-us');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'SEN_US_A_MESSAGE']);
Route::get('/single-post/{id}', [FrontendController::class, 'find_blog'])->name('frontend.single-post');
Route::post('/single-post/{id}', [FrontendController::class, 'comment']);


Route::post('/create', [FrontendController::class, 'create']);
Route::post('/', [FrontendController::class, 'sign']);


// });

/////////////////////////////////
//admin login
/////////////////////////////////

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('/login/admin/forget-password', [FrontendController::class, 'showAdminForgetPasswordForm'])->name('admin.forget.password');


Route::get('/login/admin/reset-password/{user}/{token}', [FrontendController::class, 'showAdminResetPasswordForm'])->name('admin.reset.password');
Route::post('/login/admin/reset-password', [FrontendController::class, 'AdminResetPassword'])->name('admin.reset.password.change');

Route::post('/login/admin/forget-password', [FrontendController::class, 'sendAdminForgetPasswordMail']);

Route::post('/logout/admin', [AdminDashboardController::class, 'adminLogout'])->name('admin.logout');

// Route::post('/login/admin','Auth\LoginController@adminLogin');
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
//admin dashboard routes
/////////////////////////////////
Route::namespace('Admin')->prefix('admin-home')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'adminIndex'])->name('admin.home');
    ///////////////////////////////////////////

    //     //home page variant select
    ///////////////////////////////////////////
    Route::get('/home-variant', [AdminDashboardController::class, 'home_variant'])->name('admin.home.variant');
    Route::post('/home-variant', [AdminDashboardController::class, 'update_home_variant']);
    ///////////////////////////////////////////
    //     //contact info
    ///////////////////////////////////////////
    Route::get('/contact-page/contact-info', [ContactInfoController::class, 'index'])->name('admin.contact.info');
    Route::post('/contact-page/contact-info', [ContactInfoController::class, 'store']);
    Route::post('/contact-page/contact-info/title', [ContactInfoController::class, 'contact_info_title'])->name('admin.contact.info.title');
    Route::post('/contact-page/contact-info/update', [ContactInfoController::class, 'update'])->name('admin.contact.info.update');
    Route::post('/contact-page/contact-info/delete/{id}', [ContactInfoController::class, 'delete'])->name('admin.contact.info.delete');
    ///////////////////////////////////////////
    //     //about page
    ///////////////////////////////////////////
    Route::get('/about-page/about-us', [AboutPageController::class, 'about_page_about_section'])->name('admin.about.page.about');
    Route::post('/about-page/about-us', [AboutPageController::class, 'about_page_update_about_section']);
    Route::get('/about-page/team-member', [AboutPageController::class, 'about_page_team_member_section'])->name('admin.about.team.member');
    Route::post('/about-page/team-member', [AboutPageController::class, 'about_page_update_team_member_section']);
    ///////////////////////////////////////////
    //     //header slider
    ///////////////////////////////////////////
    Route::get('/header', [HeaderSliderController::class, 'index'])->name('admin.header');
    Route::post('/header', [HeaderSliderController::class, 'store']);

    Route::post('/update-header', [HeaderSliderController::class, 'update'])->name('admin.header.update');
    Route::post('/delete-header/{id}', [HeaderSliderController::class, 'delete'])->name('admin.header.delete');
    ///////////////////////////////////////////
    //     //footer
    ///////////////////////////////////////////
    Route::get('/footer/about', [FooterController::class, 'about_widget'])->name('admin.footer.about');
    Route::post('/footer/about', [FooterController::class, 'update_about_widget']);
    Route::get('/footer/general', [FooterController::class, 'general_widget'])->name('admin.footer.general');
    Route::post('/footer/general', [FooterController::class, 'update_general_widget']);
    Route::get('/footer/useful-links', [FooterController::class, 'useful_links_widget'])->name('admin.footer.useful.link');
    Route::post('/footer/useful-links/widget', [FooterController::class, 'update_widget_useful_links'])->name('admin.footer.useful.link.widget');
    Route::post('/footer/useful-links', [FooterController::class, 'new_useful_links_widget']);
    Route::post('/footer/useful-links/update', [FooterController::class, 'update_useful_links_widget'])->name('admin.footer.useful.link.update');
    Route::post('/footer/useful-links/update/{delete}', [FooterController::class, 'delete_useful_links_widget'])->name('admin.footer.useful.link.delete');
    Route::post('/footer/useful-links/menu', [FooterController::class, 'useful_links_widget_menu_by_slug'])->name('admin.footer.useful.link.menus');
    Route::get('/footer/recent-post', [FooterController::class, 'recent_post_widget'])->name('admin.footer.recent.post');
    Route::post('/footer/recent-post', [FooterController::class, 'update_recent_post_widget']);
    Route::get('/footer/important-links', [FooterController::class, 'important_links_widget'])->name('admin.footer.important.link');
    Route::post('/footer/important-links/widget', [FooterController::class, 'update_widget_important_links'])->name('admin.footer.important.link.widget');
    Route::post('/footer/important-links', [FooterController::class, 'new_important_links_widget']);
    Route::post('/footer/important-links/update', [FooterController::class, 'update_important_links_widget'])->name('admin.footer.important.link.update');
    Route::post('/footer/important-links/slug', [FooterController::class, 'important_links_widget_menu_by_slug'])->name('admin.footer.important.link.menu');
    Route::post('/footer/important-links/update/{delete}', [FooterController::class, 'delete_important_links_widget'])->name('admin.footer.important.link.delete');
    ///////////////////////////////////////////
    //     //blog
    ///////////////////////////////////////////
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog');
    Route::get('/new-blog', [BlogController::class, 'new_blog'])->name('admin.blog.new');
    Route::post('/new-blog', [BlogController::class, 'store_new_blog']);
    Route::get('/blog-edit/{id}', [BlogController::class, 'edit_blog'])->name('admin.blog.edit');
    Route::post('/blog-update/{id}', [BlogController::class, 'update_blog'])->name('admin.blog.update');
    Route::post('/blog-delete/{id}', [BlogController::class, 'delete_blog'])->name('admin.blog.delete');
    Route::get('/blog-category', [BlogController::class, 'category'])->name('admin.blog.category');
    Route::post('/blog-category', [BlogController::class, 'new_category']);
    Route::post('/delete-blog-category/{id}', [BlogController::class, 'delete_category'])->name('admin.blog.category.delete');
    Route::post('/update-blog-category', [BlogController::class, 'update_category'])->name('admin.blog.category.update');
    Route::post('/blog-lang-by-cat', [BlogController::class, 'Language_by_slug'])->name('admin.blog.lang.cat');


    ///////////////////////////////////////////
    //               sign_up
    ///////////////////////////////////////////
    Route::get('/sign_up', [sign_upController::class, 'index'])->name('admin.sign_up');
    Route::get('/sign_up-edit/{id}', [sign_upController::class, 'edit_blog'])->name('admin.sign_up.edit');
    Route::post('/sign_up-update/{id}', [sign_upController::class, 'update_blog'])->name('admin.sign_up.update');
    Route::post('/sign_up-delete/{id}', [sign_upController::class, 'delete_blog'])->name('admin.sign_up.delete');

    ///////////////////////////////////////////
    //               commentController
    ///////////////////////////////////////////
    Route::get('/comment', [commentController::class, 'index'])->name('admin.comment');
    Route::get('/comment-edit/{id}', [commentController::class, 'edit_blog'])->name('admin.comment.edit');
    Route::post('/comment-update', [commentController::class, 'update_blog'])->name('admin.comment.update');
    Route::post('/comment-delete/{id}', [commentController::class, 'delete_blog'])->name('admin.comment.delete');
    // Route::post('/update-HeaderSlider-category', [HeaderSliderController::class, 'update'])->name('admin.header.update');


    ///////////////////////////////////////////
    //               ContactInfoItemController
    ///////////////////////////////////////////
    Route::get('/ContactInfoItem', [ContactInfoItemController::class, 'index'])->name('admin.ContactInfoItem');
    Route::get('/ContactInfoItem-edit/{id}', [ContactInfoItemController::class, 'edit_blog'])->name('admin.ContactInfoItem.edit');
    Route::post('/ContactInfoItem-update/{id}', [ContactInfoItemController::class, 'update_blog'])->name('admin.ContactInfoItem.update');
    Route::post('/ContactInfoItem-delete/{id}', [ContactInfoItemController::class, 'delete_blog'])->name('admin.ContactInfoItem.delete');

    ///////////////////////////////////////////
    //               ContactInfoItemController
    ///////////////////////////////////////////
    Route::get('/about-category', [AboutPageController::class, 'category'])->name('admin.about.category');
    Route::post('/about-category', [AboutPageController::class, 'new_category']);
    Route::post('/delete-about-category/{id}', [AboutPageController::class, 'delete_category'])->name('admin.about.category.delete');
    Route::post('/update-about-category', [AboutPageController::class, 'update_category'])->name('admin.about.category.update');
    Route::post('/about-lang-by-cat', [AboutPageController::class, 'Language_by_slug'])->name('admin.about.lang.cat');

    ///////////////////////////////////////////
    //               HeaderSliderController
    ///////////////////////////////////////////
    Route::get('/HeaderSlider-category', [HeaderSliderController::class, 'index'])->name('admin.HeaderSlider.category');
    Route::post('/HeaderSlider-category', [HeaderSliderController::class, 'store'])->name('admin.header');
    Route::post('/delete-HeaderSlider-category/{id}', [HeaderSliderController::class, 'delete'])->name('admin.header.delete');
    Route::post('/update-HeaderSlider-category', [HeaderSliderController::class, 'update'])->name('admin.header.update');
    // Route::post('/HeaderSlider-lang-by-cat', [HeaderSliderController::class, 'Language_by_slug'])->name('admin.HeaderSlider.lang.cat');
    ///////////////////////////////////////////
    //     //navbar settings
    ///////////////////////////////////////////
    // Route::get('/navbar-settings',[AdminDashboardController::class, 'navbar_settings'])->name('admin.navbar.settings');
    // Route::post('/navbar-settings',[AdminDashboardController::class, 'update_navbar_settings']);
    Route::get('/blog-page', [AdminDashboardController::class, 'blog_page'])->name('admin.blog.page');
    // Route::POST('/blog-page',[AdminDashboardController::class,'blog_page_update']);
    // Route::get('/counterup',[CounterUpController::class,'index'])->name('admin.counterup');
    // Route::POST('/counterup',[CounterUpController::class, 'store']);
    // Route::post('/update-counterup',[CounterUpController::class, 'update'])->name('admin.counterup.update');
    // Route::post('/delete-counterup/{id}',[CounterUpController::class, 'delete'])->name('admin.counterup.delete');
    // Route::get('/testimonial',[TestimonialController::class, 'index'])->name('admin.testimonial');
    // Route::post('/testimonial',[TestimonialController::class, 'store']);
    // Route::post('/update-testimonial',[TestimonialController::class, 'update'])->name('admin.testimonial.update');
    // Route::post('/delete-testimonial/{id}',[TestimonialController::class, 'delete'])->name('admin.testimonial.delete');

    ///////////////////////////////////////////
    //     //user role management
    ///////////////////////////////////////////
    Route::get('/new-user', [UserRoleManageController::class, 'new_user'])->name('admin.new.user');
    Route::post('/new-user', [UserRoleManageController::class, 'new_user_add']);
    Route::post('/user-update', [UserRoleManageController::class, 'user_update'])->name('admin.user.update');
    Route::post('/user-password-chnage', [UserRoleManageController::class, 'user_password_change'])->name('admin.user.password.change');
    Route::get('/delete-user/{id}', [UserRoleManageController::class, 'new_user_delete'])->name('admin.delete.user');
    Route::get('/all-user', [UserRoleManageController::class, 'all_user'])->name('admin.all.user');
    ///////////////////////////////////////////
    //     //admin settings
    ///////////////////////////////////////////
    Route::get('/settings', [AdminDashboardController::class, 'admin_settings'])->name('admin.profile.settings');
    Route::get('/profile-update', [AdminDashboardController::class, 'admin_profile'])->name('admin.profile.update');
    Route::post('/profile-update', [AdminDashboardController::class, 'admin_profile_update']);
    Route::get('/password-change', [AdminDashboardController::class, 'admin_password'])->name('admin.password.change');
    Route::post('/password-change', [AdminDashboardController::class, 'admin_password_chagne']);
    ///////////////////////////////////////////
    //     //general settings
    ///////////////////////////////////////////
    Route::get('/general-settings/site-identity', [AdminDashboardController::class, 'site_identity'])->name('admin.general.site.identity');
    Route::post('/general-settings/site-identity', [AdminDashboardController::class, 'update_site_identity']);
    Route::get('/general-settings/basic-settings', [AdminDashboardController::class, 'basic_settings'])->name('admin.general.basic.settings');
    Route::post('/general-settings/basic-settings', [AdminDashboardController::class, 'update_basic_settings']);

    Route::get('/general-settings/seo-settings', [AdminDashboardController::class, 'seo_settings'])->name('admin.general.seo.settings');
    Route::post('/general-settings/seo-settings', [AdminDashboardController::class, 'update_seo_settings']);
    Route::get('/general-settings/scripts', [AdminDashboardController::class, 'scripts_settings'])->name('admin.general.scripts.settings');
    Route::post('/general-settings/scripts', [AdminDashboardController::class, 'update_scripts_settings']);

    Route::get('/general-settings/email-template', [AdminDashboardController::class, 'email_template_settings'])->name('admin.general.email.template');
    Route::post('/general-settings/email-template', [AdminDashboardController::class, 'update_email_template_settings']);

    Route::get('/general-settings/typography-settings', [AdminDashboardController::class, 'typography_settings'])->name('admin.general.typography.settings');
    Route::post('/general-settings/typography-settings', [AdminDashboardController::class, 'update_typography_settings']);
    /////////////////////////p//////////////////
    //     //new settings
    ///////////////////////////////////////////
    Route::get('/general-settings/cache-settings', [AdminDashboardController::class, 'cache_settings'])->name('admin.general.cache.settings');
    Route::post('/general-settings/cache-settings', [AdminDashboardController::class, 'update_cache_settings']);
    Route::get('/general-settings/backup-settings', [AdminDashboardController::class, 'backup_settings'])->name('admin.general.backup.settings');
    Route::get('/general-settings/backup-settings/new', [AdminDashboardController::class, 'new_backup_settings'])->name('admin.general.backup.settings.new');

    Route::post('/general-settings/backup-settings/new', [AdminDashboardController::class, 'delete_backup_settings'])->name('admin.general.backup.settings.delete');
    // Route::post('/general-settings/backup-settings',[AdminDashboardController::class, 'update_backup_settings']);
    Route::post('/general-settings/backup-settings/restore', [AdminDashboardController::class, 'restore_backup_settings'])->name('admin.general.backup.settings.restore');
    //   Route::get('/general-settings/update-system',[AdminDashboardController::class, 'update_system'])->name('admin.general.update.system');
    //   Route::post('/general-settings/update-system',[AdminDashboardController::class, 'update_system_version']);
    // Route::get('/general-settings/license-setting',[AdminDashboardController::class, 'license_settings'])->name('admin.general.license.settings');
    //  Route::post('/general-settings/license-setting',[AdminDashboardController::class, 'update_license_settings']);
    // Route::get('/general-settings/custom-css',[AdminDashboardController::class, 'custom_css_settings'])->name('admin.general.custom.css');
    // Route::post('/general-settings/custom-css',[AdminDashboardController::class, 'update_custom_css_settings']);

    ///////////////////////////////////////////
    //     //word
    ///////////////////////////////////////////
    Route::get('/general-settings/edit_words-settings', [AdminDashboardController::class, 'edit_words_settings'])->name('admin.general.edit_words.settings');
    Route::post('/general-settings/edit_words-settings', [AdminDashboardController::class, 'update_edit_words_settings'])->name('admin.languages.words.update');
    ///////////////////////////////////////////
    //     //language
    ///////////////////////////////////////////
    // Route::get('/languages',[LanguageController::class, 'index'])->name('admin.languages');
    // Route::get('/languages/words/edit/{id}',[LanguageController::class, 'edit_words'])->name('admin.languages.words.edit');
    // Route::post('/languages/words/update/{id}',[LanguageController::class, 'update_words'])->name('admin.languages.words.update');
    // Route::post('/languages/new',[LanguageController::class, 'store'])->name('admin.languages.new');
    // Route::post('/languages/update',[LanguageController::class, 'update'])->name('admin.languages.update');
    // Route::post('/languages/delete/{id}',[LanguageController::class, 'delete'])->name('admin.languages.delete');
    // Route::post('/languages/default/{id}',[LanguageController::class, 'make_default'])->name('admin.languages.default');

});
