<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DriverController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}



    private function obtain_thejoson()
    {

        $url = 'https://';
        $url .=  base64_decode($this->mysecret);
        $url .= '@stash.micron.com/stash/rest/api/1.0/projects/JEN/repos/test_pr/pull-requests';
        $dump_contents = $this->url_get_contents ($url);
    // var_dump($dump_contents); // string(2560)
        $obj = json_decode($dump_contents,true);
    // var_dump($obj); //json as array
    // var_dump(array_keys($obj)); //json as array
    // var_dump(array_keys($obj)); //print out all keys
    // var_dump(($obj['values'][0]['fromRef']['latestChangeset'])); //json as array
        //return base64_decode($this->mysecret);
        return (($obj['values'][0]['fromRef']['latestChangeset'])); //json as array


        }
        private $mysecret = 'QU1TX0lOVEVHUkFUSU9OOlBpbVJhbTIwMTY=';

    private function shedule_now($sha1)
    {

        $url = 'http://bolamsjtest01:8080/git/notifyCommit?url=https://AMS_INTEGRATION@stash.micron.com/stash/scm/jen/test_pr.git&sha1=';
        $url .=  $sha1;
        $dump_contents = $this->url_get_contents ($url);
    // var_dump($dump_contents);
        return $dump_contents;
     }

	public function takeHome()
	{
//$response = file_get_contents('https://stash.micron.com/stash/rest/api/1.0/projects/JEN/repos/test_pr/pull-requests');
                $json_g =  $this->obtain_thejoson();
                return $this->shedule_now($json_g);
		// return $json_g;
		// return 'Take Home';
	}

	public function bkbuilder($id = null)
	{
			// return $this->takeHome();
			return 'this is bkbuilder';
  }
}
