<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\subscribers_news;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function emailputfrontend(Request $request)
     {
         $request->validate([
             'subscribes' => 'required|email|unique:subscribers_news,email', // Specify the table and column for uniqueness check
         ], [
             'subscribes.unique' => 'Email is already registered.',
         ]);
     
         subscribers_news::create([
             'email' => $request->input('subscribes'), // Correct the input field name
             'status' => 'Subscribed',
         ]);
         
         return redirect('/')->with('guest_bisa', 'Thank You, You are now be a part of our readers');
     }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
