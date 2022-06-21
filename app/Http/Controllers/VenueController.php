<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $venue = Venue::all();
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
