<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamboo;
use App\Models\Picture;
use DB;
use Illuminate\Support\Facades\Storage;

class BamboosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bamboo = Bamboo::orderBy('sci_name','asc')->get();

        return view('bamboos.index')->with('bamboo', $bamboo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bamboos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sci_name' => 'required',
            'photo' => 'required|image',
            'description' => 'required'
        ]);

        /* shows the filename of the file that is selected for uploading */
        $filenameWithExtension = $request->file ('photo')->getClientOriginalName();

        $filename = pathinfo ($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        /* save the image to the server files */
        $request->file('photo')->storeAs('public/bamboos/' . $request->input('sci_name'), $filenameToStore);

        // $path = $request->file('photo')->storeAs('public/bamboos/' . $request->input('sci_name'), $filenameToStore);
        // dd($path);

        /* save entry to database table */
        $bamboo = new Bamboo();
        $bamboo->sci_name = $request->input('sci_name');
        $bamboo->com_name = $request->input('com_name');
        $bamboo->loc_name = $request->input('loc_name');
        $bamboo->family = $request->input('family');
        $bamboo->genus = $request->input('genus');
        $bamboo->species = $request->input('species');
        $bamboo->auth_name = $request->input('auth_name');
        $bamboo->description = $request->input('description');
        $bamboo->comments = $request->input('comments');
        $bamboo->photo = $filenameToStore;
        $bamboo->size = $request->file('photo')->getSize();
        $bamboo->longitude = $request->input('longitude');
        $bamboo->latitude = $request->input('latitude');
        $bamboo->save();

        /* return view to bamboos index */
        return redirect('/bamboos')->with('success', 'New bamboo specimen created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bamboo = Bamboo::find($id);

        return view('bamboos.show')->with('bamboo', $bamboo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bamboo = Bamboo::find($id);

        return view('bamboos.edit')->with('bamboo', $bamboo);
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
        $this->validate($request, [
            'sci_name' => 'required',
            'description' => 'required'
        ]);

        $bamboo = Bamboo::find($id);
        $bamboo->sci_name = $request->input('sci_name');
        $bamboo->com_name = $request->input('com_name');
        $bamboo->loc_name = $request->input('loc_name');
        $bamboo->family = $request->input('family');
        $bamboo->genus = $request->input('genus');
        $bamboo->species = $request->input('species');
        $bamboo->auth_name = $request->input('auth_name');
        $bamboo->description = $request->input('description');
        $bamboo->comments = $request->input('comments');
        
        
        $bamboo->longitude = $request->input('longitude');
        $bamboo->latitude = $request->input('latitude');

        if($request->hasfile('photo'))
        {
            $filenameWithExtension = $request->file ('photo')->getClientOriginalName();
            $filename = pathinfo ($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/bamboos/' . $bamboo->sci_name, $filenameToStore);
        }

        $bamboo->save();

        return redirect('/bamboos/'.$bamboo->id)->with('bamboo', $bamboo)->with('success', 'Entry updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bamboo = Bamboo::find($id);

        if (Storage::delete('public/bamboos/' . $bamboo->sci_name . '/' . $bamboo->photo )) {
            $bamboo->delete();

            return redirect('/bamboos')->with('success', 'Entry deleted successfully!!');
        } 
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $bamboo = DB::table('bamboos')->where('sci_name', 'LIKE', '%' .$search. '%')
                    ->orWhere ('com_name', 'LIKE', '%' .$search. '%')
                    ->orWhere ('loc_name', 'LIKE', '%' .$search. '%')
                    ->orWhere ('description', 'LIKE', '%' .$search. '%')
                    ->paginate(5);

        return view('bamboos.search')->with("bamboo", $bamboo);
    }
}
