<?php
  include __DIR__ . "/../dto/CreateTodoDTO.php";
  include __DIR__ . "/../../repository/todo/TodoRepository.php";

  $title = $_POST["title"] ?? "";

  if (empty(trim($title))) {
    header("Location: ../../views/home.php?error=empty_title");
    exit;
  }

  $todo = new CreateTodoDTO($title);
  $repo = new TodoRepository();
  $repo->store($todo->title);

  header("Location: ../../views/home.php?status=success");
?>