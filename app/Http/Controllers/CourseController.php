<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\File; 


class CourseController extends Controller
{
   public function getAllCourses(){
    $title = 'All Courses';
    $courses = Course::all();

    return view('admin.course.allCourses',compact('title','courses'));
   }

   public function importData(Request $request){
    $file = $request->file('file');

    //fileDetails 
     $filename = $file->getClientOriginalName();
     $extension = $file->getClientOriginalExtension();
     $tempPath = $file->getRealPath();
     $fileSize = $file->getSize();
     $mimeType = $file->getMimeType();

    
 
            $location = 'uploads';

            $file->move($location,$filename);
            $filepath = public_path($location.'/'.$filename);
            $file = fopen($filepath,'r');

            $importData_arr = array();
            $i = 0;

            while(($filedata = fgetcsv($file,1000,",")) !== FALSE){
                $num = count($filedata);

                if($i == 0){
                    $i ++;
                    continue;
                }
                for($c=0;$c<$num; $c++){
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;

            }
            fclose($file);

                Course::truncate();
            foreach($importData_arr as $importData){

                    $course = new Course();
                    $course->course_id =  $importData[0];
                    $course->integration_id =  $importData[1];
                    $course->short_name =  $importData[2];
                    $course->long_name =  $importData[3];
                    $course->account_id =  $importData[4];
                    $course->term_id =  $importData[5];
                    $course->status =  $importData[6];
                    $course->start_date =  $importData[7];
                    $course->end_date =  $importData[8];
                    $course->course_format =  $importData[9];
                    $course->blueprint_course_id =  $importData[10];
                    $course->save();
            }

            File::delete($filepath);

  
    return redirect()->action('CourseController@getAllCourses');
    }   
}
