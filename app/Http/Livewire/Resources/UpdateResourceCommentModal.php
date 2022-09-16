<?php

namespace App\Http\Livewire\Resources;

use App\Actions\Comments\UpdateResourceCommentAction;
use App\DataTransferObjects\CommentData;
use App\Models\Comment;
use App\Models\Resource;
use Livewire\Component;

class UpdateResourceCommentModal extends Component
{
    public $body;

    public Resource $resource;

    public Comment $comment;

    public function mount(Resource $resource, Comment $comment)
    {
        $this->resource = $resource;
        $this->comment = $comment;
        $this->body = $comment->body;
    }

    public function render()
    {
        return view('livewire.resources.update-resource-comment-modal');
    }

    public function updateResourceComment()
    {
        $this->validate();

        resolve(UpdateResourceCommentAction::class)->update($this->comment, new CommentData(
            body: $this->body,
            resource: $this->resource,
            owner: auth()->user()
        ));

        $this->emit('closeUpdateResourceCommentModal');
        $this->notifySuccess('Comment updated!');
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'between:2,255'],
        ];
    }
}
