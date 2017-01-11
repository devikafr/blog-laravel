<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $heroes = Hero::all();
    return view('hero', ['heroes'=> $heroes]);
  }
  public function getOne($id)
  {
    $hero = Hero::find($id);
    return view('hero', ['hero'=> $hero]);
  }
  public function newHeroForm()
  {
    return view('newHero');
  }
  public function insertOne(Request $request)
  {
    var_dump($request->input());
  }
}
