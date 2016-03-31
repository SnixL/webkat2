<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class SiteController extends Controller
{	
	/**
	* Show the application addwebsite.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
    public function readMetadata(Request $request)
    {
        $this->validate($request, [
			'site_url'  		=> 'Required|Between:12,255,Url'
		]);
		
		$host = $request['site_url']; 
		$base_url = parse_url($request['site_url']); 
		$base_url = $base_url['scheme'].'://'.$base_url['host'].'/'; 
		
		if(!(@$filestring = file_get_contents($host))) { 
			$sitemeta['meta_info'] = 'ERROR: URL NOT VALID OR OFFLINE'; 
			
		} else {
			
			$sitemeta['meta_url'] = $host;
		
			preg_match('/<title>(.*)<\/title>/U', $filestring, $title);
	
			$sitemeta['meta_title'] = utf8_decode(trim($title['1']));
	
			$metatags = get_meta_tags($host);
			$sitemeta['meta_description'] = utf8_decode(trim($metatags['description']));
			$sitemeta['meta_keywords'] = utf8_decode(trim($metatags['keywords']));
			$sitemeta['meta_info'] = 'OK: VALID URL'; 
			
		}
		return $sitemeta;
    }
	
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitelisting()
    {
        $sites = DB::table('sites')->select('id', 'url', 'title', 'description')->paginate(5);

		return view('websites', ['sites' => $sites]);
    }
	
	/**
     * Display a listing of the resource from Auth-Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function mysites()
    {
		if(Auth::guest()) {

		} else {
			$sites = DB::table('sites')->select('id', 'url', 'title', 'description')->where('user_id', '=', Auth::user()->id)->paginate(5);
	
			return view('mysites', ['sites' => $sites]);
		}
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catsites($category)
    {
        $sites = DB::table('sites')->select('id', 'url', 'title', 'description')->where('user_id', '=', Auth::user()->id)->paginate(5);

		return view('mywebsites', ['sites' => $sites]);
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
	 * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	
		if(isset($request['load_meta'])){
			
			$site_meta = $this->readMetadata($request);

			return view('addwebsite', ['metadata' => $site_meta]);
		}
	
		if(isset($request['addsitenow'])){
			
			$this->validate($request, [
				'site_url'  		=> 'Required|Between:12,255,Url',
				'site_title'   		=> 'Required|Between:8,255',
				'site_description'	=> 'Required|Between:3,2048'
			]);
			
			/**
			 * User-ID für den Eintrag in sites ermitteln
			 */
			if(Auth::guest()) {
				$uid = 0;
			} else {
				$uid = Auth::user()->id;
			}
			
			$id = DB::table('sites')->insertGetId([
				'url' => $request['site_url'], 
				'title' => $request['site_title'], 
				'description' => $request['site_description'], 
				'keywords' => $request['site_keywords'], 
				'user_id' => $uid
			]);
			
			return view('addwebsite', ['lastid' => $id]);
		}
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
