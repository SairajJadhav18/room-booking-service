# ROOK-BOOKING-SERVICE
## Student Information

- **Name**: [SAIRAJ JADHAV]
- **Student ID**: [B00925707]
- **Date Created**: [05-3-2025]

Application Name and Description

Room Booking System

The Room Booking System is a web-based application designed to help users search for, view, and book available rooms in a hotel or accommodation facility. The application allows users to filter rooms by type (Single, Double, Suite), view detailed information about each room, and book their preferred room.

Key features include a dynamic carousel showcasing room images, a searchable table of available rooms, and a booking confirmation page. The application is built using PHP, Bootstrap, and JSON for data storage, ensuring a seamless and responsive user experience across devices.

The Room Booking System is ideal for hotel managers, travelers, and anyone looking for an easy way to explore and book rooms. Whether users are planning a vacation or a business trip, this application provides a convenient platform to find and reserve the perfect room.

Steps to Set Up and Run the Application
To set up and run the Room Booking System locally, follow these steps:

Clone the Repository:

bash
Copy
git clone https://github.com/your-repo/room-booking-system.git
cd room-booking-system
Set Up the Web Server:

Place the project folder in the htdocs directory (for XAMPP/WAMP) or any directory served by your web server.
If using the PHP development server, navigate to the project directory and run:

bash
Copy
php -S localhost:8000
Access the Application:

Open your web browser and go to:

Copy
http://localhost:8000
Explore the Features:
Use the search form to filter rooms by type.
View room details, including images, amenities, and pricing.
Book a room and view the confirmation page.

## Application Type and Description

Deploy the Application:
The application can be deployed using GitHub Pages, Netlify, or a traditional web hosting service.
For local deployment, use XAMPP or WAMP to host the application on a local server.

Features Implemented
The Room Booking System includes the following features:

Room Search:
Users can search for available rooms by selecting a room type (Single, Double, Suite).
Displays a table of available rooms with details such as Room ID, Room Type, and Price Per Night.

Room Details:
Users can view detailed information about a room, including amenities, description, and images.
A carousel displays multiple images of the room.

Booking Confirmation:
After booking a room, users are redirected to a confirmation page with booking details.

Responsive Design:
The application is fully responsive and works seamlessly on desktop, tablet, and mobile devices.

Favicon Integration:
A custom favicon is displayed in the browser tab and navbar.

## Additional Details [As Needed]

Additional Notes and Considerations
Performance Considerations
The application uses a JSON file (rooms.json) for data storage, which is lightweight and easy to manage.
For larger datasets, consider migrating to a database like MySQL for improved performance.

Local Storage Usage
Booking details are stored in session variables for temporary persistence.

For a production environment, implement a database to store booking data permanently.
Customization Options
Modify the rooms.json file to add or update room details.

Customize the UI by editing the CSS files or adding new Bootstrap components.
Future Improvements
User Authentication:
Add a login system for users to manage their bookings.

Payment Integration:
Integrate a payment gateway to allow users to pay for their bookings online.
 
Dark Mode:
Implement a dark mode feature for better user experience in low-light environments.

Advanced Search Filters:
Add filters for price range, amenities, and check-in/check-out dates.
 
## Citations & Acknowledgements

References

1. jQuery Library
jQuery. (March, 2025). jQuery JavaScript Library. Retrieved February 5, 2025, from https://code.jquery.com/jquery-3.6.0.min.js

2. Bootstrap CSS & JS
Bootstrap. (March, 2025). Bootstrap framework (Version 5.3.0-alpha1). Retrieved February 5, 2025, from https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/

3. Bootstrap Carousel
Bootstrap. (March, 2025). Carousel component. Retrieved October 10, 2023, from https://getbootstrap.com/docs/5.3/components/carousel/

the following code was generated using help from chatgpt
line 41 to 86 && line 35 to 56 in index.php and room_details.php

OpenAI. (2025, March 2). Personal communication with ChatGPT. OpenAI.

prompt used: -

"Help me create a slideshow to display my room images inside my exsisting pokemon modal cards"

result: -
"<div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#roomCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#roomCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#roomCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/room1-1.jpg" class="d-block w-100" alt="Room 1">
        </div>
        <div class="carousel-item">
            <img src="../images/room2-1.jpg" class="d-block w-100" alt="Room 2">
        </div>
        <div class="carousel-item">
            <img src="../images/room3-1.jpg" class="d-block w-100" alt="Room 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>"

4. Bootstrap Cards
Bootstrap. (March, 2025). Card component. Retrieved October 10, 2023, from https://getbootstrap.com/docs/5.3/components/card/

5. favicon 
Flaticon. (n.d.). Hotel review icon [images/favicon.png]. Retrieved October 10, 2023, from https://www.flaticon.com/free-icon/review_3168643?term=hotel&page=1&position=20&origin=tag&related_id=3168643

6. CITATIONS AND URL FOR IMAGES
# Pixabay. (2023). Hotel room with bed and window [Photograph]. Pexels. Retrieved October 10, 2023, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2023). Hotel room with bed and window [Photograph]. Pexels. Retrieved september, 2023, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2023). Hotel room with bed and window [Photograph]. Pexels. Retrieved january 10, 2023, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2023). Hotel room with bed and window [Photograph]. Pexels. Retrieved march 10, 2023, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2022). Hotel room with bed and window [Photograph]. Pexels. Retrieved june 23, 2022, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2021). Hotel room with bed and window [Photograph]. Pexels. Retrieved june 22, 2021, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2013). Hotel room with bed and window [Photograph]. Pexels. Retrieved October 9, 2013, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2023). Hotel room with bed and window [Photograph]. Pexels. Retrieved november 10, 2023, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

# Pixabay. (2022). Hotel room with bed and window [Photograph]. Pexels. Retrieved december 2, 2022, from https://www.pexels.com/photo/hotel-room-with-bed-and-window-271618/

