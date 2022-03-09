<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use Illuminate\Support\Facades\Validator;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Episode::with('podcast')->get();
    }

    public function create(Request $request)
    {
    $validator = Validator::make($request->all(), [
            'podcast_id' => 'required',
            'title' => 'required',
        ]);
    if (!$validator->fails())
    {
        $episode = new Episode;
        $episode->podcast_id = $request->podcast_id;
        $episode->title = $request->title;
        $episode->data = $request->data;
        $episode->save();
        return $episode;
    } 
    else
        return "podcast or title not provided";
     
    }

    public function show($id)
    {
        return Episode::find($id);
    }

    public function update(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
        'podcast_id' => 'required',
        'title' => 'required',
    ]);
    if (!$validator->fails())
    {
        $existing = Episode::find($id);
        if($existing){
            $existing->podcast_id = $request->podcast_id;
            $existing->title = $request->title;
            $existing->data = $request->data;
            $existing->save();
            return $existing;
        }
        return "item not found";
    } 
    else
        return "podcast ot title not provided";
    }

    public function delete($id)
    {
        $existing = Episode::find($id);
        if($existing){
            $existing->delete();
            return "deletion successful";
        }
        return "item not found";
    }
}
