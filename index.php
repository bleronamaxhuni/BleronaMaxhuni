<?php

    $conn = mysqli_connect('localhost','root','','contact_db') or die('connection failed');

    if(isset($_POST['send'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $msg = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
        
        if(mysqli_num_rows($select_message) > 0){
            $message[] = 'message sent already!';
        }else{
            mysqli_query($conn, "INSERT INTO `contact_form`(name, email , number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
            $message[] = 'message sent successfully!';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blerona's Personal Portfolio</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e1659de1de.js" crossorigin="anonymous"></script>
</head>

<body>
<?php

    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>

    <header>
        <div class="top-header">
            <div class="email">
                <p><img class="envelope" src="./icons/envelope-solid.png" alt=""> bleronamaxhunni@gmail.com</p>
            </div>
            <div class="social-media">
                <a href="https://www.facebook.com/blerona.maxhuni.58/"><img class="facebook" src="./icons/facebook-brands.png" alt=""></a>
                <a href="https://www.instagram.com/bleronamaxhunni/"><img class="instagram" src="./icons/instagram-brands.png" alt=""></a>
            </div>
        </div>
        <nav class="navbar">
            <ul class="links">
                <li><a href="#home">HOME</a></li>
                <li><a href="#about">ABOUT ME</a></li>
                <li><a href="#projects">PROJECTS</a></li>
                <li><a href="#contact">CONTACT ME</a></li>
            </ul>
            <button class="navbar-toggler">
                <span></span>
            </button>
        </nav>
    </header>

    <section>
        <div class="introduction container" id="home">
            <div class="my-name">
                <h1>Blerona Maxhuni</h1>
            </div>
            <br>
            <div class="my-occupation">
                <p class="now">Junior Front-End Developer</p>
                <p class="wanna-be">PHP | MYSQL Intern</p>
            </div>
        </div>
    </section>


    <section>
        <div class="about-me">
            <div class="programming-language-img">
            </div>
            <h2 class="a-tittle">About Me</h2>
            <p class="about-paragraph">I am an undergraduate student at the University of Business and Technology (UBT), studying Computer Science and Engineering (CSE).I completed some courses such as HTML5, CSS including Bootstrap and SCSS, basic Javascript. I have experience with Java, SQL, Algorithms and data structures. I’m also familiar with Adobe XD and Photoshop. I am interested in expanding my knowledge much more and this training is what I need. I made a few small and simple websites to improve my coding skills.
            </p>
        </div>
    </section>

    <section>
        <div class="my-skills">
            <div class="skills">
                <div class="skills-bar">
                    <div class="bar">
                        <div class="info">
                            <span>HTML</span>
                        </div>
                        <div class="progress-line"><span class="html"></span></div>
                    </div>
                    <div class="bar">
                        <div class="info">
                            <span>CSS</span>
                        </div>
                        <div class="progress-line"><span class="css"></span></div>
                    </div>
                    <div class="bar">
                        <div class="info">
                            <span>BOOTSTRAP</span>
                        </div>
                        <div class="progress-line"><span class="bootstrap"></span></div>
                    </div>
                    <div class="bar">
                        <div class="info">
                            <span>SCSS</span>
                        </div>
                        <div class="progress-line"><span class="scss"></span></div>
                    </div>
                    <div class="bar">
                        <div class="info">
                            <span>JAVASCRIPT</span>
                        </div>
                        <div class="progress-line">
                            <span class="javascript"></span>
                        </div>
                    </div>
                    <div class="bar">
                        <div class="info">
                            <span>PHP</span>
                        </div>
                        <div class="progress-line"><span class="php"></span></div>
                    </div>
                </div>
            </div>
            <div class="my-github">
                <div class="git-tittle">
                    <h2>My GitHub Account</h2>
                </div>
                <a href="https://github.com/bleronamaxhuni" class="git-link">bleronamaxhuni - GitHub</a>
            </div>
        </div>
    </section>

    <section class="projects-box" id="projects">
        <h2 class="project-tittle">Check My Projects</h2>
        <br>
        <hr>
        <div class="my-projects">
            <div class="project-card">
                <img class="card-img-top" src="./img/Screenshot (149).png" style="width: 100%;">
                <div class="card-link">
                    <a href="https://zkm.netlify.app/" class="checkBtn">Get a better look</a>
                </div>
            </div>
            <div class="project-card">
                <img class="card-img-top" src="./img/Screenshot (151).png" style="width: 100%;">
                <div class="card-link">
                    <a href="https://autosaloon.netlify.app/" class="checkBtn">Get a better look</a>
                </div>
            </div>
        </div>
        <div class="my-projects" id="show-more" style="display: none;">
            <div class="project-card" id="show-more">
                <img class="card-img-top" src="./img/Screenshot (152).png" style="width: 100%;">
                <div class="card-link">
                    <a href="https://errorsoftware.netlify.app/" class="checkBtn">Get a better look</a>
                </div>
            </div>
            <div class="project-card" id="show-more">
                <img class="card-img-top" src="./img/Screenshot (153).png" style="width: 100%;">
                <div class="card-link">
                    <a href="https://our-company.netlify.app/" class="checkBtn">Get a better look</a>
                </div>
            </div>
        </div>
        <div class="showBtn">
            <button onclick="toggleText()" id="myBtn">Show More</button>
        </div>
    </section>

    <section class="contact" id="contact">
        <h1 class="contact-tittle" data-aos="fade-up"> <span>Contact Me</span> </h1>
        <br>
        <hr class="hr">
        <br>
        <form action="" method="post">
            <div class="flex">
                <div class="input">
                    <input data-aos="fade-right" type="text" name="name" placeholder="Your Full Name..." class="box" required>
                    <input data-aos="fade-left" type="email" name="email" placeholder="Your Email..." class="box" required>
                    <input data-aos="fade-up" type="number" name="number" placeholder="Your Phone Number..." class="box" required>
                </div>
                <div class="my-message">
                    <textarea data-aos="fade-up" name="message" class="box" required placeholder="Message" cols="30" rows="10"></textarea>
                </div>
                <br>
                <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btnSend">
            </div>
        </form> 
    </section>


    <footer>
        <div class="socials">
            <div class="title-social">
                <h3>My Social Media</h3>
                &nbsp; 
                &nbsp; 
                &nbsp; 
                <div class="socials-icons">
                    <a href="https://www.facebook.com/blerona.maxhuni.58/"><img class="facebook" src="./icons/facebook-brands.png" alt=""></a>
                    <a href="https://www.instagram.com/bleronamaxhunni/"><img class="instagram" src="./icons/instagram-brands.png" alt=""></a>
                </div>
            </div>
            <div class="my-email">
                <p><img class="envelope" src="./icons/envelope-solid.png" alt=""> bleronamaxhunni@gmail.com</p>
            </div>
        </div>

        <div class="copyright">
            <p class="paragraph-copy">BleronaMaxhuni@2022</p>
        </div>
    </footer>


    <script>
        //  Responsive Navbar 
        const navbarToggler = document.querySelector(".navbar-toggler");
        const navbarMenu = document.querySelector(".navbar ul");
        const navbarLinks = document.querySelectorAll(".navbar a");

        navbarToggler.addEventListener("click", navbarTogglerClick);

        function navbarTogglerClick() {
            navbarToggler.classList.toggle("open-navbar-toggler");
            navbarMenu.classList.toggle("open");
        }

        navbarLinks.forEach(elem => elem.addEventListener("click", navbarLinkClick));

        function navbarLinkClick() {
            if (navbarMenu.classList.contains("open")) {
                navbarToggler.click();
            }
        }
        // SHOW MORE / LESS BUTTON
        function toggleText() {
            var x = document.getElementById("show-more");
            var y = document.getElementById("myBtn")
            if (x.style.display === "none") {
                x.style.display = "flex";
                y.innerHTML = "Show Less";

            } else {
                x.style.display = "none";
                y.innerHTML = "Show More";
            }
        }
    </script>
</body>

</html>