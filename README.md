# Parrolabs Coding Exercise

## Disclaimer

Despite the limited time available, the project was successfully completed, and all the requirements were fulfilled, although some best practices could not be implemented.

## Overview

Hireme is a PHP/Laravel employment tracer. It takes care of company budgets and available positions as well as employees. It runs in a web browser and uses MySQL and PHP in Docker containers (powered by Laravel Sail).

## How to run it

### Requirements

To run this project you need Docker and Composer installed on your machine. **You may also need to make sure that port 8000 and 3306 are available to be used.** Finally you need a web browser to see it in action.

### Steps

1. Clone the project from GitHub.
2. Go to the root of the project and execute `composer install`.
3. Run Laravel Sail. To do it use this command from the project root: `./vendor/bin/sail up`.
4. Run the migrations: `./vendor/bin/sail artisan migrate`.
5. Finally, let's add some data to our project: `./vendor/bin/sail artisan db:seed`.
6. In a browser tab, go to `http://localhost:8000`. Now you should see the menu to the right.

## Software Design Decisions

- Due to the project's primarily CRUD nature, Laravel was selected as the backend framework to expedite the development and management of the data layer (models) and routing. Additionally, event handling and validators (from Laravel) are employed in this project.

- Tailwind CSS was chosen for the frontend to streamline the styling and layouts due to its simplicity.  Considering the time constraints, no JavaScript framework or library was utilized.

- For clients, birth date was chosen over age because the first one provides more flexibility: The exact age of someone can be calculated if birth date, but the opposite is not possible. If only the age is stored, it becomes challenging to track when a client has a new age.

- Regarding a web to keep track of available positions in a company, events and listeners was chosen as the strategy. The approach consists of triggering an event when someone is hired (available positions must decrement) and when a new position is created (available positions must increment). The listener calls a service to recalculate this for a company everytime the events are triggered.

- Budget limit (company) is calculated and checked when someone is going to be hired and when a new position is about to be created.

## To Do (lack of time)

- Unit Testing
- Use AJAX calls for some requests (like hiring)
- Install Tailwind correctly (through NPM)
- .env must not be gitted
- Authentication for NGO User
- Enums for fixed values (like education levels)
- Pagination
- Improve documentation to be more PHPDoc-compliant
- Store strings in translation files instead of hardcoding them into templates or controllers
- Exception/Error handling
- Move validation logic to another method to respect S from SOLID principles
- Move "complex" queries to repositories
- Add Edit/Update forms and processing for models
