<?php
namespace App\Repositories;

use App\Models\Feature;
use App\Models\Grade;

class StaffRepository
{
    protected $gradeRepository;
    
    public function findCertifiedTeachers(){
        $this->gradeRepository = new GradeRepository();
        $grade = $this->gradeRepository->findHighestGrade();
        $certifiedTeachers = null;
        if($grade != null){
            $certifiedTeachers = Grade::findOrFail($grade->id)->staffs()->get();
        }
        return $certifiedTeachers;
    }
    
    public function addData($request){
        $request->validate([
            'description_en' => 'required|max:255',
            'description_fr' => 'required|max:255',
            'description_it' => 'required|max:255',
            'position_en' => 'required|max:255',
            'position_fr' => 'required|max:255',
            'position_it' => 'required|max:255',
        ]);
        $features = Feature::all();
        $feature = null;
        foreach ($features as  $f) {
            if($f->title == $request->feature){
                $feature = $f;
            }
        }
        $grades = Grade::all();
        $grade = null;
        foreach ($grades as  $g) {
            if($g->title == $request->grade){
                $grade = $g;
            }
        }
        $request->merge([
            'feature_id' => $feature->id,
            'grade_id' => $grade->id,
            'description' => ['en'=>$request->description_en,'fr'=>$request->description_fr,'it'=>$request->description_it,],
            'position' => ['en'=>$request->position_en,'fr'=>$request->position_fr,'it'=>$request->position_it,]
        ]);
    }
    
    public function saveImage($staff,$request){
        $imageRepository = new ImageRepository();
        $url_path = parse_url($request->image, PHP_URL_PATH);
        $url_segments = explode('/storage', $url_path);
        $url = $url_segments[1];
        $imageRepository->store(null,$url,null,null,null,null,$staff,null);
    }
    public function updateImage($request){
        $imageRepository = new ImageRepository();
        $url_path = parse_url($request->image, PHP_URL_PATH);
        $url_segments = explode("/storage", $url_path);
        $url = $url_segments[1];
        $imageId = $request->imageId;
        $imageRepository->update($imageId,null,$url);
    }
    public function getRelationShipData(){
        $features = Feature::all()->pluck('title', 'id');
        $grades = Grade::all()->pluck('title', 'id');
        return compact(['features','grades']);
    }
}