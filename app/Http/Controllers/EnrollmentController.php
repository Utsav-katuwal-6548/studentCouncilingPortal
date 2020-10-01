<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use Illuminate\Support\Facades\File; 

class EnrollmentController extends Controller
{
    public function getAllEnrollments(){
        $title = 'All Enrollments';
        $enrollments = Enrollment::all();
        return view('admin.enrollment.allEnrollment',compact('title','enrollments'));
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
    
                Enrollment::truncate();
                foreach($importData_arr as $importData){
    
                       
                        $enroll = new Enrollment();
                        $enroll->course_id = $importData[0];
                        $enroll->user_id = $importData[1];
                        $enroll->role = $importData[2];
                        $enroll->role_id = $importData[3];
                        $enroll->section_id = $importData[4];
                        $enroll->status = $importData[5];
                        $enroll->associated_user_id = $importData[6];
                        $enroll->limit_section_privileges = $importData[7];
                        $enroll->save();
                }
    
                File::delete($filepath);
    
      
        return redirect()->action('EnrollmentController@getAllEnrollments');
        }   
}
