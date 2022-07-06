<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class VenueController extends Controller
{
    public function index()
    {
        $i = 1;
        $venue = Venue::all();
        if (request()->ajax()) {

            return DataTables::of($venue)->addColumn('action', function ($data) {
                $button = '<a href="venues/edit/'.$data->id_venue.' " data-toggle="tooltip"  data-id="' . $data->id_venue . '" data-original-title="Edit" class="edit btn btn-sm btn-warning btn-xs edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="detail" id="'.$data->id.'" class="detail btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Detail</button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<a href="venues/delete/'.$data->id_venue.'" name="delete" id="' . $data->id_venue . '" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('admin.dashboard.venue.venue-index',compact('venue'));
    }


    public function create()
    {
        return view('admin.dashboard.venue.venue-create');
    }

    public function store(Request $request)
    {
      
        // request file image banner
        $file = $request->file('venue_pict');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "Venue";

        //uploaded file
        $file->move($location, $request->venue_name.'-'.$filename);

      
        $venueAttribute = [];
        $venueAttribute['venue_name'] = $request->venue_name;
        $venueAttribute['venue_capacity'] = $request->venue_capacity;
        $venueAttribute['venue_location'] = $request->venue_location;
        $venueAttribute['venue_pict'] = $request->venue_name.'-'.$filename;

        Venue::create($venueAttribute);

        if(!$venueAttribute) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('venues.create');
        } else {
            Alert::success('Success', 'New venue has been aded');
            return redirect()->route('venues.index');
        }

        return redirect()->route('venues.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $venue = Venue::find($id);

        return view('admin.dashboard.venue.venue-edit',compact('venue'));
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);

        $venue->update($request->all());
        return redirect()->route('venues.index');
    }

    public function destroy($id)
    {
        $venue = Venue::where('id_venue',$id)->first();
        if ($venue != null) {
            $venue->delete(public_path('Venue',$venue->venue_pict));
            $venue->delete();
            return redirect()->route('venues.index')->with(['message'=> 'Successfully deleted!!']);
        }
        return redirect()->refresh();
    }
}
