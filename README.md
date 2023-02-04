# Bus Booking System
## About
The goal of this project is to implement a building a fleet-management system (bus-booking system) using the latest version of the Laravel Framework.

## Prerequisites
- xampp
- php v 8.*
- composer
- Postman ( https://www.getpostman.com/apps )
or you can use your prefer extension to your browser for example [ RestMan for opera ](https://addons.opera.com/en/extensions/details/restman/)

## Setup / configuration
 1. Clone Repo 
    - `git clone https://github.com/Eslam-Ayman/Jumia-Exercise.git`
    - cd into your project `cd Jumia-Exercise/bus-booking-src`
 2. Create a copy of your .env file
    - ```cp .env.example .env```
 3. Install Composer Dependencies
    - ```composer install```
 4. Generate an app encryption key if it is not auto generated
    - ```php artisan key:generate```
    - If the application key is not set, your user sessions and other encrypted data will not be secure!
 5. Create an empty database for the application through phpmyadmin
 6. In the .env file, add database information to allow Laravel to connect to the database
 7. Migrate the database
    - `php artisian migrate:fresh --seed`, seeders contain on proper data to be tested.
    - if you don't need to migrate, so you can import `bus_booking.sql` that contain on proper data to be tested as well.
8. run this command `php artisan serve` through terminal
9. Import Attached API collection file `bus-booking.postman_collection.json` into Postman
10. Or you can click on **Run in Postman** button (top-right corner) in the following documentation
    - https://documenter.getpostman.com/view/21779593/2s935oKiWj
> It is **important** to select `No Environment` in your Postamn at the top-right corner in Postman if you want to use ready made variables in the collection itslf.

## APIs Overview
> Note: If you followed the previous steps to the end, so no need to adjust any variables in the collection like domain or even auth token it will be replaced automatically once you login
<br> Current domain in the attached collection is http://127.0.0.1:8000

| Name  | Method   | URL  | Header | Body   | Description |
| :---: |:-------:| :---: | :-----:| :-----:| :-----: |
| register | POST | {{domain}}/api/auth/register | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (name, email, password, password_confirmation) <br> `Optional Data`: (none) | Using this API to register new user and then you should use *verify-email* API to continue
|verify-email | POST | {{domain}}/api/auth/verify-email | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (verification_code) <br> `Optional Data`: (none) | If you registered a new user, so this user should receive an email containing on the verification code but because this project not integrated with any mail services so you can use this verification code with each user '1234'
| login | POST | {{domain}}/api/auth/login | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (email, password) <br> `Optional Data`: (none) | Using this API to login any registered user
| logout| POST | {{domain}}/api/auth/logout | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (none) <br> `Optional Data`: (none) | Logout user it will remove current access token of this user
| send-verification-code | POST | {{domain}}/api/auth/send-verification-code | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (email) <br> `Optional Data`: (none) | You can use this API incase you forget your password
| reset-password | POST | {{domain}}/api/auth/reset-password | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (verification_code, password, password_confirmation) <br> `Optional Data`: (none) | If you forget your password and send a request to send a verification code then use this API to reset your password
| change-password | POST | {{domain}}/api/auth/change-password | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (verification_code, password, password_confirmation) <br> `Optional Data`: (none) | You can use this API only if you are authenticated this API has been implemented to be use inside application profile
| bookings / store | POST | {{domain}}/api/bookings | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (user_id, seat_id, start_city_id, end_city_id) <br> `Optional Data`: (expecting_departure_range[from], expecting_departure_range[to]) | First Required API that state on "User can book a seat if there is an available seat"
| seats / index | GET | {{domain}}/api/seats | `Content-Type`: application/json <br> `Accept`: application/json | `Required Params`: (start_city_id, end_city_id) <br> `Optional Params`: (expecting_departure_range[from], expecting_departure_range[to]) | Second API that state on "User can get a list of available seats to be booked for his trip by sending start and end stations"

## APIs Usage (Follow the following steps in the same order)
1. click on `Auth` directory then `login` API then click on `send`
    - no need to register new user you can use current user in this API body.
    - no need to copy and replace auth token from API response it will be replaced automatically
2. To test first API 
    - click on `bookings` directory then `bookings/store` API then clcik on `send`
3. To test second API
    - click on `seats` directory then `seats/index` API then clcik on `send`

> Note: This API `trips/store` was not be required but I created it for me internally.
<br> To use this API `trips/store` or to add custom trips to test them:
you should first check out to another branch  `gist checkout create-trip-internal` 
This API should be using for admin role only but becuase of there is no muliple users in the requiremnts I did this API internally to me to insert some trips into DB or you can insert them directly from DB.
<br> This API should be for testing purposes


## Program's Output Example
![N|Solid](https://i.ibb.co/BT2VhnJ/image.png)

## Entity Relationship Diagram (ERD)
![N|Solid](https://i.ibb.co/5BRG8PV/bus-booking-ERD.png)

## Contributing
Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Repo
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

# License 
Distributed under the MIT License
> Author : Eslam Ayman 