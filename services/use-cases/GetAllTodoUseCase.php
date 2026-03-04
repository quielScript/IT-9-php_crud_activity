<?php
  include __DIR__ . "/../../repository/todo/TodoRepository.php";
  
  $repo = new TodoRepository();
  $todos = $repo->getAll();
?>