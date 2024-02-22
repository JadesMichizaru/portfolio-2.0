<!-- Bagian PHP
<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$id = $name = $email = $number = $msg = $subject  = "";
$name_err = $email_err = $number_err = $subject_err = $msg_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please Enter Correct Email address.";
    } else {
        $email = $input_email;
    }

    //   Validate Mobile Number
    $input_number = trim($_POST["number"]);
    if (empty($input_number)) {
        $number_err = "Please enter a Mobile Number.";
    } elseif (!filter_var($input_number)) {
        $number_err = "Please enter a valid number.";
    } else {
        $number = $input_number;
    }

    // Validate email subject
    $input_subject = trim($_POST["subject"]);
    if (empty($input_subject)) {
        $subject_err = "Please Enter the correct email Subject.";
    } else {
        $subject = $input_subject;
    }

    // Validate address
    $input_msg = trim($_POST["message"]);
    if (empty($input_msg)) {
        $msg_err = "Please enter a message!.";
    } else {
        $msg = $input_msg;
    }


    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($number_err) && empty($subject_err) && empty($msg_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO mail (name, email, number, subject, message, id) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_email, $param_number, $param_subject, $param_message, $param_id);

            // Set parameters
            $param_id = $id;
            $param_name = $name;
            $param_email = $email;
            $param_number = $number;
            $param_subject = $subject;
            $param_message = $msg;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: #contact");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?> -->

