<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>Get in Touch</span>
			</div>
			<div class="col-lg-3">
				<div class="newsletter">
					<h4>Newsletter</h4>
					<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

					<div class="alert alert-success d-none" id="newsletterSuccess">
						<strong>Success!</strong> You've been added to our email list.
					</div>

					<div class="alert alert-danger d-none" id="newsletterError"></div>

					<form id="newsletterForm" action="#" method="POST">
						<div class="input-group">
							<input class="form-control form-control-sm" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-btn">
								<button class="btn btn-light" type="submit">Go!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3">
				<h4>Latest Tweets</h4>
				<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
					<p>Please wait...</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-details">
					<h4>About NAA</h4>
					<p>
						Established in 1988 in order to bring together auctioneers, valuers and insolvency professionals in both commercial and private practice. Founded on the principles of Expertise, Experience, Integrity and Honesty, the Association provides a focal point for the widespread membership throughout the Nigeria.
					</p>
				</div>
			</div>
			<div class="col-lg-2">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-1">
					<a href="index.html" class="logo">
						<img alt="Porto Website Template" class="img-fluid" src="{{asset('public/img/logo.png')}}">
					</a>
				</div>
				<div class="col-lg-7">
					<p>© Copyright 2017. All Rights Reserved.</p>
				</div>
				<div class="col-lg-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="{{url('user/terms-and-conditions')}}">Terms and Conditions</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>