<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CollageInfo;
use App\Models\GeneralQuestion;
use App\Models\ImportantWebsite;
use App\Models\LibrarySection;
use App\Models\Notification;
use App\Models\StudyYear;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function getStudyYears(){
        $data = [];


                $data = StudyYear::all(["id","name"]);

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getYears(){
        $data = [];


                $data = Year::all(["id","name"]);

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getSubjects(){
        $data = [];


                $data = Subject::all(["id","name"]);

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getGeneralQuestion(){
        $data = [];


                $data = GeneralQuestion::paginate(20);

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getImportantWebsites(){
        $data = [];


                $data = ImportantWebsite::all();

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getCollageInfo(){
        $data = [];


                $data = CollageInfo::all();

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getLibrarySections(){
        $data = [];


                $data = LibrarySection::all();

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getLibraryMaterials(){
        $data = [];


                $data = LibarayMaterial::all();

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
    public function getNotifications(){
        $data = [];


                $data = Notification::paginate(20);

        if(count($data) > 0){
            return response()->json(["status"=>400,"data"=>$data,"message"=>"تم جلب البيانات"]);


        } // end ! is null.
        else{
            return response()->json(["status"=>404,"message"=>"لايوجد شئ مضاف","data"=>null]);

        } // end else for ! is null.
    }
}
