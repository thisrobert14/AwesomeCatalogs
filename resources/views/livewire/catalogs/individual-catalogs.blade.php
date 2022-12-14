@if($catalogs->count() < 1) <h1 class="text-xl font-semibold text-blue-900">For now you do not have any Catalog.</h1>
  @else
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-blue-900">Your Catalogs</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all your catalogs where you can see in details the descripiton.</p>
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
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                </tr>
              </thead>
              @foreach($catalogs as $catalog)
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6"><a href="{{ route('show.catalog', ['catalog' => $catalog->id]) }}" class="rounded-xl hover:bg-gray-100 px-2 py-2">{{ ucfirst($catalog->title)}}</a></td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $catalog->description }}</td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif