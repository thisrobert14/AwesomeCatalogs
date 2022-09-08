<?php

namespace App\Http\Livewire\Resources;

use App\Models\Catalog;
use App\Models\Comment;
use Livewire\Component;
use App\Actions\Comments\DeleteResourceCommentAction;
use App\Models\Resource;

class DeleteResourceCommentModal extends Component
{
    public Comment $comment;

    public Resource $resource;
    
    public bool $removeResourceCommentModalVisible = false;

    public function mount(Comment $comment, Catalog $catalog)
    {
        $this->comment = $comment;
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.resources.delete-resource-comment-modal');
    }

    public function deleteResourceComment()
    {
        resolve(DeleteResourceCommentAction::class)->delete($this->comment);
        $this->emit('closeDeleteResourceCommentModal');
    }

    public function showRemoveResourceCommentModal(): void
    {
        $this->removeResourceCommentModalVisible = true;
    }

    public function closeRemoveResourceCommentModal(): void
    {
        $this->removeResourceCommentModalVisible = false;
    }
}
