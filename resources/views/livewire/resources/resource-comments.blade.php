@foreach($comments as $comment)
<div class="bg-white">
  <div>
    <h2 id="reviews-heading" class="sr-only">Reviews</h2>

    <div class="space-y-4">
      <div class="flex flex-col sm:flex-row">
        <div class="order-2 flex items-center space-x-64 mt-6 sm:mt-0 sm:ml-16">
          <div class="mt-3 space-y-6 text-sm text-gray-600">
          <h3 class="font-medium text-gray-900">{{ $comment->body }}</h3>
          @if($comment->created_at < $comment->updated_at)
            <div class="prose px-2 py-2 bg-gray-200 rounded-xl text-xs prose-sm mt-4 max-w-none text-gray-500">
            <h3 class="font-medium text-sm text-gray-900">Updated at: </h3>
            <p>{{ $comment->updated_at->diffForHumans() }}</p>          
            </div>
            @endif
        </div>
        <div class="flex items-center space-x-4 ">
        @if(auth()->user()->id == $comment->owner->id)
        <button wire:click="showUpdateResourceCommentModal('{{ $comment->id }}')" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Update
          </button>
          <button wire:click="showDeleteResourceCommentModal('{{ $comment->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border shadow-sm px-4 py-2 bg-red-100 text-base font-medium text-gray-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Delete
          </button>

          @elseif(auth()->user()->id == $resource->author->id)
          <button wire:click="closeDeleteResourceCommentModal('{{ $comment->id }}')" class="mt-3 w-full inline-flex justify-center rounded-md border shadow-sm px-4 py-2 bg-red-100 text-base font-medium text-gray-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Delete
          </button>
          @endif
        </div>
        </div>

        <div class="order-1 flex items-center sm:flex-col sm:items-start">
          <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixqx=oilqXxSqey&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Mark Edwards." class="h-12 w-12 rounded-full">
          <div class="ml-4 sm:ml-0 sm:mt-4">
            <p class="text-sm font-medium text-gray-900">{{ $comment->owner->first_name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if($resourceCommentToBeUpdated)
        @livewire('resources.update-resource-comment-modal', [
            'comment' => $resourceCommentToBeUpdated,
            'resource' => $resource,
        ])
    @endif

    @if($resourceCommentToBeRemoved)
        @livewire('resources.delete-resource-comment-modal', [
            'resource' => $resource,
            'comment' => $resourceCommentToBeRemoved,
        ])
    @endif
</div>
<hr>
@endforeach