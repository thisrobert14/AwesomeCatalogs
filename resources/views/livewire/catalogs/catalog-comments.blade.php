<div class="bg-white mt-14 px-4 py-2 rounded-xl">
  <div>
    <h2 class="sr-only">Customer Reviews</h2>
@foreach($comments as $comment)
    <div class="-my-10 py-10">
      <div class="flex space-x-4 text-sm text-gray-500">
        <div class="flex-none py-10">
          <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
        </div>
        <div class="flex-1 py-10">
          <h3 class="font-medium text-gray-900">{{ $comment->owner->first_name}}</h3>
          <p><time datetime="2021-07-16">July 16, 2021</time></p>

          <div class="prose prose-sm mt-4 max-w-none text-gray-500">
            <p>{{ $comment->body }}</p>          
            </div>
        </div>
      </div>
    </div>

    <hr>
    @endforeach
  </div>
</div>
