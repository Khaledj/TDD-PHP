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
}