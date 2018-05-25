{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: khaled.djhehiche--}}
{{--* Date: 24/05/2018--}}
{{--* Time: 14:49--}}
{{--*/--}}
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>

{{--@if(Auth::user()->id == $project->user_id)--}}
    <h1>Modifier un projet : {{$project->projectName}} </h1>
    <form method="post" action="/project/{{$project->id}}">
        {{csrf_field()}}
        {{method_field("PUT")}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        NomProjet : <br>
        <input type="text" name="projectName" placeholder="Ecrire un nom de projet">
        <br>
        Descriptive du projet: <br>
        <input type="text" name="descriptive" placeholder="Ecrire un descriptive de projet">
        <br>
        <input type="submit" value="submit">
    </form>
{{--@else--}}
    {{--<h1>tu n'es pas l'auteur tu ne peux pas modifier le projet</h1>--}}
    <a href = "/project" > <button type="button"> </button></a>
@endif
</body>
</html>