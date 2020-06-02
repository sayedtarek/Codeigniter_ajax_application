<!doctype html>
<html>
	<head>
		<title>Codeigniter assign</title>
    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">    
    <script src="http://demo.expertphp.in/js/jquery.js"></script>  
    
	</head>
 <body>


 			<center>
 				<h1>Ajax Assign</h1>
 				<select id='category'>
					 <option>-- Select category --</option>
					 <?php
					 foreach($categories as $category){
						 echo "<option value='".$category['category']."'>".$category['category']."</option>";
					 }
					 ?>
				</select>

				<!-- sub categories -->
		
				<select id='sub_cat'>
					<option>-- Select Sub Categories --</option>
				</select>
			

				<!-- sub sub -->
		
				<select id='sub_sub'>
					<option>-- Select Sub Of Sub --</option>
				</select>
 				

 			</center>
				 
			

		
			
 
	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type='text/javascript'>
	// baseURL variable
	var baseURL= "<?php echo base_url();?>";

	
 
	$(document).ready(function(){
 
		// City change
		$('#category').change(function(){
			var category = $(this).val();

			// AJAX request
			$.ajax({
				// I am using the serv mode localhost:9000
				// url:'<?=base_url()?>/Base/subCat',   
				url:'/Base/subCat',
				method: 'post',
				data: {category: category},
				dataType: 'json',
				success: function(response){

					// Remove options 
					$('#sub_sub').find('option').not(':first').remove();
					$('#sub_cat').find('option').not(':first').remove();

					// Add options
					$.each(response,function(index,data){
						 $('#sub_cat').append('<option value="'+data['sub_cat']+'">'+data['sub_cat']+'</option>');
					});
				}
		 });
	 });
 
	 // Department change
	 $('#sub_cat').change(function(){
		 var sub_cat = $(this).val();
		 var category = $('#category').val();

		 // AJAX request
		 $.ajax({
		 	// I am using the serv mode localhost:9000
			 // url:'<?=base_url()?>/Base/subSub',
			 url:'/Base/subSub',
			 method: 'post',
			 data: {category:category,sub_cat: sub_cat},
			 dataType: 'json',
			 success: function(response){
 
				 // Remove options
				 $('#sub_sub').find('option').not(':first').remove();

				 // Add options
				 $.each(response,function(index,data){
					 $('#sub_sub').append('<option value="'+data['sub_sub']+'">'+data['sub_sub']+'</option>');
				 });
			 }
		});
	});
 
 });
 </script>
 </body>
</html>
