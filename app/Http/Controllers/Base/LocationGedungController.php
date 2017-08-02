<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LocationGedungModel as Gedung;

class LocationGedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		    $location = Gedung::all();
		    return $location;
    }

    public function indexPaginate($page)
    {
        //
		    $location = Gedung::orderBy('created_at')->paginate($page);
		    return $location;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $last_id = Gedung::max('id');
        $request['id']=$last_id+1;
        $location = new Gedung($request->all());
    		$location->save();
    		return $location;
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
        $location = Gedung::where('id',$id)->first();
        return $location;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $location = Gedung::where('id',$id)->first();
        $location->update($request->all());
        return $location;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $location = $this->show($id);
        $location->delete();
        return array(
          'status' => 'OK',
        );
    }
}
