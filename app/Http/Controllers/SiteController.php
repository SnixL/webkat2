<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SiteController extends Controller
{	
	/**
	* Show the application addwebsite.
	*
	* @return \Illuminate\Http\Response
	*/
    public function readMetadata(Request $request)
    {
        $this->validate($request, [
			'site_url'  		=> 'Required|Between:12,255,Url'
		]);
    }
	
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitelisting()
    {
        $sites = DB::table('sites')->select('id', 'url', 'title', 'description')->get();

		return view('websites', ['sites' => $sites]);
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('addwebsite');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$this->validate($request, [
			'site_url'  		=> 'Required|Between:12,255,Url',
			'site_title'   		=> 'Required|Between:8,255',
			'site_description'	=> 'Required|Between:3,2048',
			'site_keywords'   	=> ''
		]);
		
		$id = DB::table('sites')->insertGetId([
			'url' => $request['site_url'], 
			'title' => $request['site_title'], 
			'description' => $request['site_description'], 
			'keywords' => $request['site_keywords']
		]);
		
		return view('addwebsite', ['lastid' => $id]);
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
    }
}
