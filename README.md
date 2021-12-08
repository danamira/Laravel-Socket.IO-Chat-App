# Laravel Socket.IO Chat Application
Simple Laravel chat appication using Socket.IO
## 🛠 Installing project and dependencies
Clone the app from this GitHub repository.
Run `composer update` to download PHP dependencies of the project .
Run `npm install` to download JavaScript dependencies of the project including Socket.IO and ioredis .
Rename .env.example to .env and run `php artisan key:generate` in order to setup the Laravel project .
You are ready to go. 😎

## 🚀 Running the application
This chat application uses Socket.IO for realtime connection with users . In order to use Socket.IO you need to run a Node.js server.
Simply switch to the base directory of the project and run `node socket` (Make sure you have [Node.JS](https://nodejs.org/en/) installed on your machine and the dependencies are installed priorly) .
Finally, run `php artisan serve` to start the Laravel application .
