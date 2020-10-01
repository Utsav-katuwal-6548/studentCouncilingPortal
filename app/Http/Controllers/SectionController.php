<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Illuminate\Support\Facades\File; 

class SectionController extends Controller
{
    public function getAllSections(){
        $title = 'All Sections ';
        $sections = Section::all();
    
        return view('admin.section.allSections',compact('title','sections'));
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
    
                Section::truncate();
                foreach($importData_arr as $importData){
    
                        $section = new Section();
                        $section->section_id = $importData[0];
                        $section->course_id = $importData[1];
                        $section->integration_id = $importData[2];
                        $section->name = $importData[3];
                        $section->status = $importData[4];
                        $section->start_date = $importData[5];
                        $section->end_date = $importData[6];
                        $section->save();
                }
    
                File::delete($filepath);
    
      
        return redirect()->action('SectionController@getAllSections');
        }   
}
