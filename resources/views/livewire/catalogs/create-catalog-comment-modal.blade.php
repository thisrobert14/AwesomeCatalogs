<div @keydown.escape.window="$wire.emit('closeCreateCatalogCommentModal')" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div @click.away="$wire.emit('closeCreateCatalogCommentModal')" class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
       
<div class="flex items-start space-x-4">
  <div class="flex-shrink-0">
  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
  </div>
  <div class="min-w-0 flex-1">
    <div class="relative">
      <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm ">
        <label for="comment" class="sr-only">Add your comment</label>
        <textarea rows="10" name="comment" id="comment" class="block w-full resize-none border-0 py-5 px-2 sm:text-sm" placeholder="Add your comment..."></textarea>

        <div class="py-2" aria-hidden="true">
          <div class="py-px">
            <div class="h-9"></div>
          </div>
        </div>
      </div>

      <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
   
        <div class="flex-shrink-0">
          <button 
          wire:click="createComment"
          type="submit" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">Post</button>
        </div>
      </div>
</div>
  </div>
</div>

      </div>
    </div>
  </div>
</div>
