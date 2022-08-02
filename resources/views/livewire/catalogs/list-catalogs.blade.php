<!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-xl font-semibold text-blue-900">Catalogs</h1>
      <p class="mt-2 text-sm text-gray-700">A list of all catalogs in our site including their author and title, check them out.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="text-center">
  <svg class="mx-auto h-8 w-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
  </svg>
  @if(auth()->user()->catalogs()->count() < 0 ) 
  <h3 class="mt-2 text-sm font-medium text-gray-900">No catalogs</h3>
  <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
  @else
  <h3 class="mt-2 text-sm font-medium text-blue-900">You have {{ auth()->user()->catalogs()->count() }} Personal Catalogs</h3>
  @endif
  <div class="mt-6">
    <a href="{{ route('show.create-catalog') }}">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      <!-- Heroicon name: solid/plus -->
      <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
      </svg>
      New Project
    </button>
    </a>
  </div>
</div>

  </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            @foreach($catalogs as $catalog)
            
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ ucfirst($catalog->title)}}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $catalog->author->email }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                  @if(auth()->user() == $catalog->author)
                  <a href="{{ route('show.catalog', ['catalog' => $catalog->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                  @endif
                </td>
              </tr>
            </tbody>
            
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




          






          
      <!-- <div class="text-center">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    @if(auth()->user()->catalogs()->count() < 0)
    <h3 class="mt-2 text-sm font-medium text-gray-900">No catalogs</h3>
    <p class="mt-1 text-sm text-gray-500">Get started by creating a new Catalog.</p>
    @else
    <h3 class="mt-2 text-sm font-medium text-blue-900">{{ auth()->user()->catalogs->count()}} Personal Catalogs</h3>
    @endif
    <div class="mt-6">
    <a href="{{ route('show.create-catalog') }}"><button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
      </svg>
      New Project
    </button></a>
  </div>
</div> -->
