# Documentation for Application X

## Database Schema and Complex CRUD Functionalities

### Tables:

1. **users**: Contains user information.

    - **CRUD Functionality**: Implemented for Create, Read, Update, and Delete operations on user data.

2. **cars**: Stores information about cars.

    - **CRUD Functionality**: Implemented for Create, Read, Update, and Delete operations on car data.

3. **bookings**: Manages bookings made by users.

    - **Functionalities**: Implemented for Create, Read, Update, and Delete operations on bookings data. (In Progress)

4. **payments**: Stores payment details.

    - **CRUD Functionality**: Implemented for Create, Read, Update, and Delete operations on payment data. When Create data, then generate VA from Xendit API

5. **payment method**: Implemented for Create, Read, Update, and Delete operations on payment method data. (In Progress)

## User Authentication and Role-Based Authorization

-   **Authentication System**: Implemented using Laravel Breeze.

-   **Authorization**: Role-based access control system

## Email Notification System

-   _Pending Implementation_: Currently working on setting up the email notification system. (On progress)

## Integration with Third-Party API (Xendit)

-   **Integration**: Connected with Xendit API to generate virtual account billing when creating payments.

## Installation Guide for Local Development Environment

To install and run this application locally:

1. Clone the repository: `git clone [repository_url]`
2. Install dependencies: `composer install`
3. Install dependencies: `npm install`
4. Set up environment variables: Create a copy of `.env.example` as `.env` and configure database and other necessary credentials.
5. Run migrations: `php artisan migrate --seed`
6. Start the development server: `php artisan serve`
7. Start the development server: `npm run dev`

## Deployment on Web Server

To deploy the application on a web server, same like installation for local

## Running Unit Tests

_Pending Implementation_: Unit tests are yet to be created and implemented.

Please note that the documentation might require additional details based on your specific application's configurations and functionalities.
