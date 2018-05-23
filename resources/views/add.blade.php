
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: khaled.djhehiche--}}
 {{--* Date: 23/05/2018--}}
 {{--* Time: 11:23--}}
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
<h1>Ajouter un projet</h1>
    <form method="post" action="/project">
        {{csrf_field()}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        Nom du projet :<br>
        <b> <input type="text" name="projectName" placeholder="Ecrire un nom de projet"> </b>
        <br>
        Description du projet :<br>
        <b> <input type="text" name="descriptive" placeholder="Ecrire une description"> </b>
        <br>
        {{--Date de création :<br>--}}
        {{--<b> <input type="date" name="created_at" placeholder="Ecrire un nom de projet"> </b>--}}
        {{--<br>--}}
        <input type="submit" value="submit">
    </form>


