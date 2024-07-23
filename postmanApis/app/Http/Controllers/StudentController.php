<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::all();
        if($students->count()>0){
            return  response()->json([
                'status'=>200,
                "students"=>$students
            ],200);
        }
        else{
            return response()->json(["status"=>404,"students"=>"record not found!"],404);
        }
        
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|string',
            'email'=>'required|max:255|email',
            'course'=>'required|max:255|string',
            'phone'=>'required|digits:10',
        ]);
        if($validator->fails()){
            return response()->json(["errors"=>$validator->messages(),"status"=>422],422);
        }
        else{
            $student=Student::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'course'=>$request->course,
                'phone'=>$request->phone,
            ]);
        }
        if($student){
            return response()->json(["message"=>"created sucessfully!","status"=>200],200);
        }
        else{
            return response()->json(["message"=>"something went wrong!","status"=>500],500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student=Student::find($id);
        if($student){
            return response()->json(["student"=>$student,"status"=>200],200);
        }
        else{
            return response()->json(["message"=>"no such student!","status"=>404],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $student=Student::find($id);
        if($student){
            return response()->json(["student"=>$student,"status"=>200],200);
        }
        else{
            return response()->json(["message"=>"no such student!","status"=>404],404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|string',
            'email'=>'required|max:255|email',
            'course'=>'required|max:255|string',
            'phone'=>'required|digits:10',
        ]);
        if($validator->fails()){
            return response()->json(["errors"=>$validator->messages(),"status"=>422],422);
        }
        else{
            $student=Student::find($id);
        
        if($student){
            $student->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'course'=>$request->course,
                'phone'=>$request->phone,
            ]);

            return response()->json(["message"=>"updated sucessfully!","status"=>200],200);
        }
        else{
            return response()->json(["message"=>"not found!" ,"status"=>404],404);
        }

    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $student=Student::find($id);
        if($student){
            $student->delete();
            return response()->json(['message'=>"deletede the record","status"=>200],200);
        }
        else{
            return response()->json(["message"=>"not found!" ,"status"=>404],404);

        }
    }
}
