<!DOCTYPE html>
<html>
<head>
	<title>PDF File</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<h2 class="text-center">{{ Auth::user()->name }}</h2><br><br>
<img src="{{ asset($myfile->image) }}" alt="File Image" class="img-fluid">

</body>
</html>
