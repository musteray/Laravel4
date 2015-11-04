<!DOCTYPE html>
<html>
<head>
	<title>Client Laravel RestFUL CRUD</title>
</head>
<style>

	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Lora);

	/*
		font-family: 'Open Sans', sans-serif;
		font-family: 'Lora', serif;
	*/
	
	table, th, td {
	    border: 1px solid gray;
	    padding: 8px;
	    font-family: 'Open Sans', sans-serif;
	    margin-top: 15px;
	}

	table {
		border-collapse: collapse;
	}

	button, input {
		font-family: 'Open Sans', sans-serif;
		padding: 5px;
	}

</style>
<body>
	<div style="margin-top:80px;margin-left:200px;">
		@yield('content')
	</div>
</body>
</html>