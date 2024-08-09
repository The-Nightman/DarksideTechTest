# DarksideTechTest
Technical test for Darkside Developments, task specifications include a basic html form with backend services

## The Brief

The objective of this exercise is to develop a straightforward form that can save and update customer information, such as name, email, phone, and address, to a database. The preferred technologies for this task are PHP, specifically with the Laravel framework for the server-side, and VueJS for the client-side.

Please ensure that any client-side code adheres to the same principles as the server-side code. Additionally, it is essential to follow engineering best practices throughout the project.

The principles we prioritize include security, performance, readability, testability, scalability, and simplicity. Please incorporate these principles into your solution.

Furthermore, strive to achieve a clear separation of concerns between the various components of your solution. Utilizing the MVC pattern, for instance, can facilitate this separation.

If Docker is not utilized, your application should retrieve and store data by reading from and writing to a file on disk, instead of utilizing a relational or NoSQL solution for the datastore.

## Technology Choices

While the prefered technologies were listed as follows: php/laravel, vueJS composition API and MySQL, these technologies were not strict requirements. However I chose to use these technologies so that I may use this technical test as an exercise and opportunity to learn these technologies before deciding on a fallback tech stack, I used Laravel with a breeze template for inertia.JS with VueJS and tailwindCSS for my frontend and backend architecture, the database technology used throughout the development, testing and dockerization of this project was MySQL as I am already familiar with SQL coming from PostGreSQL so i saw this as an inconsequential step with technology alongside the eloquent ORM built into laravel that removed the need for raw SQL queries.

PHPUnit was used for testing this application and sail to dockerize and deploy the application.

The structure of this application was built using MVC principles and using php artisan for the proper generation and location of files.

## Setting up the application

In order to setup the application first a .env file must be created, this can be done using the .env.example file which also includes database connection environment variables. For use in docker with sail the default env variable configuration for the database is 
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

## Running the application

1. in order to run the application first clone the repository to a local repo preferably on a linux system
`git clone https://github.com/The-Nightman/DarksideTechTest.git`

2. cd into the project folder containing the application files
`cd DarksideTechTest/darkside-technical`

3. to start the dockerized version of the app run the following command in your terminal
```
./vendor/bin/sail up
```
if this fails or appears to freeze then you can attempt to cancel and then run the following command before running the `up` command again
```
./vendor/bin/sail build
```

4. once the application is running in a docker container you need to run a migration to build the database by running the following command in the terminal inside the application folder
```
./vendor/bin/sail artisan migrate
```

5. you can now access the application at the localhost address shown in the terminal

6. to stop the application either ctrl+c or if the container is running in the background then run the following command
```
./vendor/bin/sail stop
```

### Running tests

in order to run the feature tests within the project run the following command in the terminal
```
./vendor/bin/sail test
```