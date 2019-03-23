          <?php include 'inc/header.php';
                   
                     
          ?>
            <div  class="panel-heading">
         		<h2>Update Student Data<a class="btn btn-success pull-right" href="index.php">Back</a></h2>
         	</div>
            <div class="panel-body">

            	<form action="lib/process_studednt.php" method="post">

            		<div class="form-group">
            			<label for="name">
            				Student Name
            			</label>
            			<input type="text" class="form-control" name="name" id="name" value="Abdullah Jabir" required >

            			
            		</div>

            		<div class="form-group">
            			<label for="email">
            				Student Email
            			</label>
            			<input type="text" class="form-control" name="email" id="email" value="gazicse77@gmail.com" required >

            			
            		</div>
            		<div class="form-group">
            			<label for="phone">
            				Student Phone
            			</label>
            			<input type="text" class="form-control" name="phone" id="phone" value="01731521909" required >

            			
            		</div>
            		<div class="form-group">
            			<input type="hidden" name="id" value="1" >
            			<input type="hidden" name="action" value="edit" >
            			<input type="submit" class="btn btn-primary" name="submit" value="Update Student">

            			
            		</div>
            		
            	</form>

           </div> 	
           <?php include 'inc/footer.php'; ?>