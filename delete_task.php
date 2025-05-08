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

// Delete the task
if (deleteTask($task_id, $_SESSION['user_id'])) {
    $_SESSION['success_message'] = "Task deleted successfully!";
} else {
    $_SESSION['error_message'] = "Failed to delete task or you don't have permission to delete it.";
}

// Redirect back to dashboard
header('Location: dashboard.php');
exit;
?>