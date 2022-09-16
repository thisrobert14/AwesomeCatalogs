<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Comments\UpdateCatalogCommentAction;
use App\Models\Catalog;
use App\Models\Comment;
use Livewire\Component;
use App\DataTransferObjects\CommentData;

class UpdateCatalogCommentModal extends Component
{
    public $body;

    public Catalog $catalog;

    public Comment $comment;

    public function mount(Catalog $catalog, Comment $comment)
    {
        $this->catalog = $catalog;
        $this->comment = $comment;
        $this->body = $comment->body;
    }

    public function render()
    {
        return view('livewire.catalogs.update-catalog-comment-modal');
    }

    public function updateComment()
    {
        $this->validate();

        resolve(UpdateCatalogCommentAction::class)->update($this->comment, new CommentData(
            body: $this->body,
            catalog: $this->catalog,
            owner: auth()->user()
        ));

        $this->emit('commentUpdated');
    }


    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'between:2,255'],
        ];
    }
}
