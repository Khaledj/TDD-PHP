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


class ProjectTest extends TestCase
{
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
      $response = $this->get('/project');
    $response->assertSee($project->projectName);

    }

}