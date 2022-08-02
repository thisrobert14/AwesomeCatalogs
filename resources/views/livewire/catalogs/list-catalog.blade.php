<div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
  <div class="relative max-w-xl mx-auto">
    <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <div class="text-center">
      <h2 class="text-2xl font-extrabold tracking-tight text-blue-600 sm:text-4xl">{{ $catalog->title }}</h2>
      <p class="mt-4 text-lg leading-6 text-gray-500">Here you can edit or delete your Catalog</p>
    </div>
    <div class="mt-12">
      <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Your catalog's title:</label>
          <div class="mt-1">
            <input 
            wire:model="title"
            type="text" name="title"  disabled class="py-3 px-4 block text-gray-500 w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" >
          </div>
        </div>
      
       
        <div class="sm:col-span-2">
          <label for="message" class="block text-sm font-medium text-gray-700">Your catalog's description</label>
          <div class="mt-1">
            <textarea 
            wire:model="description"
            id="message" name="description" rows="4" disabled class="py-3 px-4 block w-full text-gray-500 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md">{{ $catalog->description }}</textarea>
          </div>
        </div>
   
        <div class="sm:col-span-2 flex justify-between items-center">
        <button wire:click="showUpdateCatalogModal" type="submit" class="w-32 inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-500 hover:bg-indigo-600 ">Update</button>
        <button wire:click="showDeleteCatalogModal" type="button" class="w-32 inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-600 hover:bg-red-700 ">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

@if($this->updateCatalogModalVisible)
  @livewire('catalogs.update-catalog-modal')
@endif

@if($this->deleteCatalogModalVisible)
    @livewire('catalogs.delete-catalog-modal')
@endif
