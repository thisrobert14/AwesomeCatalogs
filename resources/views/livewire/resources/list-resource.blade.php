
<div class="relative overflow-hidden bg-white py-16">
  <div class="hidden lg:absolute lg:inset-y-0 lg:block lg:h-full lg:w-full">
    <div class="relative mx-auto h-full max-w-prose text-lg" aria-hidden="true">
      <svg class="absolute top-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
      </svg>
      <svg class="absolute top-1/2 right-full -translate-y-1/2 -translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
      </svg>
      <svg class="absolute bottom-12 left-full translate-x-32 transform" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
      </svg>
    </div>
  </div>
  <div class="relative px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-prose text-lg">
      <h1>
        <span class="block text-center text-lg font-semibold text-indigo-600">Introducing</span>
        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-gray-700 sm:text-4xl">{{ $resource->title}} </span>
      </h1>
    </div>
    <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
      <h2 class="px-4 py-3 bg-gray-50 hover:bg-gray-100 text-xl font-semibold text-gray-700 rounded-xl">{{ $resource->description }}</h2>
        <!-- This example requires Tailwind CSS v2.0+ -->
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
    <hr>
    @if($resource->comments->count() > 0)
        @livewire('resources.resource-comments', [
            'resource' => $resource,
            ])
    @endif
    </div>
    @if($createResourceCommentModalVisible)
      @livewire('resources.create-resource-comment-modal', [
        'resource' => $resource
        ])
  @endif
  </div>
 
</div>
