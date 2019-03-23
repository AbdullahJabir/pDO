<?php
      include 'Session.php';
      include 'Database.php';

      $db=new Database();      //Database object
        Session::inti();  
      $table="tbl_student";   //Table name

      if(isset($_REQUEST['action'])&& !empty($_REQUEST['action']))
      {
      	if($_REQUEST['action']=='add')
      	{
      		  $studentData= array(
      		  	'name' => $_POST['name'],
      		  	'email'=> $_POST['email'],
      		  	'phone'=> $_POST['phone']
      		  ); 
      		  $insert= $db->insert($table,$studentData);

      		  if($insert)
      		  {
      		  	$msg="Data inserted Successfully";
      		  }
      		  else
      		  {
      		  	$msg="Data not inserted ! ";
      		  }
      		  Session::set('msg',$msg);
      		  $home_url='../index.php';
      		  header('Location:'.$home_url);//we can use JS here also
      	}
      }

?>