<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\ContactMail;
use App\Models\Hero;
use App\Models\About;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\ContactSectionSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
use App\Models\PortfolioItem;
use App\Models\SkillSectionSetting;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() 
    {
        // Fist()is a method used when the database has only one record and all() is for when it has a lot of content
        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $porfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skill = SkillSectionSetting::first();
        $skillItem = SkillItem::all();
        $experience = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackInfo = FeedbackSectionSetting::first();
        $blogs = Blog::latest()->take(5)->get(); // grabbing the latest five blogs in the database
        $blogTitle = BlogSectionSetting::first(); 
        $contactTitle = ContactSectionSetting::first();
        return view('frontend.home', 
            compact(
                'hero', 
                'typerTitles', 
                'services', 
                'about', 
                'porfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'skill',
                'skillItem',
                'experience',
                'feedbacks',
                'feedbackInfo',
                'blogs',
                'blogTitle',
                'contactTitle'
            ));
    }

    public function showPortfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function showBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $previousPost = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog', compact('blogs'));
    }

    public function contact(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'subject' => ['required', 'max:300'],
            'message' => ['required', 'max:2000']
        ]);

        Mail::send(new ContactMail($request->all()));

        return response(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }
}
