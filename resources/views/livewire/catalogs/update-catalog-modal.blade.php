<div @keydown.escape.window="$wire.emit('closeUpdateCatalogModal')" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div @click.away="$wire.emit('closeUpdateCatalogModal')" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="flex-grow mt-3 text-center sm:mt-0 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Update catalog
              </h3>
              <div class="mt-4">
                <x-input type="text" id="title"
                    class="block mt-1 w-full" wire:keydown.enter="updateCatalog"
                    wire:model.defer="title"
                />
                <x-input-error class="mt-1" for="title" description="A title that shortly expose the idea." />
              </div>
              <div class="mt-4">
                <x-input type="text" id="description"
                    class="block mt-1 w-full" wire:keydown.enter="updateCatalog"
                    wire:model.defer="description"
                />
                <x-input-error class="mt-1" for="description" description="Write something about it." />
              </div>

              <div 
              x-data="{ isUploading: false, progress: 0 }"
              x-on:livewire-upload-start="isUploading = true"
              x-on:livewire-upload-finish="isUploading = false"
              x-on:livewire-upload-error="isUploading = false"
              x-on:livewire-upload-progress="progress = $event.detail.progress"

              class="mt-4">
              <input type="file" wire:model.defer="photo">
              @if ($photo)
              <img src="{{ $photo->temporaryUrl() }}" alt="temp" class="h-24 w-1/4 rounded-xl">
              @elseif ($catalog->photo)
              <img src="/storage/{{ $catalog->photo }}" alt="" class="h-24 w-1/4 rounded-xl">
              @endif
              <x-input-error class="mt-1" for="photo" />
              <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button wire:click="updateCatalog" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Update
          </button>
          <button wire:click="$emit('closeUpdateCatalogModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
