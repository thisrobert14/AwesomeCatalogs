<?php

namespace App\Http\Livewire\Resources;

use App\Models\Catalog;
use Livewire\Component;
use App\Models\Resource;
use App\DataTransferObjects\CommentData;
use App\Actions\Comments\CreateResourceCommentAction;

class CreateResourceCommentModal extends Component
{
    public Catalog $catalog;

    public Resource $resource;

    public $body;

    public function mount(Catalog $catalog, Resource $resource)
    {
        $this->catalog = $catalog;
        $this->resource = $resource;
    }

    public function render()
    {
        return view('livewire.resources.create-resource-comment-modal');
    }

    public function createResourceComment()
    {
        $this->validate();

        resolve(CreateResourceCommentAction::class)->create(new CommentData(
           body: $this->body,
           resource: $this->resource,
           owner: auth()->user(),
        ));

        $this->emit('commentPosted');
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'between:2,255'],
        ];
    }
}
