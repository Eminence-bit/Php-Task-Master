# PHP Task Master

A simple yet powerful task management system built with PHP and MySQL. PHP Task Master helps you organize, track, and manage your tasks efficiently with an intuitive user interface.

## 🌟 Features

- **User Authentication**: Secure user registration and login system with password hashing
- **Task Management**: Create, read, update, and delete tasks with ease
- **Task Status Tracking**: Track tasks through different stages (Pending, In Progress, Completed)
- **Priority Levels**: Assign priority levels to tasks (Low, Medium, High)
- **Due Dates**: Set and track due dates for your tasks
- **Dashboard**: Visual dashboard with task statistics and overview
- **Real-time Updates**: AJAX-powered status updates without page reloads
- **Responsive Design**: Mobile-friendly interface using Bootstrap 5

## 📋 Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Web browser (Chrome, Firefox, Safari, Edge)

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/Eminence-bit/Php-Task-Master.git
cd Php-Task-Master
```

### 2. Configure Web Server

Move the project to your web server's document root:

**For XAMPP (Windows/Mac/Linux):**
```bash
# Move to htdocs
cp -r Php-Task-Master /path/to/xampp/htdocs/
```

**For WAMP (Windows):**
```bash
# Move to www
cp -r Php-Task-Master C:\wamp64\www\
```

**For LAMP (Linux):**
```bash
# Move to /var/www/html
sudo cp -r Php-Task-Master /var/www/html/
```

### 3. Database Configuration

The application automatically creates the database and tables on first run. However, you need to ensure your database credentials are correct.

1. Open `config/db.php`
2. Update the database configuration if needed:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'task_manager');
```

### 4. Start Your Web Server

- **XAMPP/WAMP**: Start Apache and MySQL from the control panel
- **LAMP**: Ensure Apache and MySQL services are running
  ```bash
  sudo systemctl start apache2
  sudo systemctl start mysql
  ```

### 5. Access the Application

Open your web browser and navigate to:
```
http://localhost/Php-Task-Master
```

## 💻 Usage

### Getting Started

1. **Register an Account**
   - Click "Register" on the homepage
   - Fill in your username, email, and password
   - Submit the registration form

2. **Login**
   - Use your credentials to log in
   - You'll be redirected to your dashboard

3. **Create a Task**
   - Click "Add Task" button on the dashboard
   - Fill in task details:
     - Title (required)
     - Description (optional)
     - Priority (Low/Medium/High)
     - Due Date (optional)
   - Click "Add Task" to save

4. **Manage Tasks**
   - **View**: Click the eye icon to view task details
   - **Edit**: Click the pencil icon to modify task information
   - **Delete**: Click the trash icon to remove a task
   - **Update Status**: Use the dropdown to change task status

### Dashboard Overview

The dashboard displays:
- Total number of tasks
- Number of pending tasks
- Number of tasks in progress
- Number of completed tasks
- A table with all your tasks

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL
- **Frontend**: 
  - HTML5
  - CSS3
  - JavaScript (ES6+)
  - Bootstrap 5
  - Font Awesome Icons
- **AJAX**: For asynchronous operations

## 📁 Project Structure

```
Php-Task-Master/
├── ajax/
│   └── update_task_status.php    # AJAX endpoint for status updates
├── config/
│   └── db.php                    # Database configuration and setup
├── css/
│   └── style.css                 # Custom styles
├── includes/
│   ├── header.php                # Common header
│   ├── footer.php                # Common footer
│   └── functions.php             # Core functions
├── js/
│   └── script.js                 # JavaScript functionality
├── index.php                     # Landing page
├── register.php                  # User registration
├── login.php                     # User login
├── logout.php                    # User logout
├── dashboard.php                 # Main dashboard
├── add_task.php                  # Create new task
├── edit_task.php                 # Edit existing task
├── view_task.php                 # View task details
├── delete_task.php               # Delete task
├── README.md                     # Documentation
└── CONTRIBUTING.md               # Contribution guidelines
```

## 🔒 Security Features

- Password hashing using PHP's `password_hash()` function
- Prepared statements to prevent SQL injection
- Session-based authentication
- User authorization checks on all protected pages
- XSS prevention through `htmlspecialchars()`

## 🤝 Contributing

Contributions are welcome! Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## 📝 License

This project is open source. Please check with the repository owner for license details.

## 👥 Author

**Eminence-bit**
- GitHub: [@Eminence-bit](https://github.com/Eminence-bit)

## 🐛 Known Issues

- None at the moment

## 📮 Support

If you have any questions or need help, please:
1. Check the [Issues](https://github.com/Eminence-bit/Php-Task-Master/issues) page
2. Create a new issue if your problem isn't already listed
3. Provide detailed information about your problem

## 🙏 Acknowledgments

- Bootstrap team for the excellent CSS framework
- Font Awesome for the icons
- The PHP community for continuous support and documentation

## 📈 Future Enhancements

- Task categories and tags
- Task search and filtering
- Task sharing and collaboration
- Email notifications for due dates
- Export tasks to CSV/PDF
- Mobile app version
- Dark mode support

---

**Made with ❤️ by Eminence-bit**
