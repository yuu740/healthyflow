# HealthyFlow 

**HealthyFlow** is a personal health tracking web application built with **Laravel**. It helps users track their daily hydration, sleep, physical activity, and nutrition in a simple, responsive interface.

## Features

* **Dashboard:** Real-time progress bars for water, sleep, and activity goals.
* **Daily Logs:** Track detailed logs for Water, Food, Sleep, Fasting, and Activity.
* **Visual Food Diary:** Upload photos of meals with notes (Gallery).
* **Healthy Timer:** Built-in countdown timer for workouts or meditation.
* **Localization:** Fully supports **English** and **Indonesian (Bahasa Indonesia)**.
* **Responsive Design:** Optimized for mobile and desktop viewing.

---

## Prerequisites

Before setting up, ensure you have the following installed:
* **PHP** (v8.1 or higher)
* **Composer**
* **XAMPP** (database)

---

## Installation (Desktop Setup)

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/yuu740/healthyflow.git
    cd healthyflow
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    * Copy the example environment file:
        ```bash
        cp .env.example .env
        ```
    * Open `.env` and configure your database settings:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations (Create Tables)**
    Make sure XAMPP (MySQL) is running, then run:
    ```bash
    php artisan migrate
    ```
    
6.  **Run the Application**
    ```bash
    php artisan serve
    ```
    Visit the provided link in your browser, but it would be optimal to run it on mobile.

    For the early step to serve the application on mobile, use this command:
    ```bash
    php artisan serve --host 0.0.0.0 --port 8000
    ```
    and don't forget to follow the next instruction setup below!
---

## How to Run on Mobile (Locally)

To view and test the app on your smartphone, both your computer and phone must be connected to the **same Wi-Fi network**.

### Step 1: Find Your Computer's IP Address
* **Windows:** Open PowerShell/CMD and run `ipconfig`. Look for **IPv4 Address** (e.g., `192.168.1.10`).
* **Mac/Linux:** Run `ifconfig`.

### Step 2: Serve the Application
Use this template:
 ```bash
http://<IPv4_Address>:8000
```
and use your **IPv4 Address** in it. Don't forget to copy it into your phone's browser and run it there.
