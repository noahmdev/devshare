# Devshare

A Reddit-inspired web application for sharing programming tips, code snippets, and knowledge with other developers.

## Overview

Devshare is a web application built with Laravel that allows developers to share programming tips and code snippets, discuss technical topics, and learn from one another.

Users can publish posts, leave comments, and vote on contributions, creating a community-driven platform for sharing technical knowledge.

This project was developed as part of my learning journey to strengthen my understanding of Laravel, MVC architecture, authentication, RESTful principles, database relationships, and automated testing.

## Features

* **Post management:** Create and view programming-related posts.
* **Comments:** Discuss posts and share additional insights.
* **Voting system:** Interact with posts through votes.
* **User authentication:** Register, log in, and access authenticated features.
* **Database integration:** Store and manage posts, comments, votes, and user data.

## Tech Stack

* **Backend:** Laravel, PHP
* **Frontend:** Blade, Tailwind CSS
* **Database:** SQLite
* **Testing:** Pest
* **Build tool:** Vite

## Installation

### Prerequisites

Make sure you have PHP, Composer, Node.js, npm, and a supported database installed.

### 1. Clone the repository

```bash
git clone https://github.com/noahmdev/devShare.git
cd devshare
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Configure the environment

Create your environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database credentials in the `.env` file.

### 4. Run database migrations

```bash
php artisan migrate
```

If the project includes seeders and you want to populate the database with sample data, run:

```bash
php artisan db:seed
```

### 5. Start the development servers

Start the Laravel server:

```bash
php artisan serve
```

In a separate terminal, start the frontend development server:

```bash
npm run dev
```

The application will be available at the local URL provided by Laravel, usually `http://127.0.0.1:8000`.

## Screenshots



## What I Learned

Through this project, I gained practical experience with:

* Building web applications using Laravel's MVC architecture.
* Implementing user authentication and access control.
* Designing RESTful routes and handling HTTP requests.
* Working with Eloquent models and database relationships.
* Managing relational data through migrations, factories, and seeders.
* Writing automated tests with Pest.

## Known Limitations

* The user interface is not yet fully responsive and may not display optimally on mobile devices.

## Upcoming Features

* Implement search functionality to find posts by title and content.
* Add a tagging system to categorize posts.
* Support Markdown formatting in post descriptions.

## License

This project was created for learning purposes and as part of my developer portfolio.
