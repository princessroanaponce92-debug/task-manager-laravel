# Personal Task Manager - Laravel

## Project Information
- Project Code: WST21-PM-2026-SF
- Student Name: Princess Roana D. Ponce
- Course & Year: BSIT-2 Section-01
- Database Used: MySQL

## Features
- ✅ Add Task
- ✅ View Tasks
- ✅ Edit Task
- ✅ Delete Task
- ✅ Update Status (Pending/Completed)

## Technologies Used
- **Framework:** Laravel 11
- **Database:** SQLite
- **Frontend:** HTML, CSS, Blade Templates
- **Backend:** PHP

## Installation & Setup

### Requirements
- PHP 8.0+
- Composer
- MySQL

### Steps
1. Clone the repository
```bash
   git clone (https://github.com/princessroanaponce92-debug/task-manager-laravel.git)]
   cd task-manager
```

2. Install dependencies
```bash
   composer install
```

3. Configure environment
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Setup database
```bash
   mysql -u root -e "CREATE DATABASE task_manager;"
```

5. Update `.env` file:
```env
   DB_CONNECTION=mysql
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=
```

6. Run migrations
```bash
   php artisan migrate
```

7. Start server
```bash
   php artisan serve
```

8. Open browser: `http://localhost:8000/tasks`

## Project Structure

task-manager/
├── app/
│ ├── Models/Task.php
│ └── Http/Controllers/TaskController.php
├── resources/
│ └── views/
│ ├── layouts/app.blade.php
│ └── tasks/
│ ├── index.blade.php
│ ├── create.blade.php
│ └── edit.blade.php
├── routes/web.php
└── database/migrations/


## How It Works
1. User navigates to `/tasks` to view all tasks
2. Click "Add New" Task to create a new task
3. Enter task details (name, description, due date)
4. Tasks display in a table with status badge
5. Use "Edit" button to modify task
6. Use "Complete" to toggle status
7. Use "Delete" to remove task

## Author
Princess Roana D. Ponce
