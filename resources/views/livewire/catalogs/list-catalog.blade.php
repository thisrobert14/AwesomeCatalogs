<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">{{ $catalog->title }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ $catalog->description }}</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            @if(auth()->user()->id == $catalog->author->id)
            <div>
                <label id="listbox-label" class="sr-only"> Change published status </label>
                <div x-data="{ open: false }" class="relative  items-center">
                    <button 
                    wire:click="showCreateCatalogResourceModal"
                    type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Add new resource</button>

                    <div class="inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                        <div class="relative z-0 inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                            <div class="relative inline-flex items-center bg-indigo-500 py-2 pl-3 pr-4 border border-transparent rounded-l-md shadow-sm text-white">

                                <p class="ml-2.5 text-sm font-medium">Actions</p>
                            </div>
                            <button @click="open = ! open" type="button" class="relative inline-flex items-center bg-indigo-500 p-2 rounded-l-none rounded-r-md text-sm font-medium text-white hover:bg-indigo-600" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                <span class="sr-only">Change published status</span>
                                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <ul x-show="open" @click.outside="open = false" class="origin-top-right absolute z-10 right-0 mt-2 w-72 rounded-md shadow-lg overflow-hidden bg-white   divide-y divide-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0">
                        <li class="text-gray-900 select-none relative p-4 text-sm bg-blue-100 hover:bg-blue-200" id="listbox-option-0" role="option">
                            <div 
                            wire:click="showUpdateCatalogModal"
                            class="flex flex-col cursor-pointer ">
                                <div class="flex justify-between ">
                                    <p class="font-normal">Update</p>
                                </div>
                                <p class="text-gray-500 mt-2">Here is where you can update your catalog.</p>
                            </div>
                        </li>

                        <li class="text-gray-900  select-none relative p-4 text-sm bg-pink-100 hover:bg-pink-200" id="listbox-option-0" role="option">
                            <div 
                            wire:click="showDeleteCatalogModal"
                            class="flex flex-col cursor-pointer ">
                                <div class="flex justify-between">
                                    <p class="font-normal">Delete</p>
                                </div>
                                <p class="text-gray-500 mt-2">Here you can delete your catalog.</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            @endif        

        </div>
        <div class="flex items-center bg-gray-200 px-3 py-2 ml-4 space-x-2 rounded-xl">
            <button
            wire:click.prevent="star"
            >
            <svg class="flex-shrink-0 h-5 w-5 
            @if($hasStared) text-yellow-400
            @endif
            text-gray-500 hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>
            </button>
            <div class="
            @if($hasStared) text-yellow-400
            @endif
            ">
                {{ $starsCount }}
            </div>
        </div>
    </div>
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Resources</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Description</th>
                    
                    <th scope="col" class="relative py-3.5 pl-2 pr-1 sm:pr-6">
                        <span class="sr-only">Select</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-2 pr-1 sm:pr-6">
                        <span class="sr-only">Select</span>
                    </th>
                    <th scope="col" class="relative py-3.5 pl-2 pr-1 sm:pr-6">
                        <span class="sr-only">Select</span>
                    </th>
                </tr>
            </thead>
            @foreach($catalog->resources as $resource)
            <tbody>
                <tr>
                    <td class="relative py-4 pl-4 sm:pl-6  pr-3 text-sm">
                       <a href="{{ route('show.resource', ['resource' => $resource->id]) }}"><div class="font-medium text-gray-900">{{ $resource->title }}</div></a>
                    </td>
                    <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $resource->description }}</td>
                    @if(auth()->user()->id == $catalog->author->id)
                    <td class="relative py-3.5 pl-2 pr-1 sm:pr-6 text-right text-sm font-medium">
                        <button 
                        wire:click="showUpdateResourceModal('{{ $resource->id }}')"
                        type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-blue-100 px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Update</button>
                    </td>
                    <td class="relative py-3.5 pl-2 pr-1 sm:pr-6 text-right text-sm font-medium">
                        <button 
                        wire:click="showDeleteResourceModal"
                        type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-red-100 px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Delete</button>
                    </td>
                    @endif
                    <a href="{{ route('show.resource', ['resource' => $resource->id]) }}"><td class="hidden cursor-pointer hover:text-gray-700 px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $resource->comments()->count() }} comments</td></a>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="flex items-center space-x-3">
    <button type="button" disabled class="inline-flex items-center rounded-full border border-transparent bg-indigo-500 px-3 py-1.5 text-xs font-medium text-white shadow-sm mt-2">Leave a comment</button>
    <button 
    wire:click="showCreateCatalogCommentModal"
    type="button" class="inline-flex items-center mt-2 rounded-full border border-transparent bg-indigo-500 p-1 text-white shadow-sm hover:bg-indigo-600">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
    </button>
    </div>

    @if($catalog->comments->count() < 1)
        <h1 class="mt-10 text-xl bg-red-50 px-2 py-2 rounded-md font-semibold text-gray-500 w-3/4">There are no comments for this catalog now. Be the first person who post one!</h1>
    @else
        @livewire('catalogs.catalog-comments', [
            'catalog' => $catalog,
            ])
    @endif

    @if ($createCatalogResourceModalVisible)
        @livewire('catalogs.create-catalog-resource-modal', [
            'catalog' => $catalog,    
        ])
    @endif

    @if($updateCatalogModalVisible)
        @livewire('catalogs.update-catalog-modal', [
            'catalog' => $catalog,
        ])
    @endif

    @if($deleteCatalogModalVisible)
        @livewire('catalogs.delete-catalog-modal', [
            'catalog' => $catalog,
        ])
    @endif

    @if($resourceToBeUpdated)
        @livewire('resources.update-resource-modal', [
            'resource' => $resourceToBeUpdated,
            'catalog' => $catalog,
        ])
    @endif

    @if($deleteResourceModalVisible)
        @livewire('resources.delete-resource-modal', [
            'resource' => $resource 
        ])
    @endif

    @if($createCatalogCommentModalVisible)
        @livewire('catalogs.create-catalog-comment-modal', [
            'catalog' => $catalog,
        ])
    @endif

   
</div>
