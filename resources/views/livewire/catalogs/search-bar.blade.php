<div>
    <input wire:model="search" type="search" placeholder="Search catalogs by title..." class="px-2 py-1 rounded-md w-64">
<div>
<ul role="list" class="divide-y divide-gray-200 absolute">
  @foreach($searchResults as $result)
  <li class="flex py-1 bg-gray-100 px-1 hover:bg-gray-50 cursor-pointer w-48 rounded-xl">
    <div class="ml-3">
      <a href="{{ route('show.catalog', ['catalog' => $result['slug']]) }}"><p class="text-sm font-medium text-gray-900">{{ $result['title'] }}</p></a>
      <p class="text-sm text-gray-500">{{ $result['category'] }}</p>
    </div>
  </li>
  @endforeach
</ul>

</div>

</div>