<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index() {
        return Student::orderby('id', 'DESC')->with('courses')->get();
    }

    // public function create() {
    //     $student = new Student;
    //     $student->name = 'Mg Mg';
    //     $student->dob = Carbon::now();
    //     $student->email = 'mgmg@gmail.com';
    //     $student->nrc = '12/asdf(n)1212';
    //     $student->save();

    //     $courses = Course::find([1,2,3]);
    //     $student->courses()->attach($courses);

    //     return $student;
    // }

    // public function store(Request $request) {
    //     $student = new Student; 
    //     $student->name = $request->name;
    //     $student->email = $request->email;
    //     $student->nrc = $request->nrc;
    //     $student->dob = $request->dob;
    //     $student->save();

    //     $courses = Course::find($request->input('courses'));
    //     $student->courses()->attach($courses);

    //     return redirect('/');
    // }

    public function store(Request $request) {
        $time = strtotime($request->student['dob']);
        $newformat = date('Y-m-d',$time);

        $student = new Student; 
        $student->name = $request->student['name'];
        $student->email = $request->student['email'];
        $student->nrc = $request->student['nrc'];
        $student->dob = $newformat;
        $student->save();

        $courses = Course::find($request->student['course']);
        $student->courses()->attach($courses);

        return $student;
    }

    public function destory($id) {
        $existingItem = Student::find($id);

        if($existingItem) {
            $existingItem->delete();
            return "Item successfully deleted.";
        }
        return "No item found.";
    }
}
