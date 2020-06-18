<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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

        $teacherNew = new Teacher();
        //$teacherNew->name = $data['name'];
        //$teacherNew->surname = $data['surname'];
        //$teacherNew->age = $data['age'];
        //$teacherNew->cv_link = $data['cv_link'];
        //with fillable
        $teacherNew->fill($data);
        $saved = $teacherNew->save();

        // redirect custom view
            if ($saved){
                $idTeacherNew = Teacher::find($teacherNew->id);
                return redirect()->route('teachers.show', $idTeacherNew);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->all();
        $request->validate($this->validationRules($teacher->id));

        $teacher->update($data);
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $oldTeacher = $teacher->name . $teacher->surname;
        $hasDeleted = $teacher->delete();
    
        if ($hasDeleted){
            return redirect()->route('teachers.index')->with('deleted', $oldTeacher);
        }
    }

    public function validationRules($id = null){

        return [
            'name' => ['required','max:20'],
            'surname' => ['required','max:255'],
            'age' => ['required', 'max:65'],
            'cv_link' => ['max:255', Rule::unique('teachers')->ignore($id)]
        ];
    }
}
