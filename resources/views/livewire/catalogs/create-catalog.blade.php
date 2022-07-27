<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<div class="space-y-6">
  <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-blue-900">New Catalog</h3>
        <p class="mt-1 text-sm text-gray-500">Use this way to create a permanent Catalog.</p>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3">
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input 
            wire:model="title"
            type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Title of your Catalog">
          </div>

          <div class="col-span-6 sm:col-span-4">
            <label for="description" class="block  font-medium text-gray-700">Description</label>
            <textarea 
            wire:model="description"
            rows="4" cols="20" name="description" id="description" autocomplete="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Describe it..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-end py-2">
    <button 
    wire:click="createCatalog"
    type="submit" class=" w-32 inline-flex justify-center py-3 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
  </div>
  </div>
</div>
