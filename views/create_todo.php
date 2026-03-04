<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <title>Add Todo</title>
</head>
<body>
  <main>
    <div class="container min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h1 class="text-center mb-4">Add Todo</h1>

      <?php if (isset($_GET["error"]) && $_GET["error"] === "empty_title"): ?>
        <div class="alert alert-danger w-50" role="alert">
          Title cannot be empty. Please enter a todo.
        </div>
      <?php endif; ?>

      <form action="../services/use-cases/CreateTodoUseCase.php" method="POST" class="w-50">
        <div class="mb-3">
          <label for="title" class="form-label">Todo</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Enter your todo..." required>
        </div>
        <div class="d-flex align-items-center justify-content-end gap-3">
          <a class="btn btn-outline-secondary" href="home.php">
            <i class="fa-solid fa-arrow-left"></i> Back
          </a>
          <button type="submit" class="btn btn-primary">
            Add <i class="fa-solid fa-plus"></i>
          </button>
        </div>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>