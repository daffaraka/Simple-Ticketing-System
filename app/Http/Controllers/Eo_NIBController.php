<?php

namespace App\Http\Controllers;

use App\Models\NIB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class Eo_NIBController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $nib = NIB::where('id_user', $user)->first();



        return view('EO.NIB.NIB-index', compact('nib'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('nib_pict');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "NIB";


        //uploaded file
        $file->move($location, $user->name . '-' . $filename);

        $NIBAttribute = [];
        $NIBAttribute['id_user'] = $user->id;
        $NIBAttribute['nib_pict'] = $user->name . '-' . $filename;


        $NIBAttribute =  NIB::create($NIBAttribute);

        if (!$NIBAttribute) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('eo.nib.index');
        } else {
            Alert::success('Success', 'You has been added new NIB! Congratulations');
            return redirect()->route('eo.nib.index');
        }
    }

    public function edit($id)
    {
        $nib = NIB::find($id);

        return view('EO.NIB.NIB-edit', compact('nib'));
    }
    public function update($id, Request $request)
    {
        $user = Auth::user();
        $NIB = NIB::find($id);


        $file = $request->file('nib_pict');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "NIB";
        //uploaded file
        $file->move($location, $user->name . '-' . $filename);

        $NIBAttribute = [];
        $NIBAttribute['nib_pict'] = $user->name.'-'. $filename;

       
        if (File::exists('NIB/' . $NIB->nib_pict)) {
            File::delete('NIB/' . $NIB->nib_pict);

            $NIB->update(
                [
               'nib_pict' => $NIBAttribute['nib_pict']]);
    
            if ($NIB) {
                Alert::success('Success', 'Data has updated');
                return redirect()->route('eo.nib.index');
            } else {
                Alert::error('Error', 'Something wrong');
                return redirect()->back('eo.nib.index');
            }
        };
    }
    public function destroy()
    {

        $user = Auth::user();
        $NIB = NIB::where('id_user', $user->id)->first();


        if (File::exists('NIB/' . $NIB->nib_pict)) {
            File::delete('NIB/' . $NIB->nib_pict);
            $NIBDelete =  $NIB->delete();
            if (!$NIBDelete) {
                Alert::success('Success', 'Data has beend deleted');
                return redirect()->route('eo.nib.index');
            } else {
                Alert::error('Error', 'Something wrong');
                return redirect()->route('eo.nib.index');
            }
        } else {
            $NIBDelete =  $NIB->delete();
            if (!$NIBDelete) {
                Alert::error('Error', 'Something wrong');
                return redirect()->route('eo.nib.index');
            } else {
                Alert::success('Success', 'Data has beend deleted');
                return redirect()->route('eo.nib.index');
               
            }
        };
    }
}
