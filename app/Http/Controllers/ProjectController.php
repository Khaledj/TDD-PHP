<?php
/**
 * Created by PhpStorm.
 * User: khaled.djhehiche
 * Date: 17/05/2018
 * Time: 16:14
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function listeProject() {
        $projects = Project::select("projectName","id")->get();
        return view('project',['projects'=>$projects]);
    }
    public function detailProject($id)
    {
        //Je selectionne le Nom,Prix en fonction du code de la boisson et je retourne un tableau associatif detailboisson//
        $project = Project::select("*")->where("id",$id)->get();
        return view('detailproject',['detailproject' => $project]);
    }
}