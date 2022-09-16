<?php

namespace App\Http\Livewire\Resources;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Resource;
use Symfony\Component\VarDumper\Caster\ResourceCaster;

class ListResource extends Component
{
    public Resource $resource;

    public $title;

    public bool $createResourceCommentModalVisible = false;

    public ?Comment $resourceCommentToBeRemoved = null;

    public ?Comment $resourceCommentToBeUpdated = null;

    protected $listeners = [
        'closeCreateResourceCommentModal' => 'closeCreateResourceCommentModal',
        'closeDeleteResourceCommentModal' => 'closeDeleteResourceCommentModal',
        'closeUpdateResourceCommentModal' => 'closeUpdateResourceCommentModal',
        'commentPosted' => 'commentPosted',
        'commentDeleted' => 'commentDeleted',
    ];

    public function mount(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function render()
    {
        return view('livewire.resources.list-resource');
    }

    public function showCreataResourceCommentModal(): void
    {
        $this->createResourceCommentModalVisible = true;
    }

    public function closeCreateResourceCommentModal(): void
    {
        $this->createResourceCommentModalVisible = false;
    }

    public function closeUpdateResourceCommentModal(): void
    {
        $this->resourceCommentToBeUpdated = null;
    }

    public function closeDeleteResourceCommentModal(): void
    {
        $this->resourceCommentToBeRemoved = null;
    }

    public function commentPosted(): void
    {
        $this->closeCreateResourceCommentModal();
        $this->notifySuccess('Comment has been posted!');
    }

    public function commentDeleted(): void
    {
        $this->closeDeleteResourceCommentModal();
        $this->notifySuccess('Comment deleted!');
    }
}
