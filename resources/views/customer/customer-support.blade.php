


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support</title>
    <style>
   /* General Body Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa; /* Light grey background */
    color: #333; /* Dark text */
    margin: 0;
    padding: 0;
}

/* Section Styling */
section {
    margin: 20px auto;
    padding: 20px;
    max-width: 800px;
    background: #ffffff; /* White background for sections */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    border: 1px solid #e7e7e7; /* Light border */
}

/* Section Headers */
section h2 {
    font-size: 24px;
    color: #28a745; /* Bootstrap blue */
    margin-bottom: 15px;
    text-align: center;
}

/* Links Styling */
section a {
    text-decoration: none;
    color: #28a745; /* Bootstrap blue */
    font-weight: bold;
    transition: color 0.3s ease-in-out;
}

section a:hover {
    color: #0056b3; /* Darker blue on hover */
}

/* Social Links Styling */
.social-links {
    text-align: center;
}

.social-links a {
    display: inline-block;
    margin: 10px;
    font-size: 18px;
    padding: 10px 15px;
    color: white;
    background-color: #28a745; /* Blue background */
    border-radius: 50px; /* Rounded pill-like buttons */
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.social-links a:hover {
    background-color: #28a745; /* Darker blue on hover */
    transform: translateY(-3px); /* Lift effect on hover */
}

.social-links i {
    margin-right: 5px;
}



/* Contact Section Styling */
.contact-section ul {
    list-style: none; /* Remove bullets */
    padding: 0;
}

.contact-section li {
    margin: 10px 0;
    font-size: 16px;
}

/* Forms Styling */
form {
    display: flex;
    flex-direction: column;
    gap: 15px; /* Add spacing between inputs */
}

form label {
    font-weight: bold;
    font-size: 14px;
    color: #333;
}

form input,
form textarea,
form button {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #e7e7e7; /* Light border */
    border-radius: 5px;
}

form textarea {
    resize: none; /* Disable resizing */
}

form input:focus,
form textarea:focus {
    outline: none;
    border-color: #28a745; /* Blue focus border */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

form button {
    background-color: #28a745; /* Blue background */
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

form button:hover {
    background-color: #28a745; /* Darker blue */
    transform: translateY(-3px); /* Lift effect */
}

/* Responsive Design */
@media (max-width: 768px) {
    section {
        padding: 15px;
    }

    section h2 {
        font-size: 20px;
    }

    form input,
    form textarea,
    form button {
        font-size: 14px;
    }

    .social-links a {
        font-size: 16px;
        padding: 8px 12px;
    }
}

/* Center the title section */
.title {
    display: flex; /* Enable Flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 10vh; /* Make the section take up the full viewport height */
    background-color: #f8f9fa; /* Light background color (optional) */
    text-align: center; /* Center the text */
}

/* Title styling */
.title h1 {
    font-size: 28px; /* Large font size for the title */
    font-weight: bold; /* Make the text bold */
    color: #333; /* Dark gray color for the text */
     /* Uppercase text */
    letter-spacing: 1px; /* Add spacing between letters */
    margin: 0; /* Remove default margin */
}

/* Responsive styling */
@media (max-width: 768px) {
    .title h1 {
        font-size: 32px; /* Smaller font size for mobile */
    }
}


    </style>
    
</head>
<body>

    <section class="title">
        <h1>Customer Support</h1>
    </section>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin-top: 10px;">
            {{ session('success') }}
        </div>
    @endif
    
    
    <section class="social-links">
        <h2>Connect with us:</h2>
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i>Facebook</a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <ul>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>What are your support hours?</strong></a>
                <div class="faq-answer">
                    We are available Monday to Friday from 9 AM to 6 PM.
                </div>
            </li>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>How can I track my order?</strong></a>
                <div class="faq-answer">
                    You can track your order using the tracking link sent to your email.
                </div>
            </li>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>Do you offer international shipping?</strong></a>
                <div class="faq-answer">
                    Yes, we offer international shipping to most countries.
                </div>
            </li>
        </ul>
    </section>
    
    <script>
        // JavaScript to handle the dropdown functionality
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
    
                // Toggle visibility of the answer
                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                } else {
                    answer.style.display = 'block';
                }
            });
        });
    </script>
    
    <style>
        /* FAQ Section Styling */
        .faq-section ul {
            list-style: none; /* Remove bullets */
            padding: 0;
        }
    
        .faq-section li {
            margin: 10px 0;
            font-size: 16px;
        }
    
        .faq-section li strong {
            color: #333;
        }
    
        .faq-answer {
            display: none;
            margin-top: 5px;
            font-size: 14px;
            color: #555;
            padding-left: 20px;
        }
    
        .faq-question {
            text-decoration: none;
            color: #388e3c; /* Green color */
            font-weight: bold;
            cursor: pointer;
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
    
        .faq-question:hover {
            background-color: #e0e0e0;
        }

/* Request Form Section */
.request-form {
    margin-top: 20px;
    padding: 20px;
    border-radius: 8px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.request-form h2 {
    font-size: 24px;
    color: #28a745;
    margin-bottom: 15px;
    text-align: center;
}

.request-form label {
    font-weight: bold;
    font-size: 14px;
    color: #333;
    display: block;
    margin-top: 10px;
}

.request-form input,
.request-form textarea,
.request-form button {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #e7e7e7;
    border-radius: 5px;
    font-size: 14px;
}

.request-form textarea {
    resize: none;
    height: 100px;
}

.request-form button {
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.request-form button:hover {
    background-color: #218838;
    transform: translateY(-3px);
}


        
    </style>




    <section class="contact-section">
        <h2>Contact Us</h2>
        <ul>
            <li><strong>Phone:</strong> +123-456-789</li>
            <li><strong>Email:</strong> support@ourcompany.com</li>
            <li><strong>Support Hours:</strong> Monday to Friday, 9 AM - 6 PM</li>
        </ul>
    </section>

    <section class="request-form">
        <h2>Submit a Request</h2>
        <form action="{{ route('submit.request') }}" method="POST">
            @csrf
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
    
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
    
            <label for="message">Request Message:</label>
            <textarea id="message" name="message" placeholder="Describe your request" required></textarea>
    
            <button type="submit" class="btn">Submit Request</button>
        </form>
    </section>
    

    <section class="reviews-section">
        <h2>Leave a Review</h2>
        <form action="/submit-review" method="POST">
            @csrf
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <label for="review">Your Review:</label>
            <textarea id="review" name="review" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    </section>

    <section class="club-section">
        <h2>Join Our Club</h2>
        <form action="/join-club" method="POST">
            @csrf
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Join Now</button>
        </form>
    </section>

    <!-- Add FontAwesome for the icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    
    
</body>
</html>

{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Backup color */
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3)),
        url("/images/bg3.jpg");
            background-size: cover; /* Ensures the image covers the entire page */
            background-position: center; /* Centers the image */
            background-attachment: fixed; /* Keeps the background fixed while scrolling */
            color: #333; /* Dark text */
            margin: 0;
            padding: 0;
        }

        /* Section Styling */
        section {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            border: 1px solid #e7e7e7; /* Light border */
        }

        /* Section Headers */
        section h2 {
            font-size: 24px;
            color: #28a745; /* Green color */
            margin-bottom: 15px;
            text-align: center;
        }

        /* Links Styling */
        section a {
            text-decoration: none;
            color: #28a745;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        section a:hover {
            color: #0056b3; /* Darker shade on hover */
        }

        /* Social Links Styling */
        .social-links {
            text-align: center;
        }

        .social-links a {
            display: inline-block;
            margin: 10px;
            font-size: 18px;
            padding: 10px 15px;
            color: white;
            background-color: #28a745; /* Green background */
            border-radius: 50px; /* Rounded buttons */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .social-links a:hover {
            background-color: #0056b3;
            transform: translateY(-3px); /* Lift effect */
        }

        .social-links i {
            margin-right: 5px;
        }

        /* Contact Section Styling */
        .contact-section ul {
            list-style: none;
            padding: 0;
        }

        .contact-section li {
            margin: 10px 0;
            font-size: 16px;
        }

        /* Forms Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form label {
            font-weight: bold;
            font-size: 14px;
            color: #333;
        }

        form input, form textarea, form button {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #e7e7e7;
            border-radius: 5px;
        }

        form textarea {
            resize: none;
        }

        form input:focus, form textarea:focus {
            outline: none;
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        form button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            section {
                padding: 15px;
            }

            section h2 {
                font-size: 20px;
            }

            form input, form textarea, form button {
                font-size: 14px;
            }

            .social-links a {
                font-size: 16px;
                padding: 8px 12px;
            }
        }

        /* FAQ Section Styling */
        .faq-section ul {
            list-style: none;
            padding: 0;
        }

        .faq-section li {
            margin: 10px 0;
            font-size: 16px;
        }

        .faq-answer {
            display: none;
            margin-top: 5px;
            font-size: 14px;
            color: #555;
            padding-left: 20px;
        }

        .faq-question {
            text-decoration: none;
            color: #28a745;
            font-weight: bold;
            cursor: pointer;
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }

        .faq-question:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <section class="social-links">
        <h2>Connect with us:</h2>
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i>Facebook</a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
    </section>

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <ul>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>What are your support hours?</strong></a>
                <div class="faq-answer">We are available Monday to Friday from 9 AM to 6 PM.</div>
            </li>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>How can I track my order?</strong></a>
                <div class="faq-answer">You can track your order using the tracking link sent to your email.</div>
            </li>
            <li class="faq-item">
                <a href="javascript:void(0)" class="faq-question"><strong>Do you offer international shipping?</strong></a>
                <div class="faq-answer">Yes, we offer international shipping to most countries.</div>
            </li>
        </ul>
    </section>

    <script>
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>

    <section class="contact-section">
        <h2>Contact Us</h2>
        <ul>
            <li><strong>Phone:</strong> +123-456-789</li>
            <li><strong>Email:</strong> support@ourcompany.com</li>
            <li><strong>Support Hours:</strong> Monday to Friday, 9 AM - 6 PM</li>
        </ul>
    </section>

    <section class="reviews-section">
        <h2>Leave a Review</h2>
        <form action="/submit-review" method="POST">
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <label for="review">Your Review:</label>
            <textarea id="review" name="review" required></textarea>
            <button type="submit">Submit Review</button>
        </form>
    </section>

    <section class="club-section">
        <h2>Join Our Club</h2>
        <form action="/join-club" method="POST">
            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Join Now</button>
        </form>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html> --}}