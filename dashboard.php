<?php
// Include header
include_once('includes/header.php');

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Get user tasks
$tasks = getUserTasks($_SESSION['user_id']);

// Calculate stats
$total_tasks = count($tasks);
$pending_tasks = 0;
$in_progress_tasks = 0;
$completed_tasks = 0;

foreach ($tasks as $task) {
    if ($task['status'] === 'pending') {
        $pending_tasks++;
    } elseif ($task['status'] === 'in_progress') {
        $in_progress_tasks++;
    } elseif ($task['status'] === 'completed') {
        $completed_tasks++;
    }
}

// Check for success or error messages
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<div class="row mb-4">
    <div class="col-md-12">
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <h2>Dashboard</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    </div>
</div>

<!-- Stats Row -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <i class="fas fa-tasks text-primary"></i>
            <h3><?php echo $total_tasks; ?></h3>
            <p>Total Tasks</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="fas fa-clock text-secondary"></i>
            <h3><?php echo $pending_tasks; ?></h3>
            <p>Pending Tasks</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="fas fa-spinner text-info"></i>
            <h3><?php echo $in_progress_tasks; ?></h3>
            <p>In Progress</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card">
            <i class="fas fa-check-circle text-success"></i>
            <h3><?php echo $completed_tasks; ?></h3>
            <p>Completed Tasks</p>
        </div>
    </div>
</div>

<!-- Tasks List -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">My Tasks</h4>
                <a href="add_task.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Task
                </a>
            </div>
            <div class="card-body">
                <?php if (empty($tasks)): ?>
                    <div class="text-center py-5">
                        <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
                        <p class="lead">No tasks found.</p>
                        <a href="add_task.php" class="btn btn-primary">Add Your First Task</a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($task['title']); ?></td>
                                        <td>
                                            <?php 
                                                $priorityClass = '';
                                                switch ($task['priority']) {
                                                    case 'high':
                                                        $priorityClass = 'danger';
                                                        break;
                                                    case 'medium':
                                                        $priorityClass = 'warning';
                                                        break;
                                                    case 'low':
                                                        $priorityClass = 'success';
                                                        break;
                                                }
                                            ?>
                                            <span class="badge bg-<?php echo $priorityClass; ?>">
                                                <?php echo ucfirst(htmlspecialchars($task['priority'])); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <select class="form-select form-select-sm task-status-change" 
                                                    data-task-id="<?php echo $task['id']; ?>">
                                                <option value="pending" <?php echo $task['status'] === 'pending' ? 'selected' : ''; ?>>
                                                    Pending
                                                </option>
                                                <option value="in_progress" <?php echo $task['status'] === 'in_progress' ? 'selected' : ''; ?>>
                                                    In Progress
                                                </option>
                                                <option value="completed" <?php echo $task['status'] === 'completed' ? 'selected' : ''; ?>>
                                                    Completed
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <?php 
                                                if (!empty($task['due_date'])) {
                                                    echo date('M d, Y', strtotime($task['due_date']));
                                                } else {
                                                    echo "No due date";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="view_task.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="delete_task.php?id=<?php echo $task['id']; ?>" 
                                               class="btn btn-sm btn-danger delete-task-btn">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once('includes/footer.php');
?>