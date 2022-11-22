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
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
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
   <title>Royalcoder</title>
   <link rel="shortcut icon" sizes="2x2" href="https://img.freepik.com/free-vector/royal-crown-logo-concept-premium-icon-design_1017-26075.jpg?auto=format&h=200">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

   <!-- aos css link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- header section starts  -->

<header class="header">

   <div id="menu-btn" class="fas fa-bars"></div>

   <a href="#home" class="logo">Portfolio</a>

   <nav class="navbar">
      <a href="#home" class="active">home</a>
      <a href="#about">about</a>
      <a href="#services">services</a>
      <a href="#portfolio">portfolio</a>
      <a href="#contact">contact</a>
      <a href="login/login.php">Login</a>
      <!-- <a href="#contact">contact</a> -->
   </nav>

   <div class="follow">
      <a href="https://www.facebook.com/gcgalget/" class="fab fa-facebook-f"></a>
      <a target="_blank" href="https://api.twitter.com/send?phone=918058292487&text=I%20have%20checked%20your%20website.%20I%20am%20interested%20in%20your%20services." class="fab fa-twitter"></a>
      <!-- <a href="#" class="fab fa-instagram"></a> -->
      <a target="_blank" href="https://api.whatsapp.com/send?phone=919636724328&text=I%20have%20checked%20your%20website.%20I%20am%20interested%20in%20your%20services." class="fab fa-whatsapp"></a>
      <a href="https://www.linkedin.com/in/ak-khinda-1498a9252/" class="fab fa-linkedin"></a>
      <a href="https://github.com/" class="fab fa-github"></a>
      <!-- <a target="_blank" href="live:.cid.a544107d72b5de4d" class="fab fa-skype"></a> -->
      <a target="_blank" href="https://web.skype.com/" class="fab fa-skype"></a>
      <!-- <a target="_blank" href="https://web.skype.com/send?phone=917230988522&text=I%20have%20checked%20your%20website.%20I%20am%20interested%20in%20your%20services." class="fab fa-skype"></a> -->
   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="image" data-aos="fade-right">
      <img src="images/11.png" alt="">
   </div>

   <div class="content">
      <h3 data-aos="fade-up">hi, i am Ak Khinda</h3>
      <span data-aos="fade-up">web designer & developer</span>
      <p data-aos="fade-up">With our innovative and insightful technology, we strive to enhance our users’ every day experiences. Founded in 2022, our incredible team of engineers, programmers, designers and marketers have worked tirelessly to bring Khinda Develope to the forefront of the industry. We will continue to work relentlessly to become the technological standard, providing big picture insights and solutions for companies of all sizes. Get in touch to learn more.</p>
      <a data-aos="fade-up" href="#about" class="btn">about me</a>
   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading" data-aos="fade-up"> <span>biography</span> </h1>

   <div class="biography">

      <p data-aos="fade-up">Web design is the visual look of a website and the functionality from a user's perspective. Web designers often work within design software like Figma or Adobe XD to create visually appealing user experiences. They then hand those designs off to developers.</p>

      <div class="bio">
         <h3 data-aos="zoom-in"> <span>name : </span> Ak Khinda </h3>
         <h3 data-aos="zoom-in"> <span>email : </span> codewithkhinda@gmail.com </h3>
         <h3 data-aos="zoom-in"> <span>address : </span> Anupgarh, india </h3>
         <h3 data-aos="zoom-in"> <span>phone : </span> +91-72309-88522 </h3>
         <h3 data-aos="zoom-in"> <span>age : </span> 17 years </h3>
         <h3 data-aos="zoom-in"> <span>experience : </span> 2+ years </h3>
      </div>

      <a href="6t (AutoRecovered).pdf" class="btn" data-aos="fade-up">download CV</a>

   </div>
   
   <div class="skills" data-aos="fade-up">

      <h1 class="heading"> <span>skills</span> </h1>

      <div class="progress">
         <div class="bar" data-aos="fade-left"> <h3><span>HTML</span> <span>95%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>CSS</span> <span>90%</span></h3> </div>
         <div class="bar" data-aos="fade-left"> <h3><span>JavaScript</span> <span>85%</span></h3> </div>
         <div class="bar" data-aos="fade-right"> <h3><span>PHP</span> <span>90%</span></h3> </div>
      </div>

   </div>

   <div class="edu-exp">

      <h1 class="heading" data-aos="fade-up"> <span>education & experience</span> </h1>

      <div class="row">

         <div class="box-container">

            <h3 class="title" data-aos="fade-right">education</h3>

            <div class="box" data-aos="fade-right">
               <span>( 2019 - 2020 )</span>
               <h3>web designer</h3>
               <p> 2019 web design trends will see these two sides of the coin—aesthetics and technology—come together like never before.</p>
            </div>

            <div class="box" data-aos="fade-right">
               <span>( 2020 - 2021 )</span>
               <h3>web developer</h3>
               <p>Before you jump into a new career, it’s important to consider the path ahead. Can your new industry offer you ample.</p>
            </div>

            <div class="box" data-aos="fade-right">
               <span>( 2021 - 2022 )</span>
               <h3>graphic designer</h3>
               <p>According to traditional beliefs, minimalism combines black text with white background, but as a rule. </p>
            </div>

         </div>

         <div class="box-container">

            <h3 class="title" data-aos="fade-left">experience</h3>

            <div class="box" data-aos="fade-left">
               <span>( 2019 - 2020 )</span>
               <h3>front-end developer</h3>
               <p>you see on a website is built with front end development (sometimes also called “front end web development”).</p>
            </div>

            <div class="box" data-aos="fade-left">
               <span>( 2020 - 2021 )</span>
               <h3>back-end developer</h3>
               <p>Back end developers are in hot demand and there are some essential skills you’ll need to learn if you want to become one.</p>
            </div>

            <div class="box" data-aos="fade-left">
               <span>( 2021 - 2022 )</span>
               <h3>full-stack developer</h3>
               <p>

