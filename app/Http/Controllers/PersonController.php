<?php


namespace App\Http\Controllers;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * [show description]
     * @param  Person         $person [description]
     * @return PersonResource         [description]
     */
    public function show(Person $person) : PersonResource {

      return new PersonResource($person);

    }

/**
 * [index description]
 * @return PersonResourceCollection [description]
 */
    public function index() : PersonResourceCollection {

      return new PersonResourceCollection(Person::paginate(10));

    }
}
