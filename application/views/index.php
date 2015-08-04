<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Posts</title>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
    $(document).ready(function(){
       	
       	 $.get('/tables/index_html', function(res) {
        
          $('#results').html(res);

        });
      	 
         $(document).on('keyup', '#search', function(){
         		
        		 $.post('/tables/search', $(this).serialize(), function(res) {
			            $('#results').html(res);
			          	});
			          
			          return false;
				});

        $(document).on('change', '#from', function(){
         		
        		 $.post('/tables/dates', $(this).serialize(), function(res) {
			            $('#results').html(res);
			          });
			          
			          return false;
			 	});

        $(document).on('change', '#to', function(){
         		
        		 $.post('/tables/dates', $(this).serialize(), function(res) {
			            $('#results').html(res);
			          });
			          
			          return false;
			 	});
    	
	   });

    </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/stylesheets/style.css">
</head>

<body>
	<div id="wrapper">
	
		<form class="form-inline" action="/tables/get_leads" method="post">
			<div class="form-group">
				<label for="name">Name: </label>
				<input type="text" name="first_name" id="search">
			</div>
	
		<div class="form-group">
			From: <input name="from" type="date" id="from" >
		</div>
		<div class="form-group">
			To: <input name="to" type="date" id="to">
		</div>
			<input type="submit" value="Search">
		</form>
		<div id="results"></div>
	</div>
</body>
</html>