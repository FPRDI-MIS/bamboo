<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamboo;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PicturesController extends Controller
{
    public function create(int $bambooId)
    {
        $bamboo = Bamboo::find($bambooId);
        return view('pictures.create')->with('bambooId', $bambooId)->with('bamboo', $bamboo);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'picture' => 'required|image'
        ]);

        /* shows the filename of the file that is selected for uploading */
        $filenameWithExtension = $request->file ('picture')->getClientOriginalName();

        $filename = pathinfo ($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('picture')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        /* save the image to the server files */
        $request->file('picture')->storeAs('public/pictures/' . $request->input('bamboo_id'), $filenameToStore);

        // $path = $request->file('photo')->storeAs('public/bamboos/' . $request->input('sci_name'), $filenameToStore);
        // dd($path);

        /* save pictures to database pictures table */
        $picture = new Picture();
        $picture->image = $filenameToStore;
        $picture->bamboo_id = $request->input('bamboo_id');
        
        $picture->save();

        /* return view to bamboos index */
        return redirect('/bamboos/'.$request->input('bamboo_id'))->with('success', 'Photo added successfully!');
    }
}
