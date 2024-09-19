# Laravel Assignment  Barta App

This repository contains the Laravel assignment project. Follow the instructions below to get started with the application.

## Prerequisites

- PHP (>= 8.2)
- Composer
- Laravel (>= 11)

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/bhubon/assignment-7.git

2. **Go to project path**
    ```bahs
    cd assignment-7
2. **Install composer**
    ```bahs
    composer install
3. **Copy .env file**
    ```bahs
    cp .env.example .env
4. **Generate APP KEY**
    ```bahs
    php artisan key:generate
5. **SESSION_DRIVER is set to database, run the migrations:(Optional)**
    ``bash
    php artisan migrate
    If SESSION_DRIVER is set to file, then no need to run migration
6.**Run the application**
    ```bahs
    php artisan serve
