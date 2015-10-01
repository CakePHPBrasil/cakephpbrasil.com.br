<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inclua um link CakePHP!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body class="container">
	<h1>Inclua um link sobre CakePHP!</h1>

	{% for type, messages in session.getFlashBag().all() %}
		{% for message in messages %}
			<div class="alert alert-{{ type }}">{{ message }}</div>
		{% endfor %}
	{% endfor %}

	<form action="{{ app.url_generator.generate('post') }}" method="post">
	    {{ form_widget(form) }}
	    <hr>
	    <input type="submit" name="submit" class="btn btn-success" />
	</form>
</body>
</html>