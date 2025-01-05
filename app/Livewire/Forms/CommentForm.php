<?php

  namespace App\Livewire\Forms;

  use App\Models\Comment;
  use Livewire\Attributes\Validate;
  use Livewire\Form;

  class CommentForm extends Form {
    public ?Comment $comment;

    #[Validate('required|max:5000')]
    public string $content;
    public int $task_id;
    public int $parent_id;
    public int $author_id;

    public function setComment(Comment $comment): void {
      $this->comment = $comment;
      $this->content = $comment->content;
      $this->task_id = $comment->task_id;
      $this->parent_id = $comment->parent_id;
      $this->author_id = $comment->author_id;
    }

    public function store(): void {
      $this->validate();

      Comment::create($this->only(['content', 'task_id', 'parent_id', 'author_id']));
    }

    public function update(): void {
      $this->validate();

      $this->comment->update(
        $this->only(['content'])
      );
    }
  }
