<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Comment;
use Livewire\Component;
use App\Actions\Comments\DeleteCatalogCommentAction;
use App\Models\Catalog;

class DeleteCatalogCommentModal extends Component
{
    public Comment $comment;

    public Catalog $catalog;
    
    public bool $removeCatalogCommentModalVisible = false;

    public function mount(Comment $comment, Catalog $catalog)
    {
        $this->comment = $comment;
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.catalogs.delete-catalog-comment-modal');
    }

    public function deleteComment()
    {
        resolve(DeleteCatalogCommentAction::class)->delete($this->comment);
        $this->emit('commentDeleted');
    }

    public function showRemoveCatalogCommentModal(): void
    {
        $this->removeCatalogCommentModalVisible = true;
    }

    public function closeRemoveCatalogCommentModal(): void
    {
        $this->removeCatalogCommentModalVisible = false;
    }
}
