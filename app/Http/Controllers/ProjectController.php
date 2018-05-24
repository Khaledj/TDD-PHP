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
use Illuminate\Support\Facades\Auth;



class ProjectController extends Controller
{
    public function listeProject() {
        $projects = Project::select("projectName","id")->get();
        return view('project',['projects'=>$projects]);
    }

    public function detailProject($id)
    {
        $project=Project::find($id);
        $user = $project->user->find($project->user_id);
        return view('detailproject', compact('user','project'));
    }

    public function create(){
        return view('add');
    }

    public function store(Request $request) {
        $project = new Project(); // création d'un projet//
        $project->projectName = $request->input('projectName');
        $project->descriptive = $request->input('descriptive');
        $project->user_id = Auth::user()->id;
        $project->save(); //je sauvegarde un nouveau projet*/
        return redirect('/project');
    }
    public function edit($projectcode) {
        $project = Project::find($projectcode);
        if(Auth::user()->id == $projectcode) {
            return view('modification', compact('project'));
        }else {
            echo "tu n'est pas l'auteur tu ne peux pas modifier le projet";
        }
    }


    public function update(Request $request,$projectcode) {

        $project = Project::find($projectcode);
        $project->projectName= $request->input('projectName');
        $project->descriptive = $request->input('descriptive');
        $project->save();
        return redirect('/project/'.$projectcode);
    }
}