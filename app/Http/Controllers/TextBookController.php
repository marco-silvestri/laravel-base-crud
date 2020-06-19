<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TextBook;
use Illuminate\Validation\Rule;

class TextBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textBooks = TextBook::all();
        return view('textbooks.index',compact('textBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('textbooks.create');
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
        $newTextBook = new TextBook();
        $newTextBook->fill($data);
        $savedState = $newTextBook->save();

        if($savedState){
            $idNewTextBook = TextBook::find($newTextBook->$id);
            return redirect()->route('textbooks.show', $idNewTextBook);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TextBook $textBook)
    {
        return view('textbooks.show' , compact('textBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TextBook $textBook)
    {
        return view('textbooks.edit', compact('textBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TextBook $textBook)
    {
        $data = $request->all();
        $request->validate($this->validationRules($textBook->id));

        $textBook->update($data);
        return redirect()->route('textbooks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TextBook $textBook)
    {
        $oldTextBook = $textBook->title . ' by ' . $textBook->author;
        $hasDeleted = $textBook->delete();
    
        if ($hasDeleted){
            return redirect()->route('textbooks.index')->with('deleted', $oldTextBook);
        }
    }

    public function validationRules($id = null){

        return [
            'title' => ['required','max:100'],
            'author' => ['required','max:100'],
            'topic' => ['required'], //https://laravel.com/docs/7.x/validation
        ];
    }
}
