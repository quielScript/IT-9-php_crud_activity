<?php
  class CreateTodoDTO {
    public string $title;

    public function __construct(string $title) {
      $this->title = $title;
    }
  }
?>