<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArtistController extends Controller
{

    public function index()
    {
        $artist = Artist::all();
        return view('admin.dashboard.artist.artist-index', compact('artist'));
    }

    public function create()
    {
        return view('admin.dashboard.artist.artist-create');
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $artistCreate =  Artist::create($request->all());
        if(!$artistCreate) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('artist.index');
        } else {
            Alert::success('Success', 'New Artist data has been aded');
            return redirect()->route('artist.index');

        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('admin.dashboard.artist.artist-edit', compact('artist'));
    }


    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);

        $artist->update($request->all());

        return redirect()->route('artist.index')->with('success', 'Artist telah diperbarui');
    }


    public function destroy($id)
    {
        $artist = Artist::where('id_artist', $id)->first();
        if ($artist != null) {
            $artist->delete();
            return redirect()->route('artist.index')->with(['message' => 'Successfully deleted!!']);
        }
        return redirect()->refresh();
    }
}
