<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradesController extends Controller
{
    public function ViewGrades(){
        $data['Grades']= Grade::all();
        return view('backend.grades.view_grades',$data);
    }


public function AddGrades(){
    //dd('add grades');

    return view('backend.grades.add_grades');


}

public function StoreGrades(Request $request){

if(Grade::where('Name->ar',$request->Name_ar)->orWhere('Name->en',$request->Name_en)->exists()){
    return redirect()->back()->withErrors(trans('Grades_trans.exists'));
}

try{
//dd('store');
$validatedData = $request->validate([
   /*
    'Name_ar' => 'required|unique:grades,Name',
    'Name_en' => 'required|unique:grades,Name',
    

    'Name_ar' => 'required|unique:grades,name->ar,'.$this->id,
    'Name_en' => 'required|unique:grades,name->en,'.$this->id,
    */
]);

$data = new Grade();
$data->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];

$data->save();
/*
$notification = array(
    'message' => 'Grades Inserted Successfully',
    'alert-type' => 'success'
);
*/
toastr()->success(trans('messages.success'));
return redirect()->route('grades.view');


}
catch(\Exception $e){
return  redirect()->back()->withErrors($e)->getMessage();

}

}

public function EditGrades($id){
    //dd('edit grades');
    $editGrades= Grade::find($id);
    return view('backend.grades.edit_grades', compact('editGrades'));

}

public function UpdateGrades(Request $request, $id){
   
    //$data= Grade::find($id);
    $data = Grade::findOrFail($request->id);
    $data->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
    $data->save();
    toastr()->success(trans('messages.Update'));
        return redirect()->route('grades.view');
    


}

public function DeleteGrades($id){

   // dd('delete gardes');

   $data=Grade::find($id);
   $data->delete();

   toastr()->success(trans('messages.Delete'));
   return redirect()->route('grades.view');
}

}
