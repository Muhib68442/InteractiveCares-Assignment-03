# Assignment : 03

### Name : Md. Muhibbur Rahman

### Email: muhib2929@gmail.com

---

# BookStock – Simple Book Management System

### BookStock is a lightweight web-based book management system built with Laravel.

### It allows managing books, authors, and categories with file uploads for book covers.

---

### Default Admin Login

- Email: admin@bookstock.com
- Password: 12345678

---

## Features

- User authentication (login, registration, password change)
- CRUD for Books, Authors, Categories
- File upload for book covers
- Book listing with author and category names
- Count of books per author/category

## System Design

- Database: Users, Books, Authors, Categories
- Books Module: Manage books with cover upload, author & category assignment
- Authors Module: Add, edit, delete authors and view book count per author
- Categories Module: Add, edit, delete categories and view book count per category
- Authentication: Custom session-based login and access control
- File Storage: Book covers stored in public storage via Laravel

## Installation & Setup

- Clone repository

```
git clone https://github.com/Muhib68442/BookStock
cd BookStock
```

- Install dependencies

```
composer install
```

- Set up .env and generate key

```
cp .env.example .env
php artisan key:generate
```

- Set database credentials in .env.

- Run migrations and seeders

```
php artisan migrate
php artisan db:seed
```

- Create storage link for images

```
php artisan storage:link
```

- Run the application

```
php artisan serve
```

- Access the application at http://127.0.0.1:8000

## Notes

- Validation rules applied for all forms
- Custom middleware ensures access control
- Uses Laravel DB facade for all queries (no Eloquent)
- Images stored publicly and paths saved in DB
