<?php
/**
 * Created by PhpStorm.
 * User: khaled.djhehiche
 * Date: 23/05/2018
 * Time: 09:39
 */
namespace App\Http\Controllers;

class IndexController extends Controller{

//méthode bienvenue qui permet de retourner la vue index//
    public function index() {
        return view('welcome');
    }
}
?>