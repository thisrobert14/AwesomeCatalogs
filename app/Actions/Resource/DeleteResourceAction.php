<?php

namespace App\Actions\Resource;

use App\Models\Resource;

class DeleteResourceAction
{
    public function delete(Resource $resource): void
    {
        $resource->delete();
    }
}