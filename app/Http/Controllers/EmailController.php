<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\EmailResource;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmailResource::collection(Email::all()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = Unit::where('unit_number', $request->unit_number)->first();

        $email = new Email;
        $email->unit_id = $unit->id;
        $email->email = $request->email;

        if (isset($request->name)){
            $email->name = $request->name;
        }
        $email->save();
        return new EmailResource($email);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        return new EmailResource($email);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        if (isset($request->email)){
            $email->email = $request->email;
        }
        if (isset($request->name)) {
            $email->name = $request->name;
        }
        $email->save();
        return new EmailResource($email);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return response()->json([
            'message'=> 'Successfully Deleted',
            'status' => Response::HTTP_NO_CONTENT]);
    }
}
