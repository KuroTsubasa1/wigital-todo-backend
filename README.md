# Wigital ToDo Backend

## Overview

This Symfony application is a task management system. It allows users to create, read, update, and delete tasks. The application is built with PHP and uses the Symfony framework. It also uses Doctrine ORM for database operations.

## Prerequisites

Before you can run this application, you need to have the following installed on your machine:

- PHP 8.2 or higher
- Composer: This is used for managing PHP dependencies.
- Docker: This is used for setting up the local development environment.
- DDEV: This is used for managing Docker containers.

## Installing Wigital ToDo Backend

To install the Wigital ToDo Backend, follow these steps:

1. **Clone the repository**: Use the command `git clone https://github.com/KuroTsubasa1/wigital-todo-backend.git` to clone the repository to your local machine.

2. **Install PHP**: Ensure that you have PHP 8.2 or higher installed on your machine. You can check your PHP version with the command `php -v`.

3. **Install Composer**: Composer is used for managing PHP dependencies. You can download it from the [official Composer website](https://getcomposer.org/download/).

4. **Install Symfony CLI**: The Symfony CLI is used for running the application locally. You can download it from the [official Symfony website](https://symfony.com/download).

5. **Install Docker**: Docker is used for setting up the local development environment. You can download it from the [official Docker website](https://www.docker.com/products/docker-desktop).

6. **Install DDEV**: DDEV is used for managing Docker containers. You can download it from the [official DDEV website](https://ddev.readthedocs.io/en/stable/#installation).

7. **Install project dependencies**: Navigate to the project directory in your terminal and run `composer install` to install the project dependencies.

8. **Configure DDEV**: In the project directory, run `ddev config` to create a `.ddev` configuration directory and a `config.yaml` file. Edit the `config.yaml` file if necessary to match your project setup.

9. **Start DDEV environment**: Run `ddev start` to start the DDEV environment. You can now access your project at the provided URL.

## Project Structure

The application has two main entities: `User` and `Task`.

### User

The `User` entity represents a user in the application. It has the following properties:

- `id`: The unique identifier of the user.
- `Username`: The username of the user.
- `Email`: The email address of the user.
- `PasswordHash`: The hashed password of the user.

### Task

The `Task` entity represents a task in the application. It has the following properties:

- `id`: The unique identifier of the task.
- `UserID`: The identifier of the user who owns the task.
- `Description`: The description of the task.
- `Status`: The status of the task.

## Controllers

The application has a controller named `TaskController`. This controller handles all operations related to tasks.

### TaskController

The `TaskController` has the following methods:

- `getAll`: This method retrieves all tasks from the database and returns them as a JSON response.
- `getOne`: This method retrieves a single task by its ID from the database and returns it as a JSON response.
- `create`: This method creates a new task with the data provided in the request body and persists it to the database. It returns the created task as a JSON response.
- `update`: This method updates an existing task with the data provided in the request body and persists the changes to the database. It returns the updated task as a JSON response.
- `delete`: This method deletes an existing task by its ID from the database and returns a JSON response indicating the deletion.

## Running the Application

To run the application, you need to have PHP and Composer installed on your machine. You can then install the application dependencies by running `composer install` in the project directory. After the dependencies are installed, you can start the application by running `ddev start`. After that use `ddev ssh` to access the container and run `php bin/console doctrine:database:create` & `php bin/console doctrine:migrations:migrate` to create the database schema. You can now access the application at the provided URL.

## License

This project uses the following license: `MIT license`.en contributing to the project, please follow the established coding conventions and style guides. Make sure to test your changes before submitting a pull request. If you're adding a new feature, please also update the documentation accordingly.