<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;
use App\Superpower;
use DB;

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
      $superpowers = Superpower::all();
      $superpowersArray = array();
      $superpowersId = array();

      foreach ($superpowers as $superpower) {
        $superpowersId[] = $superpower->id;
        $superpowersArray[$superpower->id] = $superpower->name;
      }

      // dump($superpowersArray);die;   /*to retrieve all the super powers*/
    return view('newHero', ['superpowers' => $superpowersArray, 'superpowersId' => $superpowersId]);
  }
  public function insertOne(Request $request)
  {
    //  dd($request->input());
    $hero = new Hero ;/*instance a new object*/
    $hero->name = $request->name;
    $hero->force = $request->force;
    $hero->sex = $request->sex;

    $hero->save();/*to save it into database*/

    // $createdHero =Hero::find(DB::getPdo()->lastInsertId());/*retrieve the last created id (DB::getPdo()->lastInsertId())*/
    foreach ($request->powers as $key => $value)/*to retrieev all the powers*/
    {
      $existingPower = Superpower::find($value); /* retrieve each superpower*/
      $hero->superpowers()->attach($existingPower->id);
      // $createdHero->superpowers()->attach($existingPower->id);/*send the data to intermediate table*/

      // dd($existingPower);
    }
    return redirect('/heroes');    // var_dump($request->name);    /* to get the result of the value of the new hero by sex , name, all ->change */
  }
  public function deleteOne(Request $request, $id)/*to delete retrieve id*/
  {
    Hero::destroy($id);/*delete by only using id*/
    return redirect('/heroes');
  }
  public function updateOne(Request $request)
  {
    // dd($request->input());
    $hero = Hero:: find($request->id);
    $hero->name = $request->name;
    $hero->force = $request->force;
    $hero->sex = $request->sex;
    $hero->save();/*to save it into database*/

    if(is_array($request->powers))
    {
    $hero->superpowers->sync($request->powers);
    }else{
    $hero->superpowers()->detach();
    }
    return redirect('/heroes');
        // $createdHero->superpowers()->attach($existingPower->id);/*send the data to intermediate table*/
    }

  public function heroUpdate($id)
  {
    $hero = Hero::find($id);/*find hero by his id*/
      $superpowers = Superpower::all();
      $superpowersArray = array();
      $superpowersId = array();

      foreach ($superpowers as $superpower) {
        $superpowersID[] = $superpower->id;
        $superpowersArray[$superpower->id] = $superpower->name;
      }
    $hero = Hero::find($id);/*find hero by his id*/
    return view('newHero', ['updatedHero' => $hero, 'superpowers' => $superpowersArray, 'superpowersId' => $superpowersId]);
  }
}
