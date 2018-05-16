<?php
/**
 * Created by PhpStorm.
 * User: khaled.djhehiche
 * Date: 16/05/2018
 * Time: 15:22
 */

namespace Tests\Feature;


use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testStatus()
    {
        $response = $this->get('/project');
        $response->assertStatus(200);
    }
    public function testTitre()
    {
         $response = $this->get('/');
         $response->assertSee("<h1> Liste des projets </h1>");
    }
}