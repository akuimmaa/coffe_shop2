@extends('template/layout')

@push('style')
@endpush

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
      
        <!-- Header -->
        <header>
            <h1>Contact Us</h1>
        </header>

        <!-- Section untuk alamat dan foto -->
        <section id="contact-info">
            <div class="address">
                <h2>Our Office Address</h2>
                <p>123 Main Street</p>
                <p>City, State, ZIP</p>
                <p>Country</p>
            </div>
            <div class="map"
                flex="1"
                padding= "20px"
                background-color= "#fff"
                border-radius="5px"
                box-shadow= "0 0 10px rgba(0, 0, 0, 0.1)">
                <!-- Google Maps embed code -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.67890!2dLongitude!3dLatitude!4m5!3m4!1s0x0:0x0!8m2!3dLatitude!4dLongitude" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="photo" width="100%" border-radius="5px">
                <!-- Foto kantor atau gambar lainnya -->
                <img src="office-photo.jpg" alt="Office Photo" >
            </div>
        </section>

        <!-- Section untuk form pertanyaan -->
        <section id="contact-form">
            <h2>Ask Us Anything</h2>
            <form action="submit_form.php" method="post">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>

        <!-- Footer -->
        <footer 
          text-align= "center"
          margin-top= "20px"
          color= "#666">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </footer>
    </body>
    </html>

@endsection
