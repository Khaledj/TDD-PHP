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
        //$project = Project::select("*")->where("id",$id)->get();
        //return view('detailproject',['detailproject' => $user]);
        $project=Project::find($id);
        $user = $project->user->find($project->user_id);
        return view('detailproject',compact('user','project'));
    }
    public function create(){
        return view('add');
    }
    public function store(Request $request) {
        $project = new Project(); // création d'une vente //
        $project->projectName = $request->input('projectName');
        $project->descriptive = $request->input('descriptive');
        $project->user_id = Auth::user()->id;
        $project->save(); //je sauvegarde une nouvelle vente*/
        return redirect('/project');
    }
}