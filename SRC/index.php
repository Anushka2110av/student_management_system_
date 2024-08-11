/**
 * This script serves as the homepage for the Student Management System.
 * It includes links to Home, Contact, Admission, and Login pages.
 * It uses Bootstrap for styling and layout.
 */
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

	<nav>
		<label class="logo">BITinfotech</label>

		<ul>
				<li><a href="index.php">Home</a></li> 
        <li><a href="contact.php">Contact</a></li> 
        <li><a href="admission.php">Admission</a></li> 
				<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>


	<div class="section1">
		
		<label class="img_text">Your door to technology</label>
		<img class="main_img" src="homepage.jpg">
	</div>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="welcome_img" src="welcomeimg.jpg">
				
			</div>

			<div class="col-md-8">

				<h1>Welcome to BITinfotech</h1>

				<p>At BitInfotech, we specialize in delivering cutting-edge technology solutions tailored to your business needs. Our team of experts is dedicated to providing top-notch services in web development, software engineering, digital marketing, and IT consulting. We are committed to driving innovation and excellence, ensuring your business stays ahead in the competitive digital landscape. Explore our services and discover how BitInfotech can help transform your ideas into reality.</p>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1>Meet Our Faculty</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="teacher1.jpeg">
                <h3>Dr. Jane Smith - Professor of Computer Science</h3>
				<p>Dr. Jane Smith brings over 15 years of experience in the field of computer science and information technology. With a Ph.D. from MIT, her research focuses on artificial intelligence and machine learning. Dr. Smith is passionate about fostering innovation and creativity in her students, encouraging them to push the boundaries of technology. Her work has been published in numerous prestigious journals, and she frequently speaks at international conferences. At BitInfotech, she aims to inspire the next generation of tech leaders.</p>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher2.jpeg">
                <h3>Dr. Michael Brown - Associate Professor of Software Engineering</h3>
				<p>Dr. Michael Brown is an esteemed associate professor with extensive expertise in software engineering and development. Holding a Ph.D. from Carnegie Mellon University, Dr. Brown has contributed significantly to the field through both his research and industry projects. His areas of specialization include software architecture, cloud computing, and cybersecurity. Dr. Brown is passionate about mentoring students and guiding them through complex software challenges, ensuring they gain hands-on experience and a deep understanding of the subject.</p>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="teacher3.jpeg">
                <h3>Ms. Laura Johnson - Lecturer in Digital Marketing</h3>
				<p>Ms. Laura Johnson is a dynamic and engaging lecturer specializing in digital marketing strategies and social media management. With a Master's degree from Stanford University and over a decade of industry experience, she has successfully led numerous high-impact marketing campaigns for Fortune 500 companies. Ms. Johnson is dedicated to equipping her students with practical skills and knowledge, preparing them for successful careers in the ever-evolving digital landscape.</p>
				
			</div>
			

		</div>
		

	</div>






	<center>
		<h1>Explore Our Courses</h1>
	</center>


	<div class="container">

		<div class="row">

			<div class="col-md-4">

				<img class="teacher" src="webdev.jpeg">
				<h3>Web Development</h3>
				
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="graphics.jpeg">
				<h3>Graphics Design</h3>
				
			</div>

			<div class="col-md-4">

				<img class="teacher" src="marketing.jpeg">
				<h3>Marketing</h3>
				
			</div>
			

		</div>
		

	</div>


	<center>
		<h1 class="adm-enq">Enquire For Admission</h1>
        

	</center>


	<div align="center" class="admission_form">

		<form>
			
		<div class="adm_int">
			<label class="label_text">Name</label>
			<input class="input_deg" type="text" name="">
		</div>

		<div class="adm_int">
			<label class="label_text">Email</label>
			<input class="input_deg" type="text" name="">
		</div>

		<div class="adm_int">
			<label class="label_text">Phone</label>
			<input class="input_deg" type="text" name="">
		</div>
		<div class="adm_int">
			<label class="label_text">Message</label>
			<textarea class="input_txt"></textarea>
		</div>

		<div class="adm_int" >
			
			<input class="btn btn-primary" id="submit" type="submit" value="apply" >
		</div>


		</form>
		
	</div>


	<footer>
		<h3 class="footer_text">All @copyright reserved by web tech knowledge</h3>
	</footer>


</body>
</html>