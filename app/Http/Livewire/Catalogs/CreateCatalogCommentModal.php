<?php

namespace App\Http\Livewire\Catalogs;

use App\Actions\Comments\CreateCatalogCommentAction;
use App\DataTransferObjects\CommentData;
use App\Models\Catalog;
use App\Models\User;
use Livewire\Component;

class CreateCatalogCommentModal extends Component
{
    public string $body;

    public Catalog $catalog;

    public function mount(Catalog $catalog)
    {
        $this->catalog = $catalog;
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
    }

    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'between:2,255'],
        ];
    }
}
