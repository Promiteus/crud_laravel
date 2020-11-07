<?php

namespace App\Http\Controllers\Crud;

use App\Crud\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['persons'] = Person::orderBy('id','desc')->paginate(10);
        return view('person.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required'
        ]);

        Person::create($request->all());
        return redirect()->to('persons')->with('success','Человек добавлен!');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['person_data'] = Person::where(["id" => $id])->first();
        return view('person.edit', $data);
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
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required'
        ]);

        $update = [
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'age' => $request->input('age')
        ];

        Person::where('id',$id)->update($update);
        return redirect()->to("persons")->with('success','Параметры описания изменены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::where('id', $id)->delete();
        return redirect()->to('persons')->with('success','Человек был удален');
    }
}
