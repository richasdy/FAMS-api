<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TypeDetailModel as TypeDetail;

class TypeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    		$type = TypeDetail::all();
    		return $type;
    }

    public function indexPaginate($page)
    {
      //$type = TypeDetail::orderBy('created_at')->paginate($page);
      try{
        $type = TypeDetail::with([
          'TypeParent' => function ($query){
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
      return $type;
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
        $last_id = TypeDetail::where('id','like',$request->id_asset_type.'%')->max('id');
        $request['id']=$last_id+1;
        $type = new TypeDetail($request->all());
        $type->save();
      }catch(\Error $e){
          return array(
            'status' => 'error',
            'message'=> $e
          );
        }
        return array(
          'status' => 'success',
          'message'=> $type
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
      $type = TypeDetail::where('id',$id)->first();
      return $type;
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
        try{
          $type = TypeDetail::where('id',$id)->first();
          $type->update($request->all());
        }catch(\Error $e){
          return array(
            'status' => 'error',
            'message'=> $e
          );
        }
        return $type;
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
          $type = $this->show($id);
          $type->delete();
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
