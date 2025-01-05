<div
  id="comments-box"
  class="container mx-auto sm:px-6 lg:px-8 mt-6"
>
  @foreach($task->comments->whereNull('parent') as $comment)
    <livewire:comment
      :$comment
      :key="$comment->id"
    />
    @foreach($comment->children as $child)
      <livewire:comment
        :comment="$child"
        :key="$child->id"
      />
    @endforeach
  @endforeach
</div>
