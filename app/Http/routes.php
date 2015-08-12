<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Picture;
use Illuminate\Support\Collection;

Route::get('/', function () {
    return view('main');
});

Route::get('/picture', function () {
    return view('main');
});

Route::get('/picture/listcat',function(){
    $query = Picture::all();
    $collections = collect($query);
    return $collections->unique('tag')->implode('tag', ',');
});

Route::get('/picture/listids/{id?}',function($id = null){
    $query = Picture::all();
    $items = collect([]);
   
    if($id!=null){
        $collections = collect($query)->whereLoose('id', intval($id));
        
        $keys = $collections->keys();
        
        for($i=0;$i<$keys->count();$i++){
            $items->push($collections->get($keys[$i]));
        }

    }else{
    
        $items = collect($query);  
    
    }
    return $items;
    //return view('picture.listpics',compact('collections'));
});

Route::get('/picture/listpics/{cat?}',function($cat = null){
    $query = Picture::all();
    $items = collect([]);
    if($cat!=null){
        $collections = collect($query)->where('cat', $cat);
        
        $keys = $collections->keys();
        
        for($i=0;$i<$keys->count();$i++){
            $items->push($collections->get($keys[$i]));
        }

    }else{
    
        $items = collect($query);  
    
    }
    return $items;
    //return view('picture.listpics',compact('collections'));
});

Route::get('/picture/massedit', function () {
    $query = Picture::all();
    return view('picture.massedit',compact('query'));
});

Route::get('/picture/photoeditor', function () {
    $query = Picture::all();
    return view('picture.photoeditor',compact('query'));
});

Route::get('/picture/manager', function () {
    $query = Picture::all();
    return view('picture.manager',compact('query'));
});

Route::any('/picture/upload', function () {
    $query = Picture::all();
    return view('picture.upload',compact('query'));
});

Route::any('/picture/delete2', function () {
    $query = Picture::all();
    return view('picture.delete2',compact('query'));
});

Route::resource('picture','PictureController');
