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

	public function add()
	{
		$validation = \Config\Services::validation();
		$request = \Config\Services::request();		

		// determine if POST request
		// if yes 
		//	 a. validate data
		//	 b. save data to database
		//	 
		// if no display empty form

		if( $_SERVER["REQUEST_METHOD"] == "POST")
		{
			if( $this->validate([
				'name' => 'required',
				'meaning' => 'required|min_length[3]|max_length[255]',
				'origin' => 'required',
				'gender' => 'required',
			]))
			{
				$newName = [

					'name' => $request->getPost('name'),
					'meaning' => $request->getPost('meaning'),
					'gender' => $request->getPost('gender'),
					'origin' => $request->getPost('origin'),
				];

				// echo "goes here";
				// print_r($newname);

				$dbConnect = new BabyNamesModel();

				try {
					$result = $dbConnect->insert($newName);
				} catch (\Exception $e) {
					die($e->getMessage());
				}

				return redirect()->to(site_url());

			}

		}
		$data = [
			'title' => 'Add new Baby name',
			'errors' => $validation->getErrors(),
		];
		echo view('templates/header');		
		echo view('babynames/add',$data);		
		echo view('templates/footer');		
	}


}
