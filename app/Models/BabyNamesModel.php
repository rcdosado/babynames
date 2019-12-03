<?php namespace App\Models;

use CodeIgniter\Model;

class BabyNamesModel extends Model
{
	protected $table = 'names';
	protected $primaryKey = 'id';
	protected $allowedFields = ['name', 'gender', 'origin', 'meaning'];

	public function search($builder,$query, $field)
	{			

		try{               

			 $builder->like($field, $query);
			 $builder->orderBy("name","asc");

             $result = $builder->paginate(RECORDS_PER_PAGE);
             // echo (string)$db->getLastQuery();

		}catch(\Exception $e){
			die($e->getMessage());
		}

		return $result;

	}	
	
	public function getAllNames($builder)
	{
		try{

			$builder->orderBy("id","desc");
			$result = $builder->paginate(RECORDS_PER_PAGE);

		}catch(\Exception $e)
		{
			die($e->getMessage());
		}
		return $result;

	}
	public function getName($id=null)
	{
		$db = \Config\Database::connect();

		$sql = "SELECT * FROM names WHERE id = :id:";

		try {
			$query = $db->query($sql,[
				'id' => $id
			]);
		} catch (\Exception $e) {
			die($e->getMessage());
		}

		return $query->getResultArray()[0];

	}
}

