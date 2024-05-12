# LocaPulse

Create LocaPulse UI site and handle its backend with Laravel 10.x to find missing things with the help of an AI model.

## Getting Started

- Handel authentication.
- The site is responsive.
- Use the Laravel/UI package.
- Create a simple UI for users with HTML, CSS, JS, and Bootstrap.
- The user can add anything he found to find its owner, or add anything he lost to find it.
- Preparing API to fetch all the data from the database from both the lost and found tables in order to send it to the AI to complete its work.
- Receiving API from AI, extracting data from it, and performing the necessary operations, while displaying the appropriate content to the user on the interface.

### Tools

- Laravel 10.x.
- HTML.
- CSS.
- JS.
- Bootstrap.

### Installing

A step by step series of examples that tell you how to get a development
environment running

clone Repository in your local pc

    git clone https://github.com/Breksam/LocaPulse.git 

run on your cmd or terminal

    composer install

copy .env.example file to .env on the root folder

    copy .env.example .env

then open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

open the terminal in the project then:

run

    php artisan key:generate
run

    php artisan migrate
run

    php artisan db:seed
run

    php artisan serve

## Running the tests

Now you can try the site locally on your browser.

open the terminal in the project then:

run

    php artisan serve

## Site Screens
<details>
    <summary>Site Pages Screens</summary>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Login.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Register.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Home.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Found%20Form.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/after%20fill%20found%20form.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Missing%20Form.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/after%20fill%20missing%20form.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Account1.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/Account2.png" alt="image-description"/>
    <img src="https://github.com/Breksam/LocaPulse/blob/master/site%20screens/When%20choose%20No.png" alt="image-description"/>
</details>


## Authors

  - **Breksam Hassan Elsokkary** - (https://github.com/Breksam)
