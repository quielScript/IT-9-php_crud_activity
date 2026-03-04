<?php
  include __DIR__ . "/../dto/UpdateTodoDTO.php";
  include __DIR__ . "/../../repository/todo/TodoRepository.php";

  $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

  if ($id <= 0) {
    header("Location: ../views/home.php?error=invalid_id");
    exit;
  }

  $dto = new UpdateTodoDTO($id);
  $repo = new TodoRepository();
  $updated = $repo->update($dto->id);

  if (!$updated) {
    header("Location: ../../views/home.php?error=not_found");
    exit;
  }

  header("Location: ../../views/home.php?success=true");
?>