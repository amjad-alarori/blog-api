# Laravel Blog API

This is a Laravel application that provides an API for managing blog posts. It allows users to perform CRUD operations (Create, Read, Update, Delete) on blog posts through the API endpoints.

## Features

- User authentication using JWT (JSON Web Tokens)
- Create, read, update, and delete blog posts
- Automatically generate slugs for blog posts based on the title
- Secure password storage using bcrypt

## Prerequisites

Before running the project, please ensure that you have the following installed:

- Docker: Docker is a platform that allows you to automate the deployment, scaling, and management of applications using containerization.

## Installation

1. Clone the repository:

   ```shell
   git clone https://github.com/amjad-alarori/blog-api.git

2. Change into the project directory:
    ```shell
    cd laravel-blog-api

3. Install the project dependencies:
    ```shell
    composer install

4. Set up the environment variables:
    ```shell
    cp .env.example .env

Edit the .env file and configure the database settings and other environment variables as needed.


5. Generate the application key:
    ```shell
    php artisan key:generate

6. Start the Laravel Sail containers:
    ```shell
   ./vendor/bin/sail up -d

7. Create a new user with administrative privileges:
    ```shell
   ./vendor/bin/sail artisan tinker

8. Once in the tinker shell, run the following command:
    ```shell
   \App\Models\User::create(['username' => 'admin', 'password' => bcrypt('admin')]);

This will create a new user with the username 'admin' and password 'admin'. Feel free to change these credentials as needed.


## You're ready to use the API!

## API Endpoints

### Authentication

- `POST /api/login`: Authenticate the user and obtain a JWT token.

## Blog Posts

This Laravel application provides API endpoints for managing blog posts.

### Get All Blog Posts

Returns a list of all blog posts.

- **URL:** `/api/blog`
- **Method:** `GET`
- **Response:** JSON

### Get a Specific Blog Post

Returns a specific blog post identified by its slug.

- **URL:** `/api/blog/{slug}`
- **Method:** `GET`
- **Response:** JSON

### Create a New Blog Post

Creates a new blog post.

- **URL:** `/api/blog`
- **Method:** `POST`
- **Request Body:** JSON
  - `title` (string, required): The title of the blog post.
  - `summary` (string, required): The summary of the blog post.
  - `content` (string, required): The content of the blog post.
- **Response:** JSON

### Update an Existing Blog Post

Updates an existing blog post identified by its slug.

- **URL:** `/api/blog/{slug}`
- **Method:** `PATCH`
- **Request Body:** JSON
  - `title` (string, required): The updated title of the blog post.
  - `summary` (string, required): The updated summary of the blog post.
  - `content` (string, required): The updated content of the blog post.
- **Response:** JSON

### Delete a Blog Post

Deletes a blog post identified by its slug.

- **URL:** `/api/blog/{slug}`
- **Method:** `DELETE`
- **Response:** JSON

Note: Replace `{slug}` in the URL with the actual slug of the blog post.

Feel free to customize the endpoints and examples as per your specific implementation.
