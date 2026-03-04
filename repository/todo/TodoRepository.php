<?php
  include __DIR__ . "/TodoRepositoryInterface.php";

  class TodoRepository implements TodoRepositoryInterface {
    private mysqli $conn;
    
    public function __construct() {
      include __DIR__ . "/../../config/database.php";
       
      $this->conn = $conn;
    }

    public function store(string $title): void {
      $stmt = $this->conn->prepare("INSERT INTO todos(title) VALUES (?)");
      $stmt->bind_param("s", $title);
      $stmt->execute();
      $stmt->close();
    }

    public function getAll(): array {
      $res = $this->conn->query("SELECT * FROM todos");
      return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id): array {
      $stmt = $this->conn->prepare("SELECT * FROM todos WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result()->fetch_assoc();
      $stmt->close();
      return $result;
    }

    public function update(int $id): array {
        // Get current status
        $stmt = $this->conn->prepare("SELECT is_completed FROM todos WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        $currentStatus = (int)$result["is_completed"];

        // Toggle status (0 -> 1, 1 -> 0)
        // 1 true, 0 = false
        $newStatus = $currentStatus === 1 ? 0 : 1;

        $stmt = $this->conn->prepare("UPDATE todos SET is_completed=? WHERE id=?");
        $stmt->bind_param("ii", $newStatus, $id);
        $stmt->execute();
        $stmt->close();

        return $this->getById($id);
    }

    public function delete(int $id): void {
      $stmt = $this->conn->prepare("DELETE FROM todos WHERE id=?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();
    }

  }
?>