@extends('layouts.main')

@section('content')

<section class="contact-hero">
    <div class="contact-hero-content">
        <h1>Let&rsquo;s Talk About Your Career</h1>
        <p>Feel free to reach out to us for jobs, hiring or career guidance.</p>
    </div>
</section>

<section class="section contact-main">

    <div class="contact-grid">

        <!-- LEFT : FORM -->
        <div class="contact-form-box">
            <h2>Get In Touch</h2>

          <form action="{{ route('contact.send') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Your Name"
       pattern="[A-Za-z\s]+"
       title="Only letters allowed"
       required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" rows="4" placeholder="Your Message" required></textarea>

    <button class="btn">Send Message</button>
		</form>
        </div>

       <!-- RIGHT : INFO -->
<!-- RIGHT : INFO -->
<div class="contact-info-box">

    <h2>Contact Information</h2>

    <p class="contact-subtitle">
        We are always open to discuss new opportunities, careers and collaborations.
    </p>

    <!-- MAP INSIDE CONTACT INFO -->
    <div class="contact-map">
        <iframe
            src="https://www.google.com/maps?q=5XW3+GG4,+Neta+Colony,+Adhartal,+Jabalpur,+Madhya+Pradesh+482004&output=embed"
            loading="lazy">
        </iframe>
    </div>

    
    <!-- CONNECT WITH US -->
    <div class="info-block">
        <h4>Connect With Us</h4>
        <div class="contact-social">
            <a href="https://linkedin.com" target="_blank">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="mailto:sejalkanojiya890@gmail.com">
                <i class="bi bi-envelope-fill"></i>
            </a>
            <a href="https://wa.me/917566565105" target="_blank">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </div>

</div>

        </div>

</section>

@endsection
