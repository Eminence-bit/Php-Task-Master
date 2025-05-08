<?php
// Include header
include_once('includes/header.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Check if task ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: dashboard.php');
    exit;
}

$task_id = $_GET['id'];
$errors = [];

// Get task details
$task = getTask($task_id, $_SESSION['user_id']);

// If task doesn't exist or doesn't belong to user
if (!$task) {
    $_SESSION['error_message'] = "Task not found or you don't have permission to edit it.";
    header('Location: dashboard.php');
    exit;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $status = $_POST['status'];
    $priority = $_POST['priority'];
    $due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
    
    // Validate form data
    if (empty($title)) {
        $errors[] = "Title is required";
    }
    
    if (empty($priority)) {
        $errors[] = "Priority is required";
    }
    
    if (empty($status)) {
        $errors[] = "Status is required";
    }
    
    // If no errors, update task
    if (empty($errors)) {
        if (updateTask($task_id, $_SESSION['user_id'], $title, $description, $status, $priority, $due_date)) {
            // Set success message and redirect
            $_SESSION['success_message'] = "Task updated successfully!";
            header('Location: dashboard.php');
            exit;
        } else {
            $errors[] = "Failed to update task. Please try again.";
        }
    }
} else {
    // Fill form with existing task data
    $title = $task['title'];
    $description = $task['description'];
    $status = $task['status'];
    $priority = $task['priority'];
    $due_date = $task['due_date'];
}
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card task-form">
            <div class="card-header">
                <h4>Edit Task</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($description); ?></textarea>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="pending" <?php echo $status === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="in_progress" <?php echo $status === 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="completed" <?php echo $status === 'completed' ? 'selected' : ''; ?>>Completed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="priority" class="form-label">Priority *</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option value="low" <?php echo $priority === 'low' ? 'selected' : ''; ?>>Low</option>
                                <option value="medium" <?php echo $priority === 'medium' ? 'selected' : ''; ?>>Medium</option>
                                <option value="high" <?php echo $priority === 'high' ? 'selected' : ''; ?>>High</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control datepicker" id="due_date" name="due_date" 
                                   value="<?php echo htmlspecialchars($due_date); ?>">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once('includes/footer.php');
?>