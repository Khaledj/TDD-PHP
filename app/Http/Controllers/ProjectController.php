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
        $projects = Project::select("projectName")->get();
        return view('project',['projects'=>$projects]);
    }
}