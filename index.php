
         <?php 
             include 'inc/header.php';
             include 'lib/Session.php';
             include "lib/Database.php";




         ?>

         <?php
         	Session::inti(); 
         	$msg=Session::get('msg');

         	if (!empty($msg)) {
         		echo '<h2 class="alert alert-info text-center">'.$msg.'</h2>';
         		unset($_SESSION['$msg']);
         	}

         ?>
      

         	<!-- The .panel-default class is used to style the color of the panel. -->
         	<div  class="panel-heading"  >
         		<h2>Student List <a class="btn btn-success pull-right" href="addstudent.php">Add Student</a></h2>
         	</div>
            
            <div class="panel-body">
           <table class="table table-striped">
           	<tr>
           		<th>Serial</th>
           		<th>Name</th>
           		<th>SEmail</th>
           		<th>Phone</th>
           		<th>Action</th>
           	</tr>


<?php

    $db=new Database();      //Database object
    $table="tbl_student";   //Table name
    $order_by = array('order_by' =>'id DESC'); 



    $studentdata=$db->select($table,$order_by);
    if(!empty($studentdata))
     {
     	$i=0;
     	foreach ($studentdata as $data) {
     		$i++;
     	?>
     
           	<tr>
           		<td><?php echo $i ?></td>
           		<td><?php echo $data['name'] ?></td>
           		<td><?php echo $data['email'] ?></td>
           		<td><?php echo $data['phone'] ?></td>
           		<td>
           			<a class="btn btn-default" href="editstudent.php?id=<?php echo $data['id'] ?>">Edit</a> 
           			<a class="btn btn-danger" href="deletestudent.php?id=<?php echo $data['id'] ?>" onclick="Return confim ('Are you sure to Delete ?')">Delete</a>          	
           		</td>
           	</tr>


        <?php } } else{  ?> 
        	           	<tr>
           	          	   <td colspan="5"><h2>No data Found...</h2></td>
           	            </tr>
        <?php }?>  	
           </table>
       </div>

           <?php
            include 'inc/footer.php';
           ?>
         