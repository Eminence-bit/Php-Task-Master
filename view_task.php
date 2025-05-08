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

// Get task details
$task = getTask($task_id, $_SESSION['user_id']);

// If task doesn't exist or doesn't belong to user
if (!$task) {
    $_SESSION['error_message'] = "Task not found or you don't have permission to view it.";
    header('Location: dashboard.php');
    exit;
}

// Format status and priority for display
$status_class = '';
switch ($task['status']) {
    case 'pending':
        $status_class = 'secondary';
        break;
    case 'in_progress':
        $status_class = 'info';
        break;
    case 'completed':
        $status_class = 'success';
        break;
}

$priority_class = '';
switch ($task['priority']) {
    case 'high':
        $priority_class = 'danger';
        break;
    case 'medium':
        $priority_class = 'warning';
        break;
    case 'low':
        $priority_class = 'success';
        break;
}
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card task-card priority-<?php echo $task['priority']; ?>">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Task Details</h4>
                <div>
                    <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title"><?php echo htmlspecialchars($task['title']); ?></h3>
                
                <div class="row mb-4 mt-4">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                        <span class="badge bg-<?php echo $status_class; ?> ms-2">
                            <?php echo ucfirst(htmlspecialchars(str_replace('_', ' ', $task['status']))); ?>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <strong>Priority:</strong>
                        <span class="badge bg-<?php echo $priority_class; ?> ms-2">
                            <?php echo ucfirst(htmlspecialchars($task['priority'])); ?>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <strong>Due Date:</strong>
                        <span class="ms-2">
                            <?php 
                                if (!empty($task['due_date'])) {
                                    echo date('M d, Y', strtotime($task['due_date']));
                                } else {
                                    echo "No due date";
                                }
                            ?>
                        </span>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>Description</h5>
                    <div class="card">
                        <div class="card-body bg-light">
                            <?php 
                                if (!empty($task['description'])) {
                                    echo nl2br(htmlspecialchars($task['description']));
                                } else {
                                    echo "<em>No description provided</em>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <strong>Created On:</strong>
                        <span class="ms-2">
                            <?php echo date('M d, Y H:i', strtotime($task['created_at'])); ?>
                        </span>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="delete_task.php?id=<?php echo $task['id']; ?>" 
                           class="btn btn-danger delete-task-btn">
                            <i class="fas fa-trash"></i> Delete Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once('includes/footer.php');
?>