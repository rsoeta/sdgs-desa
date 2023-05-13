<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function page()
	{
		$data = [
			'title' => 'Login Page'
		];
		return view('page/index', $data);
	}
}
