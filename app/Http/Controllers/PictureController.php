<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Storage;

use App\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //return 'test';
         $query = Picture::all();
        //return view('picture.index',compact('query'));
        return view('main',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('picture.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        
        Picture::create($request -> all());
        //return $request -> all();
        return redirect('picture');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $query = Picture::find($id);
        return view('picture.edit',compact('query'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
     /*   Picture::where('id',$id)->update([
            'title' => $request->get('title'),
            'dimension' => $request->get('dimension'),
            'tag' => $request->get('tag')
            ]);*/
        return redirect('picture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //

        $query = Picture::find($id);
        $collections = collect($query);
        $filename = $collections->get('title');
        // default is config/filesystems.php
        $contents = Storage::get($filename);
        Storage::delete($filename);
        Picture::destroy($id);
        
        return redirect('picture');
        //return $contents;
        
    }
}
