<div @class([
    "overflow-hidden bg-white shadow sm:rounded-lg mb-4 pb-4 px-4",
    "ml-6" => $comment->parent
  ])>
  <div class="pt-5 sm:p-6 flex">
    <div class="w-10 flex flex-col justify-between">
      <x-general.author-photo :user="$comment->author"/>
      <livewire:like-button :$comment/>
    </div>
    <div
      id="comment-content"
      class="flex-1 flex flex-col justify-start px-4"
    >
      <span class="text-xs mb-2 text-gray-500">
        <a
          class="text-indigo-500"
          href="/users/{{ $comment->author->id }}"
        >{{ $comment->author->name }} </a>
        - {{ date('d/m/y H:i', strtotime($comment->created_at)) }}
      </span>
      <p class="text-sm">{{ $comment->content }}</p>
    </div>
  </div>
  <div
    id="comment-interaction"
    class="flex justify-end"
  >
    <div class="pr-4 pt-1">
      <button
        role="button"
        class="text-xs text-budeguerGreen underline"
        wire:click.prevent="create_comment"
      >Responder
      </button>
    </div>
  </div>
</div>


