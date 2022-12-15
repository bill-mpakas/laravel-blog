<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello</h1>
<p>This is a template file</p>
<p>A great number is {{ date('Y') }}</p>
<ul>

    @foreach($allAnimals as $animal)
        <li>{{ $animal }}</li>
    @endforeach
</ul>
<h3>{{ $name }}</h3>
</body>
</html>
