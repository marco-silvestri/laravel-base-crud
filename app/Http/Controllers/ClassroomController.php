<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
//Call specific validation method through the class Rule
use Illuminate\Validation\Rule; 

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->validationRules());

        $classroomNew = new Classroom();
        //$classroomNew->name = $data['name'];
        //$classroomNew->description = $data['description'];
        //with fillable
        $classroomNew->fill($data);
        $saved = $classroomNew->save();

        // redir
            if ($saved){
                $idClassroomNew = Classroom::find($classroomNew->id);
                return redirect()->route('classrooms.show', $idClassroomNew);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {   
        //Get id, the old way
        //$classroom = Classroom::find($id);
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $data = $request->all();
        //Validate by calling the parameters given by the function
        $request->validate($this->validationRules($classroom->id));

        $classroom->update($data);
        
        return redirect()->route('classrooms.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $refClassroom = $classroom->name;
        $hasDeleted = $classroom->delete();

        //Pass the session data
        if ($hasDeleted){
            return redirect()->route('classrooms.index')->with('deleted', $refClassroom);
        }

    }

    //Utilities

    private function validationRules($id = null){
        return [
            'name' => [
                'required',
                'max:20',
                Rule::unique('classrooms')->ignore($id), //Create a unique record rule, but ignore it if is the one being edited 
            ],
            [
            'description' => 'required|max:255'
            ],
        ];
    }
}
