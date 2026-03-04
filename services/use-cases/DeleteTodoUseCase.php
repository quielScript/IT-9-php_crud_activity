<?php
  include __DIR__ . "/../dto/DeleteTodoDTO.php";
  include __DIR__ . "/../../repository/todo/TodoRepository.php";

  $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

  if ($id <= 0) {
    header("Location: ../views/home.php?error=invalid_id");
    exit;
  }

  $dto = new DeleteTodoDTO($id);
  $repo = new TodoRepository();
  $repo->delete($dto->id);

  header("Location: ../../views/home.php?status=success");
?>