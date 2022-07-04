<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ArtistController extends Controller
{

    public function index()
    {
        $artist = Artist::all();
        if (request()->ajax()) {

            return DataTables::of($artist)->addColumn('action', function ($data) {
                $button = '<a href="artist/edit/'.$data->id_artist.' " data-toggle="tooltip"  data-id="' . $data->id_artist . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="artist/delete/'.$data->id_artist.'" name="delete" id="' . $data->id_artist . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };

        return view('admin.dashboard.artist.artist-index');
    }



    public function create()
    {
        return view('admin.dashboard.artist.artist-create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $artistCreate =  Artist::create($request->all());
        if (!$artistCreate) {
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
