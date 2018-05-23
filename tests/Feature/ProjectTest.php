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
use Illuminate\Support\Facades\Auth;


class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function testStatus()
    {
        $response = $this->get('/project');
        $response->assertStatus(200);
    }

    public function testTitre()
    {
        $response = $this->get('/project');
        $response->assertSee("<h1> Liste des projets </h1>");
    }

    public function testTitleProject()
    {
        $project = factory(Project::class)->create();
        //dd($project);
        $response = $this->get('/project');
        $response->assertSee($project->projectName);
    }

    public function testTitleDetailProject()
    {
        $project = factory(Project::class)->create();
        $response = $this->get('/project/' . $project->id);
        $response->assertSee($project->projectName);
    }

    public function testCreateUserProject()
    {
        $project = factory(Project::class)->create();
        $user = $project->user->find($project->user_id);
        $check = Project::find(3)->user->name;
        $this->assertTrue($check == $user->name);
    }

    public function testNameUserDetailProject()
    {
        $project = factory(Project::class)->create();
        $response = $this->get('/project/' . $project->id);
        $response->assertSee($project->user->name);
    }

    public function testAddProjectUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
             ->get('/project');
        $this->be($user);
        $response = $this->get('/add');
        $response->assertSee("<h1>Ajouter un projet</h1>");
    }
}




