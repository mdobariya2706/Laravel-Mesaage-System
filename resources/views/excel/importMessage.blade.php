<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action='postImport' method='post' enctype='multipart/form-data'>
		<input type='hidden' name='_token' value='{{csrf_token()}}'>
		<input type='file' name='messages'>
		<input type='submit' value='Import'/>
	</form>
	<a href="{{'home'}}">Back</a>
</body>
</html>