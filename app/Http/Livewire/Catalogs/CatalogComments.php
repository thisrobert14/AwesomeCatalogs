<?php

namespace App\Http\Livewire\Catalogs;

use App\Models\Catalog;
use App\Models\Comment;
use Livewire\Component;

class CatalogComments extends Component
{
    public Catalog $catalog;

    public ?Comment $commentToBeUpdated = null;

    public ?Comment $commentToBeRemoved = null;

    protected $listeners = [
        'closeDeleteCatalogCommentModal' => 'closeDeleteCatalogCommentModal',
        'closeUpdateCatalogCommentModal' => 'closeUpdateCatalogCommentModal',
        'commentUpdated' => 'commentUpdated',
        'commentDeleted' => 'commentDeleted',
    ];

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    public function render()
    {
        return view('livewire.catalogs.catalog-comments', [
            'comments' => $this->catalog->comments,
        ]);
    }

    public function showDeleteCatalogCommentModal(string $commentId): void
    {
        $this->commentToBeRemoved = Comment::find($commentId);
    }

    public function closeDeleteCatalogCommentModal(): void
    {
        $this->commentToBeRemoved = null;
    }

    public function showUpdateCatalogCommentModal(string $commentId): void
    {
        $this->commentToBeUpdated = Comment::find($commentId);
    }

    public function closeUpdateCatalogCommentModal(): void
    {
        $this->commentToBeUpdated =  null;
    }

    public function commentUpdated(): void
    {
        $this->closeUpdateCatalogCommentModal();
        $this->notifySuccess('Comment updated!');
    }

    public function commentDeleted(): void
    {
        $this->closeDeleteCatalogCommentModal();
        $this->notifySuccess('Comment deleted!');
    }
}
