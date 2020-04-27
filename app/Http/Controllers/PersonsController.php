<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Person;

class PersonsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $persons = Person::orderBy('lname', 'asc')->orderBy('fname'  , 'asc')->paginate(20);
        $data = array(
            'persons' => $persons,
            'search' => false
        );
        return view('persons.index')->with($data);
    }

    public function search(Request $request)
    {   
        $field = $request->field;
        $keyword = $request->keyword;
        $orderBy = $request->orderBy;
        $persons = Person::where($field, 'like', "%{$keyword}%")->orderBy($field, $orderBy)->paginate(20);
        $data = array(
            'persons' => $persons,
            'search' => true,
            'keyword' => $keyword,
            'orderBy' => Person::getFieldName($orderBy),
            'field' => Person::getFieldName($field)
        );
        return view('persons.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => ['required','regex:/^[a-zA-Z\s]*$/'],
            'mname' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'lname' => ['required','regex:/^[a-zA-Z\s]*$/'],
            'nname' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'bday' => ['required'],
            'cstatus' => ['required'],
            'lstatus' => ['required'],
            'occupation' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'mobnum' => ['required','numeric'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=100,min_height=100'],
        ]);

        $bday = Person::dateInputToDb($request->bday);
        $person = new Person;
        $person->fname = strtolower($request->input('fname'));
        $person->mname = strtolower($request->input('mname'));
        $person->lname = strtolower($request->input('lname'));
        $person->bday = $bday;
        $person->cstatus = $request->input('cstatus');
        $person->nname = strtolower($request->input('nname'));
        $person->occupation = strtolower($request->input('occupation'));
        $person->mobnum = $request->input('mobnum');
        $person->lstatus = $request->input('lstatus');
        
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('uploads', $imageName );
            $person->photo = $imageName ;
        };

        $person->save();

        return redirect('/persons')->with('success', 'New person successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        $data = array(
            'person' => $person,
            'cstatus' => Person::civilStatus($person->cstatus),
            'age' => Person::getAge($person->bday)
        );
        
        return view('persons.detail')->with($data);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);

        $data = array(
            'person' => $person,
            'cstatus' => Person::civilStatus($person->cstatus)
        );

        return view('persons.edit')->with($data);

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
        $validatedData = $request->validate([
            'fname' => ['required','regex:/^[a-zA-Z\s]*$/'],
            'mname' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'lname' => ['required','regex:/^[a-zA-Z\s]*$/'],
            'nname' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'bday' => ['required'],
            'cstatus' => ['required'],
            'lstatus' => ['required'],
            'occupation' => ['nullable','regex:/^[a-zA-Z\s]*$/'],
            'mobnum' => ['required','numeric'],
            'photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','dimensions:min_width=100,min_height=100'],
        ]);

        $bday = Person::dateInputToDb($request->bday);
        $person = Person::find($id);
        $person->fname = strtolower($request->input('fname'));
        $person->mname = strtolower($request->input('mname'));
        $person->lname = strtolower($request->input('lname'));
        $person->bday = $bday;
        $person->cstatus = $request->input('cstatus');
        $person->nname = strtolower($request->input('nname'));
        $person->occupation = strtolower($request->input('occupation'));
        $person->mobnum = $request->input('mobnum');
        $person->lstatus = $request->input('lstatus');
        
        if ($request->hasFile('photo')) {
            $this->removeImage($person->photo);
            $imagePath = $request->file('photo');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $imagePath->move('uploads', $imageName );   
            $person->photo = $imageName;
        };

        $person->save();

        return redirect('/persons/'.$person->id)->with('success', 'Person successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        
        if ($person->photo !== null) {
            $this->removeImage($person->photo);
        }

        $person->delete();

        return redirect('/persons')->with('success', 'Person successfully deleted.');
    }

    /**
     * Delete image from the storage folder. Return void.
     */
    public function removeImage($filename) 
    {  
        $fileSys = new Filesystem();

        if($fileSys->exists(public_path('uploads/'.$filename))){
            $fileSys->delete(public_path('uploads/'.$filename));
        }
    }
}