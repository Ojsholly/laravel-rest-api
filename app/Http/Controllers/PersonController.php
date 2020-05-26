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

    public function store(Request $request) {

        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'city'       => 'required'
        ]);

        $person = Person::create($request->all());

        return new PersonResource($person);

    }

    public function update(Person $person, Request $request): PersonResource {


        $person->update($request->all());

        return new PersonResource($person);

    }
}
