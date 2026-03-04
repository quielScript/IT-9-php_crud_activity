<?php
  interface TodoRepositoryInterface {
    public function store(string $title): void;
    public function getAll(): array;
    public function getById(int $id): array;
    public function update(int $id): array;
    public function delete(int $id): void;
  }
?>