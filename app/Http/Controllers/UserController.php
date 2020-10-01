<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllUsers(){
        $title = 'All Users';
        $users = User::all();
    
        return view('admin.user.allUsers',compact('title','users'));
    
    }

    public function importData(Request $request){
        $file = $request->file('file');

        //fileDetails 
         $filename = $file->getClientOriginalName();
         $extension = $file->getClientOriginalExtension();
         $tempPath = $file->getRealPath();
         $fileSize = $file->getSize();
         $mimeType = $file->getMimeType();

         $valid_extension = array("csv");

         $maxFileSize = 2097152;
        
        if(in_array(strtolower($extension),$valid_extension)){
            if($fileSize <=$maxFileSize){

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

                    User::truncate();
                foreach($importData_arr as $importData){

                        $user = new User();
                        $user->user_id = $importData[0];
                        $user->integration_id = $importData[1];
                        $user->authentication_provider_id = $importData[2];
                        $user->login_id = $importData[3];
                        $user->password = $importData[4];
                        $user->first_name = $importData[5];
                        $user->last_name = $importData[6];
                        $user->full_name = $importData[7];
                        $user->sortable_name = $importData[8];
                        $user->short_name = $importData[9];
                        $user->email = $importData[10];
                        $user->status = $importData[11];
                        $user->save();
                }

                File::delete($filepath);


                $request->session()->flash('message', 'Imported');

            }
        }
        
        return redirect()->action('UserController@getAllUsers');
        }   
}
