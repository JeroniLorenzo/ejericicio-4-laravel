<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Exception;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $movie = Movie::first();
            return response()->json([
                'message'=>'succes',
                'movie'=>$movie,
            ]);

        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function getByTitle($title){
        
        try{   
            $movie = Movie::where('title', $title)->get();
            return response()->json([
                'message'=>'succes',
                'movie'=>$movie,
            ]);

        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function getById($id){
        

        try{   
            $movie = Movie::find($id);
            return response()->json([
                'message'=>'succes',
                'movie'=>$movie,
            ]);

        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $movie = Movie::create($request->all());
            return response()->json(['message'=>'new movie created', 'movie'=>$movie]);
        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $movie = Movie::where('id', $request->id)
            ->update($request->all());
            return response()->json([
                'message'=>'succes',
                'movie'=>$movie,
            ]);
        
        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $movie = Movie::find($id);
            $movie->delete();
            return response()->json([
                'message'=>'Deleted movie',
                'movie'=>$movie
            ]);
        } catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()]);
        }
    }
}
