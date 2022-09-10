<?php

namespace App\Actions\Resource;

use App\DataTransferObjects\ResourceData;
use App\Models\Resource;

class UpdateResourceAction
{
    public function update(Resource $resource, ResourceData $data): Resource
    {
        $resource->title = $data->title;
        $resource->description = $data->description;
        $resource->catalog()->associate($data->catalog);    
        $resource->author()->associate($data->author);
        $resource->save();

        return $resource;
    }
}