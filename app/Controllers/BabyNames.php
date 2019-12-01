<?php namespace App\Controllers;

class BabyNames extends BaseController
{
	public function index()
	{
		echo view('templates/header');		
		echo view('babynames/content');		
		echo view('templates/footer');		
	}


}
