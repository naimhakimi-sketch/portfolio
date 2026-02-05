<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Work;
use App\Models\Certification;
use App\Models\Skill;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $about = About::first();
        $educations = Education::all();
        $works = Work::all();
        $certifications = Certification::all();
        $skills = Skill::all();
        $projects = Project::all();

        return view('portfolio.index', [
            'about' => $about,
            'educations' => $educations,
            'works' => $works,
            'certifications' => $certifications,
            'skills' => $skills,
            'projects' => $projects,
        ]);
    }
}
