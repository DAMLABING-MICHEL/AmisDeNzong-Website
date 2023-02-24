<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Testimonial;
use App\Repositories\StaffRepository;
use App\Services\StaffService;
class AboutController extends Controller
{
    protected $staffService;
    public function index()
    {
        $highestGrade = Grade::where('hight_grade', true)->get()->first();
        // $certifiedTeachers = ($highestGrade != null) ? (Grade::findOrFail($highestGrade->id))->staffs()->get():null;
        $this->staffService = new StaffService(new StaffRepository);
        $certifiedTeachers = $this->staffService->getCertifiedTeachers();
        $testimonials = Testimonial::where('status','active')->get();
        return view('front.about', compact([
        'testimonials',
        'certifiedTeachers'
        ]));
    }
}
