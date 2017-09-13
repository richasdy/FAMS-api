<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LocationModel as Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		    $location = Location::all();
		    return $location;
    }

    public function indexPaginate($page)
    {
        //
		    //$location = Location::orderBy('created_at')->paginate($page);
        try{
          $location = Location::with([
            'gedung' => function ($query){
              $query->select('id','name');
            }
          ])->orderBy('created_at','DESC')
          ->paginate($page);
        }catch(\Exception $e){
          return array(
            'status' => 'error',
            'message'=> $e
          );
        }

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
      try{
        $last_id = Location::max('id');
        $request['id']=$last_id+1;
        $location = new Location($request->all());
    		$location->save();
      }catch(\Exception $e){
        return array(
          'status' => 'error',
          'message'=> $e
        );
      }
      return array(
        'status' => 'success',
        'message'=> $location
      );
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
      try{
        $location = Location::where('id',$id)->first();
      }catch(\Exception $e){
        return array(
          'status' => 'error',
          'message'=> $e
        );
      }
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
      try{
        $location = Location::where('id',$id)->first();
        $location->update($request->all());
      }catch(\Exception $e){
        return array(
          'status' => 'error',
          'message'=> $e
        );
      }
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
      try{
        $location = $this->show($id);
        $location->delete();
      }catch(\Error $e){
        return array(
          'status' => 'error',
          'message'=> $e
        );
      }

        return array(
          'status' => 'success',
          'message'=> 'success delete '.$id
        );
    }
}
