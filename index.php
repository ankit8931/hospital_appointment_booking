<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeCare Hospital - Complete Healthcare</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS Files Linked Here -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Responsive-style.css">
</head>
<body>

    <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm bg-white">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-heartbeat"></i> Life<span>Care</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#doctors">Doctors</a></li>

                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item ms-lg-3">
                        <span class="nav-link fw-bold text-dark">
                            <i class="fas fa-user-circle text-primary"></i> <?php echo $_SESSION['user']; ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger btn-sm ms-lg-2 text-white px-3" style="border-radius: 20px;">
                            Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sign.php">Sign In</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="#appointment" class="btn btn-primary-custom ms-lg-3">Book Appointment</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Home Page Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h5>We Provide All Health Care Solution</h5>
                    <h1>Protect Your Health And Take Care Of <span>Your Health</span></h1>
                    <p>We are a team of experienced doctors and medical staff providing the best healthcare services for you and your family.</p>
                    <a href="#about" class="btn btn-primary-custom me-3">Read More</a>
                    <a href="#appointment" class="btn btn-outline-dark" style="border-radius: 50px; padding: 10px 25px;">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="About Hospital" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h5 class="text-primary">About Us</h5>
                    <h2 class="mb-4">Best Medical Care For Yourself and Your Family</h2>
                    <p>LifeCare Hospital has been serving the community for over 10 years with a commitment to excellence in patient care. Our state-of-the-art facility is equipped with the latest medical technology.</p>
                    
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Professional & Experienced Doctors</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> 24/7 Emergency Support</li>
                        <li class="mb-3"><i class="fas fa-check-circle text-primary me-2"></i> Digital Laboratory & X-Ray</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p class="text-muted mt-2">We offer a wide range of medical services</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-user-md"></i></div>
                        <h4>Expert Consultation</h4>
                        <p class="text-muted">Get advice from top specialists in various medical fields anytime.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-ambulance"></i></div>
                        <h4>Emergency Care</h4>
                        <p class="text-muted">24/7 ambulance and emergency ward services for critical patients.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-procedures"></i></div>
                        <h4>Operation Theater</h4>
                        <p class="text-muted">Modern operation theaters equipped with advanced surgical tools.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-heartbeat"></i></div>
                        <h4>Cardiology</h4>
                        <p class="text-muted">Comprehensive heart care including diagnostics and surgery.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-dna"></i></div>
                        <h4>Laboratory</h4>
                        <p class="text-muted">Accurate and fast diagnostic test results from our digital lab.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-tooth"></i></div>
                        <h4>Dental Care</h4>
                        <p class="text-muted">Complete dental solutions from cleaning to complex surgeries.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>Our Experienced Doctors</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="doctor-card">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="doctor-img" alt="Doctor 1">
                        <div class="doctor-info">
                            <h5>Dr. Sarah Johnson</h5>
                            <small class="text-muted">Cardiologist</small>
                            <div class="social-links mt-3">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="doctor-card">
                        <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="doctor-img" alt="Doctor 2">
                        <div class="doctor-info">
                            <h5>Dr. William Anderson</h5>
                            <small class="text-muted">Neurologist</small>
                            <div class="social-links mt-3">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="doctor-card">
                        <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="doctor-img" alt="Doctor 3">
                        <div class="doctor-info">
                            <h5>Dr. Megan Lewis</h5>
                            <small class="text-muted">Pediatrician</small>
                            <div class="social-links mt-3">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="doctor-card">
                        <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="doctor-img" alt="Doctor 4">
                        <div class="doctor-info">
                            <h5>Dr. James Wilson</h5>
                            <small class="text-muted">Surgeon</small>
                            <div class="social-links mt-3">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Appointment Form Section -->
<section id="appointment" class="py-4 appointment-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8"> <div class="card border-0 shadow p-3" style="border-radius: 12px;"> <div class="section-title mb-3 text-center">
                        <h3 style="font-weight: 700; font-size: 1.5rem;">Book Appointment</h3>
                        <p class="text-muted small">Fill details to schedule your visit.</p>
                    </div>

                    <form action="backend/appointment.php" method="POST">
                        <div class="row g-2"> <div class="col-md-6">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Full Name</label>
                                <input type="text" name="name" class="form-control form-control-sm" 
                                       placeholder="Your Name" 
                                       value="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm" 
                                       placeholder="Email Address" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Department</label>
                                <select name="department" class="form-select form-select-sm" required>
                                    <option value="">Choose Department...</option>
                                    <option value="Dermatology">Dermatology (Skin & Hair)</option>
                                    <option value="Ophthalmology">Ophthalmology (Eye Care)</option>
                                    <option value="Gynecology">Gynecology (Women's Health)</option>
                                    <option value="Oncology">Oncology (Cancer)</option>
                                    <option value="ENT">ENT (Ear, Nose, Throat)</option>
                                    <option value="General Medicine">General Medicine</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Dental">Dental</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Date</label>
                                <input type="date" name="appointment_date" class="form-control form-control-sm" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Time</label>
                                <input type="time" name="appointment_time" class="form-control form-control-sm" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label mb-1" style="font-size: 0.85rem; font-weight: 600;">Message (Optional)</label>
                                <textarea name="message" class="form-control form-control-sm" rows="2" 
                                          placeholder="Brief issue..."></textarea>
                            </div>

                            <div class="col-12 text-center mt-3">
                                <?php if(isset($_SESSION['user'])): ?>
                                    <button type="submit" name="submit_appointment" class="btn btn-primary-custom btn-sm w-100 py-2" style="font-weight: 600;">
                                        Confirm Appointment
                                    </button>
                                <?php else: ?>
                                    <a href="sign.php" class="btn btn-primary-custom btn-sm w-100 text-white py-2" style="background-color: #00badb; border-radius: 6px; text-decoration: none;">
                                        Login to Book
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a class="navbar-brand text-white" href="#" style="font-size: 1.8rem;"><i class="fas fa-heartbeat"></i> Life<span>Care</span></a>
                    <p class="mt-3 text-white-50">Providing advanced medical care with a focus on patient comfort and safety. Your health is our priority.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#doctors">Doctors</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Services</h5>
                    <ul>
                        <li><a href="#">Cardiology</a></li>
                        <li><a href="#">Neurology</a></li>
                        <li><a href="#">Orthopedics</a></li>
                        <li><a href="#">Dental Care</a></li>
                        <li><a href="#">Eye Care</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="text-white-50">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Health Street, Medical City</li>
                        <li><i class="fas fa-phone me-2"></i> +1 234 567 8900</li>
                        <li><i class="fas fa-envelope me-2"></i> info@lifecare.com</li>
                        <li><i class="fas fa-clock me-2"></i> Mon-Sun: 24 Hours</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-0">&copy; 2026 LifeCare Hospital | Powered by Ankit Kushwaha.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Script File Linked Here -->
    <script src="js/main.js"></script>
</body>
</html>