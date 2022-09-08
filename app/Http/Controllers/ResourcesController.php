<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function listResourceComments(Resource $resource, Comment $comment)
    {
        return view('resources.list-resource-comments', [
            'resource' => $resource,
            'comment' => $comment,
        ]);
    }
}
