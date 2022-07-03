<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use Session;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designations = DB::table('designation')
                ->orderBy('id','DESC')
                ->get();

        // echo($designations);

        return view('settingsDesignation.index')->with([ 
            'designation' => $designations,
            ]);
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
        //post to database
        $check_Desig = Designation::where('designation','LIKE',$request->input('designation'))
                                  ->get();

        $count = count($check_Desig);

        if($count >= 1){

          Session::flash('repeat','Designation Already Exist');
          return redirect()->route('designation.index');

        }else{

        $desig = new Designation;

        $desig->designation = $request->input('designation');

        $desig->save();

        Session::flash('success','New Designation was Successfully Save');

        return redirect()->route('designation.index');
        }
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
        $desig = Designation::find($id);

        $desig->designation = $request->input('designation');

        $desig->save();

        Session::flash('success','Designation was Successfully Updated');

        return redirect()->route('designation.index');
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
        $desig = Designation::find($id);

        $desig->delete();

        Session::flash('repeat','Designation was Successfully Deleted');
        return redirect()->route('designation.index');
    }
}
