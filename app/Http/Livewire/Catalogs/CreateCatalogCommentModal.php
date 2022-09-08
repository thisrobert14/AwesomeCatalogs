<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Comments\CreateCatalogCommentAction;
use App\Actions\Comments\DeleteCatalogCommentAction;
use App\DataTransferObjects\CommentData;
use App\Models\Catalog;
use App\Models\Resource;
use App\Models\User;
use Livewire\Component;

class CreateCatalogCommentModal extends Component
{
    public $body;

    public Catalog $catalog;

    public Resource $resource;

    public function mount(Catalog $catalog, Resource $resource)
    {
        $this->catalog = $catalog;
        $this->resource = $resource;
    }

    public function render()
    {
        return view('livewire.catalogs.create-catalog-comment-modal');
    }

    public function createComment()
    {
        $this->validate();

        resolve(CreateCatalogCommentAction::class)->create(new CommentData(
            body: $this->body,
            catalog: $this->catalog,
            owner: auth()->user(),
        ));

        $this->emit('commentCreated');
        return redirect()->back();
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'between:2,255'],
        ];
    }
}
