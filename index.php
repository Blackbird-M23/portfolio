<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farhan Miraz Shihab</title>
    

    
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="mediaqueries.css">
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Yatra One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Alumni Sans Pinstripe' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Convergence' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Darker Grotesque' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:500" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Revolution&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      

</head>

<body>
    <!-- <button id="scrollToTopBtn" title="Go to top"></button> -->
    <i id="scrollToTopBtn" class="fas fa-arrow-up" title="Go to top"></i>
    <!--  -->
    <Section id="home" class="home-section" >
        <div class="nav-home-div">
            <nav class="nav-class">
                <img id="logo-img" src="logo.jpg" alt="name_logo" >
                <div class="home-nav">
                    <input type="checkbox" id="click">
               
                    <label for="click" class="menu-btn">
                        
                    <i class="fas fa-bars"></i>
                    </label>
                                    
                    <ul>
                        <li><a class="active" href="#home">HOME</a></li>
                        <li><a href="#about">ABOUT ME</a></li>
                        <li><a href="#time">TIMELINE</a></li>
                        <li><a href="#project">PROJECTS</a></li>
                        <li><a href="#activity">ACTIVITIES</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                    </ul>
                
                </div>
            </nav>
        

        
    
            <div class="home-img-soc">
                <?php
                include 'include/config.php';
                $sql = "SELECT * FROM home";
                $result = mysqli_query($connecction, $sql);
                $data = mysqli_fetch_assoc($result);
                ?>

                <div id="home-img">
                    <?php echo "<img src='{$data['home_img_src']}' alt='{$data['home_img_alt']}' >" ?>
                </div>
                <!-- UPDATE home_social
