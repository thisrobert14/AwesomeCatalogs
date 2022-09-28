<div class="px-4 sm:px-6 lg:px-8">
    <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
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
            <tbody>
                <tr>
                    <td class="relative py-4 pl-4 sm:pl-6  pr-3 text-sm">
                    <div class="font-medium text-gray-500">{{ $resource->title }}</div>
                    </td>
                    <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $resource->description }}</td>         
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex items-center space-x-3">
    <button type="button" disabled class="inline-flex items-center rounded-full border border-transparent bg-indigo-500 px-3 py-1.5 text-xs font-medium text-white shadow-sm mt-2">Leave a comment</button>
    <button 
    wire:click="showCreataResourceCommentModal"
    type="button" class="inline-flex items-center mt-2 rounded-full border border-transparent bg-indigo-500 p-1 text-white shadow-sm hover:bg-indigo-600">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
        </svg>
    </button>
    </div>

    @if($resource->comments->count() < 1)
        <h1 class="mt-10 text-xl font-semibold text-gray-500 w-3/4">There are no comments for this catalog now. Be the first person who post one!</h1>
    @else
        @livewire('resources.resource-comments', [
            'resource' => $resource,
            ])
    @endif

    @if($createResourceCommentModalVisible)
      @livewire('resources.create-resource-comment-modal', [
        'resource' => $resource
        ])
  @endif
</div>

