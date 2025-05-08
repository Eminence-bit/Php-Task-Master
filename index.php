<?php
// Include header
include_once('includes/header.php');

// Redirect to dashboard if user is logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>

<div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="display-4 mt-5">Task Management System</h1>
        <p class="lead">A simple and efficient way to manage your tasks</p>
        <div class="mt-4">
            <a href="register.php" class="btn btn-primary btn-lg me-2">Register</a>
            <a href="login.php" class="btn btn-outline-secondary btn-lg">Login</a>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fas fa-tasks fa-3x mb-3 text-primary"></i>
                        <h3>Organize Tasks</h3>
                        <p>Easily organize and prioritize your tasks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-3x mb-3 text-success"></i>
                        <h3>Track Progress</h3>
                        <p>Track your task completion and progress</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <i class="fas fa-bell fa-3x mb-3 text-warning"></i>
                        <h3>Set Priorities</h3>
                        <p>Set priorities and due dates for your tasks</p>
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