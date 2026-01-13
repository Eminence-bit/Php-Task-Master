# Contributing to PHP Task Master

First off, thank you for considering contributing to PHP Task Master! It's people like you that make this project better for everyone.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [How Can I Contribute?](#how-can-i-contribute)
- [Getting Started](#getting-started)
- [Development Setup](#development-setup)
- [Coding Standards](#coding-standards)
- [Commit Message Guidelines](#commit-message-guidelines)
- [Pull Request Process](#pull-request-process)
- [Reporting Bugs](#reporting-bugs)
- [Suggesting Enhancements](#suggesting-enhancements)
- [Questions](#questions)

## 📜 Code of Conduct

This project and everyone participating in it is governed by our commitment to providing a welcoming and inspiring community for all. By participating, you are expected to uphold this code. Please be respectful and constructive in your interactions.

### Our Standards

- Use welcoming and inclusive language
- Be respectful of differing viewpoints and experiences
- Gracefully accept constructive criticism
- Focus on what is best for the community
- Show empathy towards other community members

## 🤝 How Can I Contribute?

### Types of Contributions

We welcome various types of contributions:

1. **Bug Reports**: Help us identify and fix issues
2. **Feature Requests**: Suggest new features or improvements
3. **Code Contributions**: Fix bugs or implement new features
4. **Documentation**: Improve or add to our documentation
5. **Testing**: Help test the application and report issues
6. **Design**: Improve UI/UX design

## 🚀 Getting Started

### Prerequisites

Before you begin, make sure you have:

- PHP 7.4 or higher installed
- MySQL 5.7 or higher installed
- A web server (Apache/Nginx) with PHP support
- Git installed
- A GitHub account
- Basic knowledge of PHP, MySQL, HTML, CSS, and JavaScript

### Setting Up Your Development Environment

1. **Fork the Repository**
   
   Click the "Fork" button at the top right of the repository page.

2. **Clone Your Fork**

   ```bash
   git clone https://github.com/<YOUR-USERNAME>/Php-Task-Master.git
   cd Php-Task-Master
   ```

3. **Add Upstream Remote**

   ```bash
   git remote add upstream https://github.com/Eminence-bit/Php-Task-Master.git
   ```

4. **Set Up the Database**

   The application will automatically create the database and tables when you first run it. Just make sure your MySQL server is running and the credentials in `config/db.php` are correct.

5. **Configure Your Web Server**

   Point your web server to the project directory or move it to your server's document root.

6. **Test the Installation**

   Open your browser and navigate to `http://localhost/Php-Task-Master` to ensure everything is working.

## 💻 Development Setup

### Project Structure

Familiarize yourself with the project structure:

- `ajax/` - AJAX endpoints for asynchronous operations
- `config/` - Configuration files (database, etc.)
- `css/` - Stylesheets
- `includes/` - Reusable PHP components (header, footer, functions)
- `js/` - JavaScript files
- Root directory - Main PHP pages (index, login, dashboard, etc.)

### Key Files

- `config/db.php` - Database configuration and table creation
- `includes/functions.php` - Core application functions
- `includes/header.php` - Common header with navigation
- `includes/footer.php` - Common footer
- `css/style.css` - Custom styles
- `js/script.js` - Client-side JavaScript

## 📝 Coding Standards

### PHP Coding Standards

Follow these PHP coding standards:

1. **Indentation**: Use 4 spaces for indentation (no tabs)

2. **Naming Conventions**:
   - Variables: `$snake_case`
   - Functions: `camelCase`
   - Classes: `PascalCase`
   - Constants: `UPPER_CASE`

3. **File Structure**:
   ```php
   <?php
   // Comments about the file
   
   // Include statements
   include_once('includes/header.php');
   
   // Main code
   
   // Include footer
   include_once('includes/footer.php');
   ?>
   ```

4. **Security Best Practices**:
   - Always use prepared statements for database queries
   - Use `htmlspecialchars()` for output escaping
   - Validate and sanitize all user input
   - Use `password_hash()` and `password_verify()` for passwords
   - Check user authentication on protected pages

5. **Code Comments**:
   - Add comments for complex logic
   - Document functions with their purpose and parameters
   - Keep comments concise and relevant

### HTML/CSS Standards

1. **HTML**:
   - Use semantic HTML5 elements
   - Proper indentation (2 spaces)
   - Close all tags
   - Use Bootstrap classes where appropriate

2. **CSS**:
   - Use meaningful class names
   - Follow BEM naming convention when applicable
   - Group related styles together
   - Add comments for major sections

### JavaScript Standards

1. Use ES6+ features where appropriate
2. Use `const` and `let` instead of `var`
3. Use meaningful variable names
4. Add comments for complex logic
5. Handle errors appropriately

### Database Standards

1. **Table Naming**: Use lowercase with underscores (e.g., `user_tasks`)
2. **Column Naming**: Use lowercase with underscores (e.g., `created_at`)
3. **Primary Keys**: Always use `id` as the primary key name
4. **Foreign Keys**: Use `table_id` format (e.g., `user_id`)

## 📬 Commit Message Guidelines

Write clear and meaningful commit messages:

### Format

```
<type>: <subject>

<body (optional)>

<footer (optional)>
```

### Types

- `feat`: A new feature
- `fix`: A bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, no code change)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

### Examples

```
feat: Add task filtering by priority

Add a dropdown filter on the dashboard to filter tasks by priority level (low, medium, high).
```

```
fix: Prevent SQL injection in task creation

Replace string concatenation with prepared statements in the createTask function.
```

```
docs: Update installation instructions

Add detailed steps for XAMPP setup on Windows.
```

## 🔄 Pull Request Process

### Before Submitting

1. **Update Your Fork**
   ```bash
   git fetch upstream
   git checkout main
   git merge upstream/main
   ```

2. **Create a Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make Your Changes**
   - Write clear, self-documenting code
   - Follow the coding standards
   - Test your changes thoroughly

4. **Test Your Changes**
   - Test all functionality manually
   - Ensure no existing features are broken
   - Check for PHP errors and warnings
   - Test on different browsers if applicable

5. **Commit Your Changes**
   ```bash
   git add .
   git commit -m "feat: your feature description"
   ```

6. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

### Submitting the Pull Request

1. Go to your fork on GitHub
2. Click "New Pull Request"
3. Select your feature branch
4. Fill in the PR template with:
   - **Title**: Clear, concise description
   - **Description**: What changes you made and why
   - **Related Issue**: Link any related issues
   - **Screenshots**: If applicable, add screenshots
   - **Testing**: Describe how you tested the changes

### PR Review Process

- Maintainers will review your PR
- Address any requested changes
- Once approved, your PR will be merged
- Your contribution will be acknowledged

### PR Checklist

- [ ] Code follows the project's coding standards
- [ ] Self-review of the code completed
- [ ] Comments added for complex code
- [ ] No console errors or warnings
- [ ] Tested manually on local environment
- [ ] Documentation updated if needed
- [ ] No breaking changes to existing features

## 🐛 Reporting Bugs

### Before Submitting a Bug Report

1. Check the [existing issues](https://github.com/Eminence-bit/Php-Task-Master/issues) to avoid duplicates
2. Update to the latest version to see if the bug still exists
3. Collect information about the bug

### How to Submit a Bug Report

Create an issue with the following information:

**Title**: Clear, descriptive title

**Description**:
```
**Describe the bug**
A clear description of what the bug is.

**To Reproduce**
Steps to reproduce the behavior:
1. Go to '...'
2. Click on '...'
3. Scroll down to '...'
4. See error

**Expected behavior**
What you expected to happen.

**Screenshots**
If applicable, add screenshots.

**Environment:**
- OS: [e.g., Windows 10]
- Browser: [e.g., Chrome 95]
- PHP Version: [e.g., 7.4]
- MySQL Version: [e.g., 5.7]

**Additional context**
Any other relevant information.
```

## 💡 Suggesting Enhancements

### Before Submitting an Enhancement

1. Check if the enhancement has already been suggested
2. Make sure your enhancement fits the project's scope
3. Consider if it would be useful to most users

### How to Submit an Enhancement Suggestion

Create an issue with:

**Title**: Clear, descriptive title

**Description**:
```
**Is your feature request related to a problem?**
A clear description of the problem.

**Describe the solution you'd like**
A clear description of what you want to happen.

**Describe alternatives you've considered**
Any alternative solutions or features you've considered.

**Additional context**
Any other context, screenshots, or mockups.
```

## ❓ Questions

If you have questions about contributing:

1. Check the [README.md](README.md) first
2. Look through [existing issues](https://github.com/Eminence-bit/Php-Task-Master/issues)
3. Create a new issue with the "question" label

## 🙏 Thank You!

Your contributions make this project better. Whether it's a bug fix, feature addition, or documentation improvement, every contribution is valued and appreciated!

---

**Happy Coding! 🎉**
