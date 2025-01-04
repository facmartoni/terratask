<div @class([
    "overflow-hidden bg-white shadow sm:rounded-lg mb-4 pb-4 px-4",
    "ml-6" => $comment->parent
  ])>
  <div class="py-5 sm:p-6 flex">
    <div class="w-10 h-full">
      <livewire:author-photo :user="$comment->author"/>
    </div>
    <div id="comment-content" class="flex-1 flex flex-col justify-start px-4">
      <span class="text-xs mb-2 text-gray-500">{{ $comment->created_at }}</span>
      <p class="text-sm">{{ $comment->content }}</p>
    </div>
  </div>
  <div id="comment-interaction" class="flex justify-between">
    <livewire:like-button
      :liked="$this->liked()"
      :comment_id="$comment->id"
      n_likes="{{ $comment->likes->count() }}"
    />
    <div>Reply</div>
  </div>
</div>


