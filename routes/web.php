<?php

use App\Models\Category;
use App\Models\BlogCategory;
use App\Models\PortfolioItem;
use App\Models\FooterContactInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\FooterHelpLinksController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterUsefulLinksController;
use App\Http\Controllers\Admin\BlogSectionSettingController;
use App\Http\Controllers\Admin\SkillSectionSettingController;
use App\Http\Controllers\Admin\ContactSectionSettingController;
use App\Http\Controllers\Admin\FeedbackSectionSettingController;
use App\Http\Controllers\Admin\PortfolioSectionSettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/main', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {
    return view('frontend.blog');
});

Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Show Portfolio details page based on its assigned id
Route::get('portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');

// Blog details page
Route::get('blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');

// Route for blogs
Route::get('blogs', [HomeController::class, 'blog'])->name('blog');

// Route for the contact form
Route::post('contact', [HomeController::class, 'contact'])->name('contact');


// Sets a predefined route tag as admin when you use the prefix tag
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){ 
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    // Service Route
    Route::resource('service', ServiceController::class);

    // About Route
    Route::get('resume-download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    // Portfolio Route
    Route::resource('category', CategoryController::class);

    // Portfolio Item Route
    Route::resource('portfolio-item', PortfolioItemController::class);

    // Portfolio Section Setting Route
    Route::resource('portfolio-section-setting', PortfolioSectionSettingController
    ::class);

    // Route for the skill section setting
    Route::resource('skill-section-setting', SkillSectionSettingController::class);

    // Route for the skill Items
    Route::resource('skill-item', SkillItemController::class);

    //Route for the experience section
    Route::resource('experience', ExperienceController::class);

    // Feedback route
    Route::resource('feedback', FeedbackController::class);

    // Feedback Section Setting Route
    Route::resource('feedback-section-setting', FeedbackSectionSettingController::class);

    // Blog Category Route
    Route::resource('blog-category', BlogCategoryController::class);

    // Blog section Route
    Route::resource('blog', BlogController::class);

    //Blog Section Setting Route
    Route::resource('blog-section-setting', BlogSectionSettingController::class);

    //Contact Sectiion Setting Route
    Route::resource('contact-section-setting', ContactSectionSettingController::class);

    // Footer Social Route
    Route::resource('footer-social', FooterSocialLinkController::class);

    // Route for Footer Information
    Route::resource('footer-info', FooterInfoController::class);

    // Route for Footer Contact Info
    Route::resource('footer-contact-info', FooterContactInfoController::class);

    // Route for Footer Useful Links
    Route::resource('footer-useful-links', FooterUsefulLinksController::class);

    // Route for Footer Help Links
    Route::resource('footer-help-links', FooterHelpLinksController::class);

    // Route for Settings PPPage
    Route::get('setting', SettingController::class)->name('settings.index');

    // Route for the general setting
    Route::resource('general-setting', GeneralSettingController::class);

    // Route for Seo Setting
    Route::resource('seo-setting', SeoSettingController::class);

});

