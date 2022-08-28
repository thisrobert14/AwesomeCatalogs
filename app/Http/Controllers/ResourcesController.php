<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function listResource(Resource $resource)
    {
        return view('resources.list-resource', [
            'resource' => $resource
        ]);
    }
}
