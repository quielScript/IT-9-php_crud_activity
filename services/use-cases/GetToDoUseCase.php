<?php
  include __DIR__ . "/../dto/GetTodoDTO.php";
  include __DIR__ . "/../../repository/todo/TodoRepository.php";

  $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

  if ($id <= 0) {
    http_response_code(400);
    header("Location: ../../views/home.php?error=invalid_id");
    exit;
  }

  $dto = new GetTodoDTO($id);
  $repo = new TodoRepository();
  $todo = $repo->getById($dto->id);

  if (!$todo) {
    http_response_code(404);
    header("Location: ../../views/home.php?error=not_found");
    exit;
  }

  return $todo;
?>