// Task Management System JavaScript

// Initialize datepicker for due date fields
$(document).ready(function () {
  // If we're using a date input
  if ($(".datepicker").length) {
    $(".datepicker").attr("min", new Date().toISOString().split("T")[0]);
  }

  // Setup task status change handling
  $(".task-status-change").on("change", function () {
    const taskId = $(this).data("task-id");
    const status = $(this).val();

    // AJAX call to update task status
    $.ajax({
      url: "/ajax/update_task_status.php",
      type: "POST",
      data: {
        task_id: taskId,
        status: status,
      },
      success: function (response) {
        const data = JSON.parse(response);
        if (data.success) {
          // Show success message
          showAlert("success", "Task status updated successfully!");
        } else {
          // Show error message
          showAlert("danger", "Failed to update task status!");
        }
      },
      error: function () {
        // Show error message
        showAlert("danger", "An error occurred while updating task status!");
      },
    });
  });

  // Delete task confirmation
  $(".delete-task-btn").on("click", function (e) {
    if (!confirm("Are you sure you want to delete this task?")) {
      e.preventDefault();
    }
  });
});

// Function to show alert messages
function showAlert(type, message) {
  const alertHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

  // Add alert to the top of the container
  $(".container").prepend(alertHTML);

  // Auto close alert after 3 seconds
  setTimeout(function () {
    $(".alert").alert("close");
  }, 3000);
}
