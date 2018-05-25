<?php
/**
 * Created by PhpStorm.
 * User: khaled.djhehiche
 * Date: 17/05/2018
 * Time: 13:31
 */

namespace Tests\Feature;

use Tests\TestCase;
use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function testStatus()
    {
        //Lorsqu'on affiche la page /project
        $response = $this->get('/project');
        //Alors le status 200 est validé
        $response->assertStatus(200);
    }

    public function testTitle()
    {
        //Lorsqu'on affiche la page /project
        $response = $this->get('/project');
        //Alors la balise h1 contient le titre Liste des projets
        $response->assertSee("<h1> Liste des projets </h1>");
    }

    public function testTitleProject()
    {
        //Etant donné un projet créé
        $project = factory(Project::class)->create();
        //Lorsqu'on affiche la page /project (liste de projet)
        $response = $this->get('/project');
        //Alors le titre du projet est sur la page liste des projets
        $response->assertSee($project->projectName);
    }

    public function testTitleDetailProject()
    {
        //Etant donné un projet créé
        $project = factory(Project::class)->create();
        //Lorsqu'on affiche la page /project/id (detail du projet)
        $response = $this->get('/project/' . $project->id);
        //Alors le titre du projet est sur la page de detail du projet
        $response->assertSee($project->projectName);
    }

    public function testRelation()
    {
        //Etant donné un projet créé
        $project = factory(Project::class)->create();
        //Lorsqu'on récupére l'auteur du projet crée
        $user = $project->user->find($project->user_id);
        $check = Project::find($user->id)->user->name;
        //Alors le nom de l'auteur et le même que le nom de l'auteur du projet créé
        $this->assertTrue($check == $user->name);
    }

    public function testNameUserDetailProject()
    {
        //Etant donné un projet créé
        $project = factory(Project::class)->create();
        //Lorsqu'on affiche la page /project/id (detail du projet)
        $response = $this->get('/project/'.$project->id);
        //Alors le nom de l'auteur du projet est sur la page de detail du projet
        $response->assertSee($project->user->name);
    }

    public function testAddProjectUser()
    {
        //Etant donné un auteur crée et connecté
        $user = factory(User::class)->create();
        $project = factory(Project::class)->make();
        $this->actingAs($user);
        $this->get('/add')->assertSee("<h1>Ajouter un projet</h1>");
        //Lorsque qu'il remplis le formulaire
        $request = [
            'projectName' => $project->projectName,
            'descriptive' => $project->descriptive,
        ];
        $this->post('/project', $request);
        //Alors son projet est crée
        $response = $this->get('/project');
        $response->assertSee($project->projectName);
    }

    public function testNotShowFormProjectUser()
    {
        $this->expectException(AuthenticationException::class);
        $this->get('/add');
    }

    public function testNotAddProject()
    {
        $this->expectException(AuthenticationException::class);
        $project = factory(Project::class)->make();
        $request = ['projectName' => $project->projectName, 'descriptive' => $project->descriptive];
        $this->post('/project', $request);
    }
//    public function testNotDetailProjectUser()
//    {
//        $project = factory(Project::class)->create();
//        $user = factory(User::class)->create();
//        $this->actingAs($user);
//        $response = $this->get('/project/' . $project->id . '/edit');
//        $response->assertSee("<h1>tu n'es pas l'auteur tu ne peux pas modifier le projet</h1>");
//    }
    public function testDetailProjectUser()
    {
        $this->expectException(HttpException::class);
        //création d'un projet d'un utilisateur(1)
        $project = factory(Project::class)->create();
        $project2 = factory(Project::class)->make();
        //création d'un utilisateur (2)//
        $user = factory(User::class)->create();
        //l'utilisateur 2 se connecte//
        $this->actingAs($user);
        //L'utilisateur 2 remplis le formulaire
        $request = ['projectName' => $project2->projectName, 'descriptive' => $project2->descriptive];
        //L'utilisateur 2 essaye de modifier le formulaire
        $this->put('/project/' . $project->id, $request);
        //je verifie que le projet est non modifié
        //$response2 = $this->get('/project/' . $project->id);
        //$response2->assertDontSee($project2->projectName);
    }
}