SET img_alt = 'Github Profile'
WHERE social_img_src = 'github.png'; -->
                

                <div id="socials">
                    <div id = "socials-intro">
                        <p>Hi! I'm
                            <h2 class="MyName">Farhan Miraz Shihab</h2> 
                            <?php echo $data['para'] ?> 
                    </div>
                    <?php
                    $sql = "SELECT * FROM home_social";
                    $result = mysqli_query($connecction, $sql);
                    ?>
                    <div class="social-links"> 
                        
                        <?php
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<img src='{$data['social_img_src']}' alt='{$data['img_alt']}' onclick=\"window.open('{$data['link']}')\" height='30' width='30'>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <img src="arrow-up.png" alt="upButton" class="scrollToTopBtn" height="20px" width="20px"> -->
    </Section>

    <hr class="rounded">
    <br>
    <br>

    <section id="about"  class="about-me">
        <div class="about-me-container">
            <div class="about-me-header">
                <p style="font-family: Garamond, serif">learn more</p>
                <h2 style="font-family: 'Yatra one'">About me</h2>
            </div>
            <?php
        
            $sql = "SELECT * FROM about_me where id = 1;";
            $result = mysqli_query($connecction, $sql);
            if ($result) {
                $data = mysqli_fetch_assoc($result);
                    echo '<div class="about-img">';
                    echo "<img src='{$data['about_img_src']}' alt='{$data['about_img_alt']}' height='30' width='30'>";
                    echo '</div>';
                    echo '<div class="about-paragraph">';
                    echo '<p class="about-p" style="font-family: \'Courier New\', monospace;">';
                    echo $data["para"];
                    echo '</p>';
                    echo '</div>';
                }
            ?>

            <!-- <div class="about-img">
                <img src="my_image.jpg" alt="my_image" >
            </div>
            
            <div class="about-paragraph">
                <p class="about-p" style="font-family: 'Courier New'" , monospace>
                    I am from Bangladesh and currently an undergraduate 3<sup>rd</sup> year student of Computer Science and
                    Engineering at <a href="https://www.kuet.ac.bd/" target="_blank"><strong>Khulna University of Engineering &
                            Technology. </strong></a>I have created some <strong>Projects</strong> using c++ and java. I am in a
                    pursuit of gaining new skills. I like to learn and am learning new things and trying to apply those
                    knowledge in my life. I like to read books, sketch, watch movies, go on tours in my leisure time.
                </p>
            </div> -->
        </div>

        <h2 class="exp" style="text-align:center;">Experience</h2>
        <section id="experience">
            <div class="exp-details-container">  
                    <div class="skills-container"            style="background-color: lightblue;">
                        <h3 class="skill-tools" style="color: rgb(15, 53, 86);">Languages </h3>

                        <?php
                        // include 'include/config.php';
                        $query = "SELECT * FROM experience where skills_tools ='language'";
                        $result = mysqli_query($connecction, $query);

                        if ($result) {
                            echo '<div class="skill-details-container">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<article>';
                                echo '<div>';
                                echo '<h4>' . $row['skills_tools_name'] . '</h4>';
                                echo '<p>' . $row['proficiency_level'] . '</p>';
                                echo '</div>';
                                echo '</article>';
                            }
                            
                            echo '</div>';
                        } else {
                            echo "Error: " . mysqli_error($connection);
                        }

                        ?>

                        <!-- <div class="skill-details-container">
                            <article>
                                <div>
                                    <h4>C</h4>
                                    <p>Experienced</p>
                                </div>
                            </article>
                            <article>
                                <div>
                                    <h4>C++</h4>
                                    <p>Experienced</p>
                                </div>
                            </article>
                            <article>
                                <div>
                                    <h4>Java</h4>
                                    <p>Intermediate</p>
                                </div>
                            </article>
                        </div> -->
                    </div>
                    <div class="skills-container" style="background-color: rgb(238, 242, 199);">

                        <h3 class="skills-tools" style="color: rgb(255, 135, 95);">Tools</h3>
                        <?php
                        $query = "SELECT * FROM experience where skills_tools ='tool'";
                        $result = mysqli_query($connecction, $query);

                        if ($result) {
                            echo '<div class="skill-details-container">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<article>';
                                echo '<div>';
                                echo '<h4>' . $row['skills_tools_name'] . '</h4>';
                                echo '<p>' . $row['proficiency_level'] . '</p>';
                                echo '</div>';
                                echo '</article>';
                            }
                            
                            echo '</div>';
                            mysqli_free_result($result);
                        } else {
                            echo "Error: " . mysqli_error($connection);
                        }
                        ?>
                    </div>
            </div>
        </section>
    </section>

    <br>
    <br>
    <hr class="rounded">
    <br>

    <section id="time"  class="timeline">
        <h1 style="font-family: 'Cinzel Decorative'; text-align: center; font-size: xx-large;margin-bottom: 3.5rem; margin-top: 2rem; ">My Timeline</h1>
        <div class="timeline-containers-container">
            <br>
            <br>
           <?php
            $query = "SELECT * FROM timeline_data ORDER BY id DESC;";
            $result = mysqli_query($connecction, $query);

            if ($result) {
                echo '<div class="timeline-container">';
                echo '<ul>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>';
                    echo '<div class="timeline-details">';
                    echo '<img src="' . $row['logo_path'] . '" alt="' . $row['logo_alt'] . '" height="28" width="28">';
                    echo '<a href="' . $row['link'] . '" target="_blank"><strong>' . $row['institution_name'] . '</strong></a>';
                    echo '<p style="font-family: Garamond, serif;">' . $row['description'] . '</p>';
                    echo '</div>';
                    echo '</li>';
                }

                echo '</ul>';
                echo '</div>';

                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($connection);
            }
            ?>
        

            <!-- <div class="timeline-container">
                <ul>
                    <li>
                        <div class="timeline-details">
                            <img src="KUET_logo.png" alt="KUET logo" height="28" width="28">
                            <a href="https://www.kuet.ac.bd/" target="_blank"><strong>Khulna University of Engineering &
                                    Technology, Khulna, Bangladesh</a>
                            <p style="font-family: Garamond, serif">
                                currently an undergraduate student
                            </p>
                        </div>
                    </li>
    
                    <li>
                        <div class="timeline-details">
                            <img src="Joseph_logo.png" alt="St. Joseph logo" height="28" width="28">
                            <a href="https://sjs.edu.bd/new/index.php" target="_blank"><strong>St. Joseph Higher Secondary
                                    School, Dhaka, Bangladesh</a>
                            <p class="time" style="font-family: Garamond, serif">
                                <b>2018-2020</b>
                            </p>
                        </div>
                    </li>
    
                    <li>
                        <div class="timeline-details">
                            <img src="bindubasini.png" alt="bindubasini logo" height="28" width="28">
                            <a href="http://bindubashinigovboysschool.edu.bd/">Bindubasini Govt. Boys' High School, Tangail,
                                Bangladesh</a>
                            <p class="time" style="font-family: Garamond, serif;">
                                <b>2014-2018</b>
                            </p>
                        </div>
                    </li>
                </ul>
            </div> -->
            
        </div>
    </section>

    <br>
    <br>
    <hr class="rounded">
    <br>
    <br>

    <section id="project" class="projects">
        <p style="font-family: 'Alumni Sans Pinstripe'; font-size: 20px; text-align: center; margin-top: 2rem;">My Recent</p>
        <h2 style="font-family: 'Convergence'; font-size: xx-large; text-align: center;margin-bottom: 3rem;">Projects</h2>
        <br>
        <div class="project-container">
            <?php

            $query = "SELECT * FROM projects";
            $result = mysqli_query($connecction, $query);

            if ($result) {
                echo '<div class="project-holder">';
                echo '<ul>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>';
                    echo '<div class="project-details">';
                    echo '<div class="project-img">';
                    echo '<img src="' . $row['project_image'] . '" alt="' . $row['project_name'] . '" height="190" width="250">';
                    echo '</div>';
                    echo '<div class="project-description">';
                    echo '<h3>' . $row['project_name'] . '</h3>';
                    echo '<p style="font-family: \'Cormorant\'">' . $row['project_description'] . '<br>';
                    echo '<button class="code_link_button" onclick="window.open(\'' . $row['code_link'] . '\', \'_blank\')">Code Link</button>';
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                }

                echo '</ul>';
                echo '</div>';

                mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($connection);
            }
            ?>
        </div>

            <!-- <div class="project-holder">
                <ul>
                    <li>
                        <div class="project-details">
                            <div class="project-img">
                                <img src="food.jpg" alt="food management system" height="190" width="250">
                            </div>
                            <div class="project-description">
                                <h3>Food Management System</h3>
                                        <p style="font-family: 'Cormorant'">I had created a simple food management system using C++ which willrun on terminal, where it could be used for the cashier. It would show the menu for the customer and it would show which items the customer has choosen and in the end, it would show a bill of the order.it would show which items the customer has choosen and in the end, it would show a bill of the order.
                                    <br>
                                    <button id = "link_button1" class="code_link_button"
                                        onclick="window.open('    
            <div class="project-holder">
                <ul>
                    <li>
                        <div class="project-details">
                            <div class="project-img">
                                <img src="food.jpg" alt="food management system" height="190" width="250">
                            </div>
                            <div class="project-description">
                                <h3>Food Management System</h3>
                                <p style="font-family: 'Cormorant'">I had created a simple food management system using C++ which will
                                    run on terminal, where it could be used for the cashier. It would show the menu for the customer and
                                    it would show which items the customer has choosen and in the end, it would show a bill of the
                                    order.
                                    <br>
                                    <button id = "link_button1" class="code_link_button"
                                        onclick="window.open('https://github.com/N8-Hawk/OOP_lab', '_blank')">Code Link</button>
                                </p>
                            </div>
                        </div>
                        
                        INSERT INTO projects (project_name, project_image, project_description, github_link)
  
                    </li>
                    <li>
                        <div class="project-details">
                            <div class="project-img">
                                <img src="school.jpg" alt="school management system" height="190" width="250">
                            </div>
                            <div class="project-description">
                                <h3>School Management System</h3>
                                <p style="font-family: 'Cormorant'">This project was made using java and swing. It will keep track of the school data using mysql database. Teachers, students can be added, deleted and their data can also be updated. Students result can be stored for different terms and their data is kept according to their class. A simple JSON file was used for storing the class routine of the school.
                                <br>
                                <button id = "link_button2" class="code_link_button" onclick="window.open('https://github.com/Blackbird-M23/Advance_Programming', '_blank')" >Code Link</button>
                                </p>
                            </div>
                        </div>
                       
                    </li>
                </ul>
            </div>
            
       </div> -->
    </section>

    <br><br>
    <hr class="rounded">
    <br><br>

    <section id="activity"  class="activities">
        <h1 style="font-family: 'Cinzel Decorative'; text-align: center; margin-top:2rem; margin-bottom: 3.5rem; font-size: xx-large;">Activities</h1>
        <div>
            <div class="books-div">
                <h2 style="font-family: Protest Revolution , sans-serif; font-size: 25px; margin-bottom: 1.6rem; text-align: center;">Books</h2>
                <br>

                <!-- <div class="fav-book">
                        <h3 style="text-align: center;
                        font-family: Protest Strike, sans-serif; background-color: antiquewhite; margin-bottom: 1rem;">Favourite</h3> -->

                <?php

                /*$query = "SELECT * FROM favorite_books";
                $result = mysqli_query($connection, $query);

                if ($result) {
                    echo '<ul>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li>';
                        echo '<div class="book-description">';
                        echo '<img src="' . $row['image_path'] . '" alt="' . $row['book_title'] . '" height="290" width="250">';
                        echo '<p style="font-family: \'Darker Grotesque\'">' . $row['description'] . '<br>';
                        echo 'One of my most favourite books of <a href="' . $row['author_link'] . '" target="_blank">' . $row['author_name'] . '</a>.';
                        echo '</p>';
                        echo '</div>';
                        echo '</li>';
                    }

                    echo '</ul>';
                    echo '</div>';

                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($connection);
                } */

                 ?>


                    <div class="fav-book">
                        <h3 style="text-align: center;
                        font-family: Protest Strike, sans-serif; background-color: antiquewhite; margin-bottom: 1rem;">Favourite</h3>
                        <ul>
                            <li>
                                <div class="book-description">
                                    <img src="bibhutibhushan-bandyopadhyay-chander-pahar.jpg" alt="Chander Pahar" height="290"
                                    width="250">
                                <p style="font-family: 'Darker Grotesque'">One of my most favourite books of <a
                                        href="https://www.google.com/search?client=firefox-b-d&q=bivuti+bhushan+bandopadhyay"
                                        target="_blank">Bibhutibhushan Bandyopadhyay.</a> This novel introduces us with Shankar a Bengali boy who secures a job in Uganda Railway station, whose life & fate is going to change by the adventure he is going to be in Africa.
                                </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="recent-book">
                        <h3 style="text-align: center;
                        font-family: Protest Strike, sans-serif; background-color: rgb(99, 180, 211); margin-bottom: 1rem;">Recent read</h3>
                        <ul>
                            <li>
                                <div class="book-description">
                                    <img src="Inferno-cover.jpg" alt="Inferno" height="290" width="250">
                                    <p style="font-family: 'Darker Grotesque'">
                                        This novel of <a href="https://www.google.com/search?client=firefox-b-d&q=dan+brown"
                                            target="_blank">Dan Brown</a> features Robert Langdon, a professor of Religious Iconology
                                        and "symbology" (a fictional field related to the study of historic symbols, which is not
                                        methodologically connected to the actual discipline of semiotics) who finds himself in a
                                        hospital in Italy suffering from amnesia, unable to comprehend his predicament and what secrects
                                        he have to unveil to describe his visions.
                                    </p>
                                </div>
                            </li>
                        </ul>   
                    </div>  
            </div>
            <!-- <div>
                <h3 style="font-family: Protest Revolution , sans-serif; font-size: 25px; margin-bottom: 1.6rem; text-align: center;">Sketch</h3>
            </div> -->
            <div >
                <h3 style="font-family: Protest Revolution , sans-serif; font-size: 25px; margin-bottom: 3rem; text-align: center;">Tours</h3>
                <div class="tours_pic">
                    <?php
                    $sql = "SELECT * FROM tours";
                    $result = mysqli_query($connecction, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="tour-img">';
                            echo '<img src="' . $row["image_src"] . '" alt="' . $row["image_alt"] . '" height="290" width="350">';
                            echo '<p>' . $row["description"] . '</p>';
                            echo '</div>';
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

    <br><br>
    <hr class="rounded">
    <br>

    <section id="contact"  class="contact-me">
        <h2 style="font-family: 'Cinzel Decorative', sans-serif; text-align: center; margin:2rem">Contact me</h2>
        <section id="contact" class="contact contact-section">
            <div class="contact-container">
                <div class="card-wrapper">
                    <div class="card">
                        <img src="./images/call.png" alt="">
                        <h1>Call Me On</h1>
                        <h5>01767777470</h5>
                    </div>
                    <div class="card">
                        <img src="./images/email.png" alt="">
                        <h1>Email Me At</h1>
                        <h5>fmsmiraz@gmail.com</h5>
                    </div>
                    <div class="card">
                        <img src="./images/location.png" alt="">
                        <h1>Address</h1>
                        <h5>Dept. of CSE, KUET, Khulna, Bangladesh</h5>
                    </div>

                    <?php
                    $sql = "SELECT * FROM home_social";
                    $result = mysqli_query($connecction, $sql);
                    ?>
                    <div class="card-wrapper-socials">
                        <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                                echo "<img src='{$data['social_img_src']}' alt='{$data['img_alt']}' onclick=\"window.open('{$data['link']}')\" height='25' width='25'>";
                            }
                            mysqli_free_result($result);
                            ?>
                    </div>

                </div>
                
                <div class="message-div">
                
                    <!-- // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    //     $name = $_POST["name"];
                    //     $email = $_POST["email"];
                    //     $subject = $_POST["subject"];
                    //     $message = $_POST["body"];

                    //     $sql = "INSERT INTO your_table_name (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

                    //     if (mysqli_query($connection, $sql)) {
                    //         echo "Message sent successfully.";
                    //     } else {
                    //         echo "Error: " . $sql . "<br>" . mysqli_error($connecction);
                    //     }
                    // }
                    */ -->
                

                    <div class="message-div-header">
                        <h1>Message me</h1>
                    </div>
                    <form class="form-class"  action= "include/datainfo.php" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" name="name" placeholder="Name" required="">
                            </div>
                            <div class="field email">
                                <input type="email" name="email" placeholder="Email" id="email" required="">
                            </div>
                            <div class="field subject">
                                <input type="text" name="subject" placeholder="Subject" id="subject" required="">
                            </div>
                        
                            <div class="field textarea">
                                <textarea cols="30" rows="10" name="message" placeholder="Message.." id="body" required=""></textarea>
                            </div>
                        </div>
                        <div class="btn__container__contact">
                            <button class="btn btn-color-1" type="submit">Send message</button>
                        </div>
                    </form>
                </div>                
            </div>
        </section>
    </section>

    <footer>
        <img class="footer-logo" src="./images/logo.png" alt="">
        <div class="copyright">
            <p style=" font-family: 'Courier New'; font-size: small; margin-top: 1rem;">Copyright 2024 © Farhan Miraz Shihab</p>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/4819b39a8f.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    
</body>

</html>