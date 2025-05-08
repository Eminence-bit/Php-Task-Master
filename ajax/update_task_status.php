<?php
// Include functions
require_once('../includes/functions.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Check if required parameters are provided
if (!isset($_POST['task_id']) || !isset($_POST['status'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters']);
    exit;
}

$task_id = $_POST['task_id'];
$status = $_POST['status'];
$user_id = $_SESSION['user_id'];

// Get current task to preserve other values
$task = getTask($task_id, $user_id);

if (!$task) {
    echo json_encode(['success' => false, 'message' => 'Task not found or you do not have permission']);
    exit;
}

// Update only the status
if (updateTask($task_id, $user_id, $task['title'], $task['description'], $status, $task['priority'], $task['due_date'])) {
    echo json_encode(['success' => true, 'message' => 'Task status updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update task status']);
}
?>