<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use Illuminate\Support\Facades\Validator;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Podcast::with('episodes')->get();
    }

    public function create(Request $request)
    {
    $validator = Validator::make($request->all(), [
            'name' => 'required',
            'owner' => 'required',
        ]);
    if (!$validator->fails())
    {
        $podcast = new Podcast;
        $podcast->name = $request->name;
        $podcast->owner = $request->owner;
        $podcast->description = $request->description;
        $podcast->save();
        return $podcast;
    } 
    else
        return "name or owner not provided";
     
    }

    public function show($id)
    {
        return Podcast::find($id);
    }

    public function update(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'owner' => 'required',
    ]);
    if (!$validator->fails())
    {
        $existing = Podcast::find($id);
        if($existing){
            $existing->name = $request->name;
            $existing->owner = $request->owner;
            $existing->description = $request->description;
            $existing->save();
            return $existing;
        }
        return "item not found";
    } 
    else
        return "name or owner not provided";
    }

    public function delete($id)
    {
        $existing = Podcast::find($id);
        if($existing){
            $existing->delete();
            return "deletion successful";
        }
        return "item not found";
    }
}
