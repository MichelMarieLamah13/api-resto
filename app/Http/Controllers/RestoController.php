<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Resto::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required | min:3',
            'email'=>'required | email',
            'address'=>'required | min:3'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->validate()){
            $resto = Resto::create($request->all());
            if ($resto) {
                return response($resto, 201);
            } else {
                return response(['error' => 'Error while adding restaurant'], 500);
            }
        }else{
            return response(['error' => 'Not valid data'], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function show(Resto $resto)
    {
        return response($resto, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function edit(Resto $resto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resto $resto)
    {
        $rules = [
            'name'=>'required | min:3',
            'email'=>'required | email',
            'address'=>'required | min:3'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->validate()){
            $resto->update($request->all());
            return response($resto,200);
        }else{
            return response(['error' => 'Not valid data'], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resto $resto)
    {
        //
        $resto->delete();
        return response($resto,200);
    }
}
