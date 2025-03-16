@extends('layouts.frontend.app')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Events</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Upcoming Events Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>Featured</span>
    </div><br><br>
    <section class="event">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="section-title">
                        <h4 class="m-0">Upcoming Events</h4>
                    </div>
                </div>
            </div>
        </div>


    <!-- Upcoming Events Section End -->
    <section class="event-listing-section">
    <div class="container event-container-wrapper"> <!-- Add container class -->
        <div class="event-container">
            <div class="event-date-container">
                <div class="event-day">Sun</div>
                <div class="event-date-number">13</div>
            </div>
            <div class="event-details">
                <div class="event-details-range">April 13 - April 15</div>
                <h2 class="event-details-title">SideQuest Entertainment's ISECON 2025</h2>
                <strong class="event-details-location"> Legazpi City Convention Center</strong>
                <p>Legazpi City, Albay, Philippines</p>
                <p>ISECON 2025 is the premier gathering for innovation, gaming, and pop culture enthusiasts. Join industry leaders, tech pioneers, and fans for an immersive experience featuring panels, exhibitions, and cosplay events.</p>
            </div>
            <img class="event-image" src="{{ asset('ashion/img/event/iseco.jpg') }}" alt="Cosplay Carnival 2025">
        </div>
    </div>
    </section>


    <!-- Previous Events Section Begin -->
    <div class="label-container">
        <div class="label-icon"></div>
        <span>Previous</span>
    </div><br><br>
    <section class="event">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="section-title">
                        <h4 class="m-0">Previous Events</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section End -->
    <section class="event-listing-section">
    <div class="container event-container-wrapper"> 
        <div class="event-container">
            <div class="event-date-container">
                <div class="event-day">Sat</div>
                <div class="event-date-number">9</div>
            </div>
            <div class="event-details">
                <div class="event-details-range">November 9 - November 10</div>
                <h2 class="event-details-title">KOSFEST Spooky Cosplay Festival 2024</h2>
                <strong class="event-details-location">3F Cinema Hallway Pacific Mall Legazpi</strong>
                <p>Legazpi City, Albay, Philippines</p>
                <p>Get ready for a spine-chilling cosplay experience at KOSFEST Spooky Cosplay Festival 2024 Celebrate Halloween with fellow cosplayers, compete in costume contests, and enjoy thrilling performances, interactive booths, and fun activities perfect for anime, gaming, and horror fans.</p>
            </div>
            <img class="event-image" src="{{ asset('ashion/img/event/kosfest.jpg') }}" alt="Cosplay Carnival 2025">
        </div>
    </div>
    </section>

    <section class="event-listing-section">
    <div class="container event-container-wrapper"> 
        <div class="event-container">
            <div class="event-date-container">
                <div class="event-day">Sat</div>
                <div class="event-date-number">14</div>
            </div>
            <div class="event-details">
                <div class="event-details-range">September 14 - September 15</div>
                <h2 class="event-details-title">AniGaiden Retro Cosplay 2024</h2>
                <strong class="event-details-location">LCC Legazpi Event Center 1</strong>
                <p>Legazpi City, Albay, Philippines</p>
                <p>Step back in time and relive the golden age of anime at AniGaiden Retro Cosplay 2024! Celebrate classic anime, iconic characters, and old-school gaming with fellow fans. Enjoy cosplay competitions, nostalgic performances, retro gaming stations, and exclusive merchandise from the past decades.</p>
            </div>
            <img class="event-image" src="{{ asset('ashion/img/event/anigaiden.jpg') }}" alt="Cosplay Carnival 2025">
        </div>
    </div>
    </section>

    <section class="event-listing-section">
    <div class="container event-container-wrapper"> 
        <div class="event-container">
            <div class="event-date-container">
                <div class="event-day">Fri</div>
                <div class="event-date-number">3</div>
            </div>
            <div class="event-details">
                <div class="event-details-range">November 3 - November 5</div>
                <h2 class="event-details-title">KOWAI Kosfest Spooky Cosplay Festival 2023</h2>
                <strong class="event-details-location">2/F Activity Center Pacifc Mall Legazpi</strong>
                <p>Legazpi City, Albay, Philippines</p>
                <p>Step into the eerie and exciting world of cosplay at KOWAI Kosfest Spooky Cosplay Festival 2023! Join fellow fans for a thrilling celebration of all things spooky, supernatural, and anime-inspired. Get ready for spine-chilling cosplay competitions, horror-themed performances, interactive games, and exclusive merchandise. Whether you're a ghostly ghoul, a wicked witch, or your favorite dark fantasy character, this is the perfect event to embrace the spooky season in style!</p>
            </div>
            <img class="event-image" src="{{ asset('ashion/img/event/kowai.jpg') }}" alt="Cosplay Carnival 2025">
        </div>
    </div>
    </section>

    <section class="event-listing-section">
    <div class="container event-container-wrapper"> 
        <div class="event-container">
            <div class="event-date-container">
                <div class="event-day">Sun</div>
                <div class="event-date-number">13</div>
            </div>
            <div class="event-details">
                <div class="event-details-range">August 13 - August 16</div>
                <h2 class="event-details-title">HOBBYIST Festival 2023</h2>
                <strong class="event-details-location">Ayala Mall Legazpi</strong>
                <p>Legazpi City, Albay, Philippines</p>
                <p>Celebrate creativity and passion at HOBBYIST Festival 2023! Whether you're into anime, gaming, model kits, arts & crafts, or collectibles, this event is the ultimate gathering for hobby enthusiasts. Explore a variety of exhibits, participate in exciting workshops, showcase your talents in competitions, and connect with fellow hobbyists who share your interests. Don't miss out on exclusive merchandise, interactive activities, and a fun-filled experience at Ayala Mall Legazpi!</p>
            </div>
            <img class="event-image" src="{{ asset('ashion/img/event/hobbyist1.jpg') }}" alt="Cosplay Carnival 2025">
        </div>
    </div>
    </section>
    <!-- Previous Events Section End -->

@endsection

<style>
/*---------------------
  LITTE TITLE
-----------------------*/

  .label-container {
    display: flex;
    align-items: center;
    font-family: Arial, sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: #DB4444; /* Adjusted to match the red shade */
    margin-top: 40px;
    }

    .label-icon {
        width: 12px;
        height: 24px;
        background-color: #DB4444;
        border-radius: 4px;
        margin-right: 8px;
        margin-left: 100px;
    }

/*---------------------
  EVENT
-----------------------*/

        .event-listing-section {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: white;
        }
        .event-container-wrapper {
            width: 100%;
            max-width: 1100px; /* Ensure it aligns with the title */
            margin: 0 auto;
            padding: 0 20px; /* Adjust spacing */
        }

        .event-container {
            display: flex;
            flex-wrap: wrap;
            background: white;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event-date-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 60px;
        }
        .event-day {
            font-size: 14px;
            text-transform: uppercase;
            color: #555;
        }
        .event-date-number {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .event-details {
            flex: 1;
            padding-left: 20px;
        }
        .event-details-title {
            margin: 0;
            font-size: 22px;
            color: #db4444;
        }
        .event-details-range {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        .event-details-location {
            display: block;
            margin-bottom: 5px;
        }
        .event-image {
            width: 100%;
            max-width: 300px;
            border-radius: 8px;
            margin-top: 10px;
        }
        @media (min-width: 768px) {
        .event-container {
            flex-wrap: nowrap;
            align-items: center; /* Align content properly */
        }
        }

</style>
