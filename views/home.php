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
  <title>Todo App</title>
</head>
<body>
  <?php
    include __DIR__ . "/../services/use-cases/GetAllTodoUseCase.php";
  ?>
  <main>
    <div class="container">
      <header>
        <div class="d-flex align-items-center justify-content-between mt-5">
          <h1 class="fs-3 fw-bold">Todo App</h1>
          <a href="create_todo.php" class="btn btn-primary">Add Todo <i class="fa-solid fa-plus"></i></a>
        </div>
      </header>

      <?php if (isset($_GET["success"])): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          Action completed successfully!
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET["error"])): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          Something went wrong. Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <table class="table table-striped table-bordered mt-4">
        <thead>
          <tr>
            <th>Todo</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($todos)): ?>
            <tr>
              <td colspan="3" class="text-center">Nothing to do...</td>
            </tr>
          <?php else: ?>
            <?php foreach ($todos as $todo): ?>
              <tr>
                <td class="align-middle">
                  <?= htmlspecialchars($todo["title"]) ?>
                </td>
                <td class="align-middle">
                  <?php if ($todo["is_completed"]): ?>
                    <span class="badge rounded-pill text-bg-success">Complete</span>
                  <?php else: ?>
                    <span class="badge rounded-pill text-bg-danger">Incomplete</span>
                  <?php endif; ?>
                </td>
                <td class="text-center align-middle">
                  <div class="d-flex align-items-center justify-content-center gap-3">

                    <!-- Toggle completion -->
                    <form action="../services/use-cases/UpdateTodoUseCase.php" method="POST">
                      <input type="hidden" name="id" value="<?= $todo["id"] ?>">
                      <button type="submit" class="btn btn-sm <?= $todo["is_completed"] ? 'btn-outline-secondary' : 'btn-outline-success' ?>" title="Toggle Status">
                        <i class="fa-solid <?= $todo["is_completed"] ? 'fa-rotate-left' : 'fa-check' ?>"></i>
                      </button>
                    </form>

                    <!-- Delete -->
                    <form action="../services/use-cases/DeleteTodoUseCase.php" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this todo?')">
                      <input type="hidden" name="id" value="<?= $todo["id"] ?>">
                      <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>

                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>