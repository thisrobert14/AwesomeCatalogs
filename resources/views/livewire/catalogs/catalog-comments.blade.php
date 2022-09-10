<div class=" mt-14 px-4 py-2 rounded-xl ">
  <div>
    @foreach($comments as $comment)
    <div class="flex items-center justify-between bg-white  mb-4 px-2 rounded-xl">
      <div class="flex space-x-4 text-sm text-gray-500">
        <div class="flex-none py-10">
          <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
        </div>
        <div class="flex-1 py-10">
          <h3 class="font-medium text-gray-900">{{ $comment->owner->first_name}}</h3>
          <p><time datetime="2021-07-16">{{ $comment->created_at->diffForHumans() }}</time></p>

          <div class="prose prose-sm text-xl mt-4 max-w-none text-gray-700">
            <p>{{ $comment->body }}</p>
          </div>
          @if($comment->created_at < $comment->updated_at)
            <div class="px-1 py-1  bg-gray-50 rounded-full text-xs  mt-4 max-w-none text-gray-500">
              <h3 class="font-medium text-sm text-gray-700">Updated: </h3>
              <p>{{ $comment->updated_at->diffForHumans() }}</p>
            </div>
            @endif
        </div>
      </div>
      <div>
        @if(auth()->user()->id == $comment->owner->id)
        <button wire:click="showUpdateCatalogCommentModal('{{ $comment->id }}')" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-400 text-white font-medium text-white hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
          Update
        </button>
        <button wire:click="showDeleteCatalogCommentModal('{{ $comment->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border shadow-sm px-4 py-2 bg-red-400 text-base font-medium text-white hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Delete
        </button>

        @elseif(auth()->user()->id == $catalog->author->id)
        <button wire:click="showDeleteCatalogCommentModal('{{ $comment->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border shadow-sm px-4 py-2 bg-red-100 text-base font-medium text-gray-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Delete
        </button>
        @endif
      </div>
    </div>
    @endforeach
  </div>



  @if($commentToBeRemoved)
  @livewire('catalogs.delete-catalog-comment-modal', [
  'catalog' => $catalog,
  'comment' => $commentToBeRemoved,
  ])
  @endif

  @if($commentToBeUpdated)
  @livewire('catalogs.update-catalog-comment-modal', [
  'comment' => $commentToBeUpdated,
  'catalog' => $catalog,
  ])
  @endif
</div>