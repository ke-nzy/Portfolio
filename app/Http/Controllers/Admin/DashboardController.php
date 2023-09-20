<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Feedback;
use App\Models\SkillItem;
use Illuminate\Http\Request;
use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $blogCount = Blog::count();
        $skillCount = SkillItem::count();
        $portfolioCount = PortfolioItem::count();
        $feedbackCount = Feedback::count();
        return view('admin.dashboard', compact('blogCount', 'skillCount', 'portfolioCount', 'feedbackCount'));
    }
}
