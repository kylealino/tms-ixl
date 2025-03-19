# Project Overview

This project has been developed for a few hours only because the task is given around 5:30pm March 19 and the deadline is march 20 3pm. So since i'm still employed with duty hours of 8am-6pm, i need to develop the task in the fastest way i can and i know. So the limitation of my project is i didnt use the AJAX way because im not familiar with it in laravel because i used to do it for years in codeigniter 4 and i dont have time to explore due to limited time/hours only. 

## Click the link to watch the proof of accomplishment

[https://drive.google.com/file/d/1CoSLLh2gwHApJg433VE_OUeiTF4iTfJS/view?usp=sharing](https://drive.google.com/file/d/1CoSLLh2gwHApJg433VE_OUeiTF4iTfJS/view?usp=sharing)

## Features and Functionality

- laravel crud
- mysql database    
- authentication in logic

## Database Configuration

Please ensure you update the `.env` file with your local MySQL password for proper database connectivity.

## To run the project, execute the following commands:

```bash
npm install
composer install

```
## Rename .env.example to .env

## Put your localhost password in DB_PASSWORD in .env

```bash
php artisan key:generate
npm run dev

```
## Setup your mysql privileges to run it into your localhost

```bash
sudo mysql

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'your_local_password' WITH GRANT OPTION;
FLUSH PRIVILEGES;

```

## Sreate new terminal

```bash
php artisan serve

```
## To populate the database with the initial 20 task records, run the following command:

```bash
php artisan db:seed --class=TaskSeeder

```
## if error after seeding occurs, kindly perform this command:

```bash
php artisan migrate
```