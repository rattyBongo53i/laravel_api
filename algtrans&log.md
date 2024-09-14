# ALG Transport and Logistics

## Pickup Booking

- dude i'm so far behind schedule it would be a miracle to pull of a meeting this afternoon

# Users table

    id (primary key)
    name
    email
    password

# Drivers table

    id (primary key)
    user_id (foreign key to users table)
    car_make
    car_model
    car_year
    license_plate
    current_location (latitude and longitude)

# Trips table

    id (primary key)
    user_id (foreign key to users table)
    driver_id (foreign key to drivers table)
    pickup_location (latitude and longitude)
    destination_location (latitude and longitude)
    pickup_time
    dropoff_time
    fare_amount
