<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index(){
        return Student::all();
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required | string',
            'age'=>'required | integer',
            'gender'=>'required | string',
        ]);
        $student = Student::create($request->all());
        return response()->json($student,201);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'sometimes|required | string',
            'age'=>'sometimes|required | integer',
            'gender'=>'sometimes|required | string',
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return response()->json($student,200);
    }

    public function destroy($id){
        $student= Student::findOrFail($id);
        $student->delete();
        return response()->json(null,204);
    }
}
