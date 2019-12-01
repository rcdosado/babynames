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

	public function info($id=null)
	{
        $dbConnect= new BabyNamesModel();

		$data = [
				'title' => 'Baby Names',
				'babyname' => $dbConnect->getName($id),
		];	
		echo view('templates/header');
		echo view('babynames/info',$data);
		echo view('templates/footer');		
	}

	public function delete($id=null)
	{
		$dbConnect = new BabyNamesModel();


		if($id==null || empty($id) )
			return redirect()->to(site_url());

		try {
			$dbConnect->delete($id);
		} catch (\Exception $e) {
			die($e->getMessage())		;
		}
		return redirect()->to(site_url());

	}

	public function edit($id=null)
	{
		$dbConnect = new BabyNamesModel();
		$request = \Config\Services::request();
		$validation = \Config\Services::validation();

		$id = $id==null ? $_REQUEST['id'] : $id;

		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			// validate our inputs
			if( $this->validate([
				'id' =>'required',
				'name' => 'required',
				'meaning' => 'required|min_length[3]|max_length[255]',
				'origin' => 'required',
				'gender' => 'required',

			]))
			{
				// get our inputs
				$newName=[
	                'name'=>$request->getPost('name'),
	                'meaning'=>$request->getPost('meaning'),
	                'gender'=>$request->getPost('gender'),
	                'origin'=>$request->getPost('origin'),					
				];

				// save to database
				try {
					$result = $dbConnect->update($request->getPost('id'),$newName);
				} catch (\Exception $e) {
					die($e->getMessage());
				}

				return redirect()->to(site_url());
				// redirect to index page				

			}
		}


		$data = [
			'id' => $id,
			'title' => 'Edit Baby Name',
			'babyname' => $dbConnect->getName($id),
			'errors' => $validation->getErrors(),
		];

		echo view('templates/header');		
		echo view('babynames/edit',$data);
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
