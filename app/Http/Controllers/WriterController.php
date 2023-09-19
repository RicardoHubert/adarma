<?php

namespace App\Http\Controllers;

use App\Model\LandingPage;
use App\Model\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Writer';
        $landingpage = LandingPage::latest()->first();
        $writers = Writer::get();
    
        return view('dashboard.article.writer.index', compact('title', 'landingpage', 'writers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Writer';
        $landingpage = LandingPage::latest()->first();
    
        return view('dashboard.article.writer.create', compact('title', 'landingpage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:writers,email'
        ]);

        Writer::create($validated);

        return redirect()->route('writer.index')->with('success', 'Penulis berhasil dibuat!');
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
        $title = 'Edit Writer';
        
        $landingpage = LandingPage::latest()->first();
        $writer = Writer::find($id);
        
        return view('dashboard.article.writer.edit', compact('title', 'landingpage', 'writer'));
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
        $writer = Writer::find($id);

        if ($request->email !== $writer->email) {
            $validated = request()->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:writers,email'
            ]);
        } else {
            $validated = request()->validate([
                'name' => 'required|string',
                'email' => 'required|string|email'
            ]);
        }        

        Writer::find($id)->update($validated);
        
        return redirect()->route('writer.index')->with('success', 'Penulis berhasil diperbarui!');
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
