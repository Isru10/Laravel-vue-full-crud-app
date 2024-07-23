<?php

namespace App\Http\Controllers;

use App\Models\Workers;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
 public function index()
    {
        $items = Workers::all();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = Workers::find($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $item = Workers::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $item = Workers::find($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Workers::destroy($id);
        return response()->json(null, 204);
    }    
    
     }
