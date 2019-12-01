<?php namespace App\Controllers;

use App\Models\BabyNamesModel;

class BabyNames extends BaseController
{
	public function index()
	{
		$model = new BabyNamesModel();

		$builder = $model->builder();
		$result = $model->getAllNames($builder);

		$data = [
			'title' => 'Baby Names List',
			'babynames' => $result,
		];

		echo view('templates/header');		
		echo view('babynames/content',$data);		
		echo view('templates/footer');		
	}


}
