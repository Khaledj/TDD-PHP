<!doctype html>
<html lang="en">
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: khaled.djhehiche--}}
{{--* Date: 18/05/2018--}}
{{--* Time: 10:08--}}
{{--*/--}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projets</title>

</head>
<body>

{{--@foreach ($detailproject as $project)--}}
    {{--<h1> Projet {{$project->projectName}}  </h1>--}}
        {{--<p>Detail du projet :{{$project->descriptive}} </p>--}}
        {{--<p>Création du projet : {{$project->created_at}}</p>--}}
{{--@endforeach--}}
<h1> Projet : {{$project->projectName}}</h1>
<p> Detail du projet :{{$project->descriptive}} </p>
<p>Création du projet : {{$project->created_at}}</p>
<p> id de l'utilisateur : {{$user->id}}</p>
<p>nom de l'utilisateur : {{$user->name}}</p>
</body>
</html>