<!-- Bagian HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LOGO -->
    <link rel="shortcut icon" href="gallery/Logo.jpg" type="image/x-icon">
    <title>Jades | HomePage</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="aos/aos.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- header design -->
    <header class="header">
        <a href="#" class="logo">Jades. <span class="animate" style="--i:1;"></span></a>
        <div class="bx bx-menu" id="menu-icon"><span class="animate" style="--i:2;"></span></div>

        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#about">About</a>
            <a href="#journey">Journey</a>
            <a href="#gallery">Gallery</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>

            <span class="active-nav"></span>
            <span class="animate" style="--i:2;"></span>
        </nav>
    </header>

    <!-- home section design -->
    <section class="home" id="home">
        <div class="home-content">
            <h1>Hi, Im <span class="jades"></span></h1>
            <div class="text-animate">
                <h3>Back-End Web Developer</h3>
            </div>
            <p>Hi, let me introduce myself. My real name is Alif Akbar and I am a Back-End Developer.
                If you are interested in my project, you can contact me in the "Contact" section.</p>

            <div class="btn-box">
                <a href="#" class="btn">Hire Me</a>
                <a href="#" class="btn">Let's Talk</a>
            </div>
        </div>
        <div class="home-sci">
            <a target="_blank" href="https://www.facebook.com/bambang.budi.796774/"><i class='bi bi-facebook'></i></a>
            <a target="_blank" href="https://www.instagram.com/jades.michizaru/"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="https://github.com/JihyoooHeheha"><i class="bi bi-github"></i></a>
        </div>

        <!-- <div class="home-imgHover">

        </div> -->
    </section>
    <!-- about section design -->
    <section data-aos="fade-up" data-aos-duration="1000" class="about" id="about">
        <h3 class="heading">About <span>Me</span></h3>
        <div class="about-img">
            <img src="images/about.jpeg" title="About">
            <span class="circle-spin"></span>

        </div>

        <div class="about-content">
            <h3>BackEnd Web Developer</h3>
            <p>Hi, let me introduce myself. My real name is Alif Akbar and I am a BackEnd Developer.
                If you are interested in my project, you can contact me in the "Contact" section.
                IT'S YOU VS YOU
            </p>
            <div class="btn-box btns">
                <a href="#journey" class="btn" title="Read More">Read More</a>
            </div>
        </div>
    </section>

    <!-- education section design -->
    <section class="education" id="journey">
        <h2 class="heading">My <span>Journey</span></h2>

        <div class="education-row">
            <div data-aos="fade-right" data-aos-duration="1200" class="education-column">
                <h3 class="title">My Project</h3>

                <div class="education-box">
                    <div class="education-content">
                        <div class="content">
                            <div class="year">
                                <i class="bx bxs-calendar"></i>
                                2019 - 2020
                            </div>
                            <h3>Quiz And Personal Web</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam fugit ullam tenetur assumenda perferendis consequuntur
                                deleniti, natus quaerat enim fuga?
                            </p>

                        </div>
                    </div>

                    <div class="education-content">
                        <div class="content">
                            <div class="year">
                                <i class="bx bxs-calendar"></i>
                                2021 - 2022
                            </div>
                            <h3>Web Portfolio & CompanyWeb etc</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam fugit ullam tenetur assumenda perferendis consequuntur
                                deleniti, natus quaerat enim fuga?
                            </p>

                        </div>
                    </div>
                    <div class="education-content">
                        <div class="content">
                            <div class="year">
                                <i class="bx bxs-calendar"></i>
                                2023 - NOW
                            </div>
                            <h3>Asia Market</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam fugit ullam tenetur assumenda perferendis consequuntur
                                deleniti, natus quaerat enim fuga?
                            </p>

                        </div>
                    </div>

                </div>
            </div>

            <div data-aos="fade-left" data-aos-duration="1300" class="education-column">
                <h3 class="title">Experience</h3>

                <div class="education-box">
                    <div class="education-content">
                        <div class="content">
                            <div class="year">
                                <i class="bx bxs-calendar"></i>
                                2023 - Now
                            </div>
                            <h3>BackEnd Developer - Asia Market</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Quisquam fugit ullam tenetur assumenda perferendis consequuntur
                                deleniti, natus quaerat enim fuga?
                            </p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Gallery -->
    <section class="education" id="gallery">
        <h2 class="heading">My <span>Gallery</span></h2>

        <div class="about-content">
            <p>You can see all the results of my project on my github. <br> If you ask where the results of my enctaunty project are, I lost the folder because my laptop suddenly rebooted XD</p>
        </div>

        <div class="container">
            <img src="gallery/asia-market.png" title="Asia Market">
            <img src="gallery/high-school-web.png" title="High School Website">
            <img src="gallery/portfolio-1.0.png" title="Portfolio 1.0">
            <img src="gallery/quiz-project.png" title="Quiz Project">
            <img src="gallery/enctaunty.png" title="Enctaunty">
            <img src="gallery/coffee.png" title="Coffee Shop">
        </div>


        <!-- Footer -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        </div>
    </section>
    <!-- skills section design -->
    <section class="skills" id="skills">
        <h2 class="heading">My <span>Skills</span></h2>

        <div class="skills-row">
            <div data-aos="fade-right" data-aos-duration="1400" class="skills-column">


                <div class="skills-box">
                    <div class="skills-content">
                        <div class="progress">
                            <h3>CodeIgniter <span>50%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                        <div class="progress">
                            <h3>PHP <span>80%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                        <div class="progress">
                            <h3>Java <span>30%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                        <div class="progress">
                            <h3>Golang <span>60%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                        <div class="progress">
                            <h3>Laravel <span>75%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                        <div class="progress">
                            <h3>MySQL <span>70%</span></h3>
                            <div class="bar"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- contact section design -->
    <section class="contact" id="contact">
        <h2 class="heading">
            Contact <span>Me!</span>
        </h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-box">
                <div data-aos="fade-right <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>" data-aos-duration="2000" class="input-field">

                    <input name="name" type="text" placeholder="Full Name" required>
                    <span>
                        <?php echo $name_err; ?>
                    </span>
                    <span class="focus"></span>
                </div>
                <div data-aos="fade-left <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>" data-aos-duration="2100" class="input-field">
                    <input name="email" type="text" placeholder="Email Address" required>
                    <span>
                        <?php echo $name_err; ?>
                    </span>
                    <span class="focus"></span>
                </div>
            </div>

            <div class="input-box">
                <div data-aos="fade-right <?php echo (!empty($number_err)) ? 'has-error' : ''; ?>" data-aos-duration="2200" class="input-field">
                    <input name="number" type="number" min="0" placeholder="Mobile Number" required>
                    <span>
                        <?php echo $number_err; ?>
                    </span>
                    <span class="focus"></span>
                </div>
                <div data-aos="fade-left" data-aos-duration="2300" class="input-field <?php echo (!empty($subject_err)) ? 'has-error' : ''; ?>">
                    <input name="subject" type="text" placeholder="Email Subject" required>
                    <span>
                        <?php echo $subject_err; ?>
                    </span>
                    <span class="focus"></span>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-duration="2500" data-aos-delay="500" class="textarea-field <?php echo (!empty($msg_err)) ? 'has-error' : ''; ?>">
                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                <span>
                    <?php echo $msg_err; ?>
                </span>
                <span class="focus"></span>
            </div>

            <div class="btn-box btns">
                <button data-aos="fade-up" data-aos-duration="2700" data-aos-delay="500" type="submit" class="btn">
                    Submit
                </button>
            </div>
        </form>
    </section>
    <!-- footer design -->
    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy;
                <?php
                $currentDate = date('Y');
                echo $currentDate
                ?>
                by
                <a href="#" target="_blank" rel="noopener noreferrer">JadesCompany</a>
                | All Rights Reserved.
            </p>
        </div>


        <div class="footer-iconTop">

            <a href="#"><i class="bi bi-arrow-up-circle"></i></a>
        </div>
    </footer>
    <!-- JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // You can also pass an optional settings object
        // below listed default settings
        AOS.init({
            once: true, // whether animation should happen only once - while scrolling down

        });
    </script>
    <script src="aos/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/TextPlugin.min.js"></script>
    <script>
        gsap.registerPlugin(TextPlugin);
        gsap.to('.jades', {
            duration: 3,
            delay: 0.5,
            text: ' Jades Aces '
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>