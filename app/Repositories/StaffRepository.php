<?php
namespace App\Repositories;

use App\Models\Feature;
use App\Models\Follow;
use App\Models\Grade;

class StaffRepository
{
    protected $gradeRepository;
    public $imageRepository;
    public $featureRepository;
    
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
        $this->featureRepository = new FeatureRepository();
    }
    public function findCertifiedTeachers(){
        $this->gradeRepository = new GradeRepository();
        $grade = $this->gradeRepository->findHighestGrade();
        $feature = $this->featureRepository->getFeature('Teachers');
        $certifiedTeachers = null;
        if($grade != null){
            $certifiedTeachers = Grade::findOrFail($grade->id)->staffs()->where('feature_id',$feature->id)->limit(4)->get();
        }
        return $certifiedTeachers;
    }
    
    public function addData($request){
        $request->validate([
            'image' => ['required', 'string', 'max:255'],
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
        $this->imageRepository->store($request,null,null,null,null,$staff,null);
    }
    public function saveRelationShipData($staff,$request){
        $follows_id = $request->follows;
        $staff->follows()->sync($follows_id);
    } 
    public function updateImage($request){
        $this->imageRepository->update($request);
    }
    public function getRelationShipData(){
        $features = Feature::all()->pluck('title', 'id');
        $grades = Grade::all()->pluck('title', 'id');
        $follows = Follow::all()->pluck('title', 'id');
        return compact(['features','grades','follows']);
    }
}