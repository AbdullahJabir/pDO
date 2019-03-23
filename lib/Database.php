<?php 
	

	class Database 
	{

		private $hostdb="localhost";
		private $userdb="root";
		private $passdb="";
		private $namedb="db_student";
		private $pdo;
		
		public function __construct()
		{
			if (!isset($this->pdo))
			 {
				try 
				{
					
					$link= new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb,$this->userdb,$this->passdb); 

					$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$link->exec("SET CHARACTER SET utf8");

					$this->pdo=$link;
  

				} 

				catch (PDOException $e) {
					die("Failed to connect with Database".$e->getMessage());
				}
			}

}
            //Read Data

            /*$sql=$this->pdo->prepare("SELECT tableName WHERE id=:id AND email=:email LIMIT 5,2");
            $sql->bindValue(':id',$id);
            $sql->bindValue(':email',$email);
            $sql->execute();

            */
			public function select($table,$data = array())
			{
               $sql= 'SELECT ';
               $sql.=array_key_exists("select", $data)?$data['select']:'*'; 
               $sql.=' FROM '.$table;
               if(array_key_exists("where", $data))
               {  
               	$sql.=' WHERE ';
               	$i=0;
               	foreach ($data['where'] as $key => $value)
               	 {
               		$add=($i>0)?' AND ':'';
               		$sql.="$add"."$key=:$key";
                    $i++;

               	}
               }

               if(array_key_exists("order_by", $data))
               {
               	 $sql.=' ORDER BY '.$data['order_by'];
               }
               
			
            

            if(array_key_exists("start", $data)&&array_key_exists("limit", $data))
            {
            	$sql.=' LIMIT '.$data['start'].','.$data['limit'];
            }
            else if(!array_key_exists("start", $data)&&array_key_exists("limit", $data))
            {
            	$sql.=' LIMIT '.$data['limit'];
            }
             

             $query=$this->pdo->prepare($sql);
            if(array_key_exists("where", $data))
            {
            	foreach ($data['where'] as $key => $value) {
            		$query->bindValue(":key",$value);
            	}
            }
               
               $query->execute();

               if(array_key_exists("return_type", $data))
               {
               	switch($data['return_type'])
               	{
               		case 'count':
               		$value=$query->rowCount();
               		break;
                     
                     case 'single':
               		$value=$query->fetch(PDO::FETCH_ASSOC); 
               		break;
                	
                	default:
                	$value='';
                	break; 
               	}
               }

               else

               {
               	if($query->rowCount()>0)

               	{
               		$value=$query->fetchAll();
               	}
               }


			return !empty($value)?$value:false;

			}


			//Insert Data

/*$sql= "INSERT INTO tablename (name,email Values(:name,:email)";
$query= $this->pdo->prepare($sql);
$query->bindValue(':name',$name);
$query->binndValue(':email',$email);
$query->execute();*/

			public function insert($table,$data)
			{
if(!empty($data)&&is_array($data))
{
	$keys='';
	$values='';

	$keys=implode(',', array_keys($data));
	$values=":".implode(', :', array_keys($data));

	$sql= "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
	$query=$this->pdo->prepare($sql);

	foreach ($data as $key => $values) 
	{
	   $query->bindValue(':key',$values);
	}

/*	$insertData= $query->execute();*/
	if($query->execute())
	{
		$lastID = $this->pdo->lastInsertID();
		return $lastID;
	}
	else{
		return false;
	}


}
			}






			//Update Data
			public function update()
			{

			}

			//Delete Data
			public function delete()
			{

     		}
		
	      }



?>