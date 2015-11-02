<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class DriverController extends Controller {

		public function restControl()
		{
			return $this->obtain_thejoson();
		}

		private $special_chars = array( "(",  "!",  "@",  "#", "$", "%", "^", "&", "+", "=", "-",  "_",  "'",  "\"",  "/",  "\\",  "?",  "<",  ">",  ")" );
		private $use_number = 0;
		private $use_spl_chars = 0;

		public function goPassDef($id = null)
		{
			$use_max_words 				= 1;
			$this->$use_number 		= 0;
			$this->$use_spl_chars 	= 0;
			$mypassword_str = $this->getpassword($use_max_words);
			return view('password')->with('password_str', $mypassword_str)->with('use_spl', 0)->with('use_num', 0);
		}

		private function getpassword($use_max_words)
		{
			$mypassword_str = $this->give_me_word_str($use_max_words);
			if($this->$use_spl_chars ==1)
			{
				$mypassword_str = $mypassword_str . $this->give_me_spceial_char($this->$special_chars);
			}
			if($this->$use_number ==1)
			{
				$mypassword_str = $mypassword_str . rand(0, 99);
			}
			return $mypassword_str;
		}

		public function goPassPost(Request $request = null)
		{
			/*
			$this->validate($request, [
	        'passwords' => 'required|min:3',
	    ]);
			*/

			$num_pass 							= $request->input('passwords');
			//if($num_pass > 9) die('User count too high');
			$this->$use_spl_chars 	= isset( $_POST['use_spl_chards'])?1:0;
			$this->$use_number 			= isset( $_POST['use_number'])?1:0;

			$use_max_words 	= ($num_pass)?$num_pass:1;

			$mypassword_str = $this->getpassword($use_max_words);

			return view('password')->with('password_str', $mypassword_str)->with('use_spl', $this->$use_spl_chars)->with('use_num', $this->$use_number);

			}

			private function give_me_word_str($max_password)
			{
				$mypassword_arr = $this->give_me_words($max_password);
				$mypassword_str = "";
				$separator = "-";
				for($i = 0; $i < $max_password;$i++)
				{
					if($i > 0)
					{
						$mypassword_str = $mypassword_str . $separator. $mypassword_arr[$i];
					} else {
						$mypassword_str = $mypassword_arr[$i];
					}
				}
				return $mypassword_str;
			}

			private function give_me_words($max_password)
			{
				$my_list = array("hello", "world");

				$max_size = sizeof($my_list);

				$password = array();
				$faker =\Faker\Factory::create();

				for($i = 0; $i < $max_password;$i++)
				{
					$current= $faker->name;
					array_push($password, $my_list[$current]);
				}
				return $password;
			}

			private function give_me_spceial_char($special_chars_list)
			{

				$max_size = sizeof($special_chars_list);

				$password= rand(0, $max_size);
				return $this->$special_chars_list[$password];
			}
}
