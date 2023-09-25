<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;



use Illuminate\Http\Request;

class StuCon extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'student_name'=>'required',
            'student_email'=>'required|email',
            'student_address'=>'required',
            'student_class'=>'required',
            'student_picture'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $student =new  Student();
        $image = $request->file('student_picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Upload the image to the server
        $imagePath = $request->file('student_picture')->storeAs('images', $imageName,'public');
        $student->Name = $request->student_name;        
        $student->Email = $request->student_email;        
        $student->Address = $request->student_address;        
        $student->Class = $request->student_class;  
        $student->Img_Path = $imagePath;
        $student->save();  
        return redirect('/view-students');
    }

    // display data
    public function viewData() {
        $students = Student::latest()->get();
        return view('admin.view-students',['students'=>$students]);
    }

    public function updateStudent($id) {
        $student = Student::find($id);
        if($student != null ) {
            $page_title = "Update Student";
            $url="/update-student/".$id;
            $btn_title = "Update Student";
            $data = compact('page_title','url','btn_title','student');
            return view('admin.add-student')->with($data);
        }
    }

    public function updateStudentInfo(Request $request, $id) {
        $request->validate([
            'student_name'=>'required',
            'student_email'=>'required|email',
            'student_address'=>'required',
            'student_class'=>'required',
            'student_picture'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $model = Student::find($id);
       
 
        if ($request->hasFile('student_picture')) {
            $img_path = $model->Img_Path;
            $exact_path  = public_path('storage/'.$img_path);
            if(file_exists($exact_path)) {
               
                if(unlink($exact_path)) {

                    $image = $request->file('student_picture');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    // Upload the image to the server
                    $imagePath = $request->file('student_picture')->storeAs('images', $imageName,'public');
                    $model->Name = $request->student_name;        
                    $model->Email = $request->student_email;        
                    $model->Address = $request->student_address;        
                    $model->Class = $request->student_class;  
                    $model->Img_Path = $imagePath;
                    $model->save();  
                    
                }
                
            }    
        }
        else {
                $model->Name = $request->student_name;        
                $model->Email = $request->student_email;        
                $model->Address = $request->student_address;        
                $model->Class = $request->student_class;
                $model->save();  
        }

        return redirect('/view-students');

    }

    public function deleteStudentInfo($id) {
        $student = new Student();
        $del_id = Student::find($id);
        if( $del_id != null) {
            // dele image
            $img_path = $del_id->Img_Path;
            $exact_path = public_path('storage/'.$img_path);
            if(file_exists($exact_path)) {
                unlink($exact_path);
                $del_id->delete();
                return redirect('/view-students');
            }
            else {
                return redirect('/view-students');
            }
        }
    }
    
}