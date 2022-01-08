@extends('front.layouts.app')

@section('page-part')


	<!-- mian banner section starts -->

	<div class="resume-container">
		<div class="shadow-1-strong bg-white my-5" id="intro">
		   <div class="bg-info text-white">
			  <div class="cover bg-image">
				 <img src="images/header-background.jpg"/>
				 <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);backdrop-filter: blur(2px);">
					<div class="text-center p-5">
					   <div class="avatar p-1"><img class="img-thumbnail shadow-2-strong" src="{{ asset('front/images/avatar.jpeg') }}" width="160" height="160"/></div>
					   <div class="header-bio mt-3">
						  <div data-aos="zoom-in" data-aos-delay="0">
							 <h2 class="h1">Sanjay Adhikari</h2>
							 <p>Sr. Web Developer</p>
						  </div>
						  <div class="header-social mb-3 d-print-none" data-aos="zoom-in" data-aos-delay="200">
							 <nav role="navigation">
								<ul class="nav justify-content-center">
								   <li class="nav-item"><a class="nav-link" href="https://twitter.com/snjy07" title="Twitter"><i class="fab fa-twitter"></i><span class="menu-title sr-only">Twitter</span></a>
								   </li>
								   <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/snjy07" title="Facebook"><i class="fab fa-facebook"></i><span class="menu-title sr-only">Facebook</span></a>
								   </li>
								   <li class="nav-item"><a class="nav-link" href="https://in.linkedin.com/in/sanjay-adhikari-451b6012b" title="linkedin"><i class="fab fa-linkedin"></i><span class="menu-title sr-only">Linkedin</span></a>
								   </li>
								   <li class="nav-item"><a class="nav-link" href="https://github.com/snjy07" title="Github"><i class="fab fa-github"></i><span class="menu-title sr-only">Github</span></a>
								   </li>
								</ul>
							 </nav>
						  </div>
						  <div class="d-print-none">
							  <a class="btn btn-outline-light btn-lg shadow-sm mt-1 me-3" href="{{ asset('front/documents/Sanjay_Adhikari_Resume_webdeveloper.pdf')}}" data-aos="fade-right" data-aos-delay="700">Download CV</a>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
		<div class="shadow-1-strong bg-white my-5 p-5" id="about">
		<div class="about-section">
		<div class="row">
		   <div class="col-md-6">
			  <h2 class="h2 fw-light mb-4">About Me</h2>
			  <p>Hello! I’m Sanjay Adhikari. I am Web developer having 6+ years of website development, design and database experience. I have done projects for various clients under various domains like car dealers, real estate, job boards , eCommerce etc.

				<strong>I have hands on experience in PHP, Wordpress( Theme and plugins development ), Laravel, CI, Mysql, HTML, CSS, Photoshop.</strong></br>
				
				Experienced in Wordpress/ Laravel/ CodeIgniter Core php sites, development, configuration, optimization, migration, custom theme development. Working with various plugins and widgets, customization according to client requirements.</p>
		   </div>
		   <div class="col-md-5 offset-lg-1">
			  <div class="row mt-2">
				 <h2 class="h2 fw-light mb-4">Bio</h2>
				 <div class="col-sm-5">
					<div class="pb-2 fw-bolder"><i class="far fa-calendar-alt pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Age</div>
				 </div>
				 <div class="col-sm-7">
					<div class="pb-2">26</div>
				 </div>
				 <div class="col-sm-5">
					<div class="pb-2 fw-bolder"><i class="far fa-envelope pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Email</div>
				 </div>
				 <div class="col-sm-7">
					<div class="pb-2">snjyadhikari07@gmail.com</div>
				 </div>
				 <div class="col-sm-5">
					<div class="pb-2 fw-bolder"><i class="fab fa-skype pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Skype</div>
				 </div>
				 <div class="col-sm-7">
					<div class="pb-2">snjyadhikari07@gmail.com</div>
				 </div>
				 <div class="col-sm-5">
					<div class="pb-2 fw-bolder"><i class="fas fa-phone pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Phone</div>
				 </div>
				 <div class="col-sm-7">
					<div class="pb-2">+91-8440044324</div>
				 </div>
				 <div class="col-sm-5">
					<div class="pb-2 fw-bolder"><i class="fas fa-map-marker-alt pe-2 text-muted" style="width:24px;opacity:0.85;"></i> Address</div>
				 </div>
				 <div class="col-sm-7">
					<div class="pb-2">Plot No. 2-C shashtri Nagar, Alwar, 301001 </div>
				 </div>
			  </div>
		   </div>
		</div>
	</div>
		
		
    <!-- mian banner section ends -->

@endsection