This you the complete roadmap of full-stack developer with which any person can become a successful developer.</p>
            </div>

         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading" data-aos="fade-up"> <span>services</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-code"></i>
         <h3>web development</h3>
         <p>Web development is the work involved in developing a website for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-paint-brush"></i>
         <h3>graphic design</h3>
         <p>Graphic Design Is A Profession, Applied Art And Academic Discipline Whose Activity Consists In Projecting Visual Communications Intended To Transmit Specific Messages To Social Groups, With Specific Objectives. Graphic Design Is An Interdisciplinary Branch.  </p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-bootstrap"></i>
         <h3>bootstrap</h3>
         <p>Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains HTML, CSS and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-chart-line"></i>
         <h3>seo marketing</h3>
         <p>Search engine optimization is the process of improving the quality and quantity of website traffic to a website or a web page from search engines. SEO targets unpaid traffic rather than direct traffic or paid traffic.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fas fa-bullhorn"></i>
         <h3>digital marketing</h3>
         <p>Digital marketing is the component of marketing that uses the Internet and online based digital technologies such as desktop computers, mobile phones and other digital media and platforms to promote products and services.</p>
      </div>

      <div class="box" data-aos="zoom-in">
         <i class="fab fa-wordpress"></i>
         <h3>wordpress</h3>
         <p>WordPress Is A Free And Open-Source Content Management System Written In Hypertext Preprocessor Language And Paired With A MySQL Or MariaDB Database With Supported HTTPS. Features Include A Plugin Architecture And A.</p>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- portfolio section starts  -->

<section class="portfolio" id="portfolio">

   <h1 class="heading" data-aos="fade-up"> <span>portfolio</span> </h1>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
         <img src="images/img-1.jpg" alt="">
         <h3>clay mouse arrow purple</h3>
         <span></span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-2.jpg" alt="">
         <h3>fruit orange</h3>
         <span></span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-3.jpg" alt="">
         <h3>Pineapple</h3>
         <span></span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-4.jpg" alt="">
         <h3>
avocado minimalist</h3>
         <span></span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-5.jpg" alt="">
         <h3>Black mug on wooden coaster</h3>
         <span></span>
      </div>

      <div class="box" data-aos="zoom-in">
         <img src="images/img-6.jpg" alt="">
         <h3>Visual matches</h3>
         <span></span>
      </div>

   </div>

</section>

<!-- portfolio section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading" data-aos="fade-up"> <span>contact me</span> </h1>

   <form action="" method="post">
      <div class="flex">
         <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
         <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box" required>
      </div>
      <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box" required>
      <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
      <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
   </form>

   <div class="box-container">

      <div class="box" data-aos="zoom-in">
        <a target="_blank" href="tel:+917230988522"><i class="fas fa-phone"></i>
        </a>
         <h3>phone</h3>
         <!-- <a href="https://github.com/" class="fab fa-whatsapp"></a> -->
         <p>+91-72309-88522</p>
      </div>

      <div class="box" data-aos="zoom-in">
        <a target="_blank" href="mailto:codewithkhinda@gmail.com"><i class="fas fa-envelope"></i>
        </a> 
         <h3>email</h3>
         <p>codewithkhinda@gmail.com</p>
      </div>

      <div class="box" data-aos="zoom-in">
       <a target="_blank" href="https://goo.gl/maps/ipmX7dbx8Ph4sDeT9">  <i class="fas fa-map-marker-alt"></i>
       </a>
         <h3>address</h3>
         <p>Anupgarh, india - 335701</p>
      </div>

   </div>

</section>

<!-- contact section ends -->

<div class="credit">   <?php echo date('Y'); ?> <span>My New Website</span> website share and login</div>












<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- aos js link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

   AOS.init({
      duration:800,
      delay:300
   });

</script>
   
</body>
</html>