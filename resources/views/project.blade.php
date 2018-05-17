
 <!doctype html>

<html lang="en">

 {{--Created by PhpStorm.--}}
 {{--User: khaled.djhehiche--}}
 {{--Date: 17/05/2018--}}
 {{--Time: 11:20--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projets</title>

</head>
<body>
<h1> Liste des projets </h1>
@foreach ($projects as $project)
    <ul>
        <li> {{$project->projectName}}</li>
    </ul>
    @endforeach
</body>
</html>

