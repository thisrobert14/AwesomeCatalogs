<?php

namespace App\Http\Livewire\Resources;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Resource;

class ResourceComments extends Component
{
    public Resource $resource;

    public ?Comment $resourceCommentToBeRemoved = null;

    public ?Comment $resourceCommentToBeUpdated = null;


    public function mount(Resource $resource)
    {
        $this->resource = $resource;
    }

    protected $listeners = [
        'closeDeleteResourceCommentModal' => 'closeDeleteResourceCommentModal',
        'closeUpdateResourceCommentModal' => 'closeUpdateResourceCommentModal',
    ];

    public function render()
    {
        return view('livewire.resources.resource-comments', [
            'comments' => $this->resource->comments
        ]);
    }

    public function showUpdateResourceCommentModal(string $commentId): void
    {
        $this->resourceCommentToBeUpdated = Comment::find($commentId);
    }

    public function showDeleteResourceCommentModal(string $commentId): void
    {
        $this->resourceCommentToBeRemoved = Comment::find($commentId);
    }

    public function closeUpdateResourceCommentModal(): void
    {
        $this->resourceCommentToBeUpdated = null;
    }

    public function closeDeleteResourceCommentModal(): void
    {
        $this->resourceCommentToBeRemoved = null;
    }
}
