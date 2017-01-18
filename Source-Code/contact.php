<?php
$title="Contact us";
include 'include/header.php';
include 'include/utils.php';

$action=$_REQUEST['action'];
echo '
<h2 class="h2-title h2-line">Contact us</h2>';

if ($action=="")    /* display the contact form */
{
	?>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.8887274469716!2d26.099484415496594!3d44.43544467910235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff473869f53f%3A0xee62eda4d786c152!2sUniversitatea+din+Bucure%C8%99ti!5e0!3m2!1sro!2sro!4v1477696059173" style="width: 100%;
padding: 20px;" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	<div class="keep-in-touch">
		<span class="span-title"><i style="color: #dd3333;margin-right: 6px;" class="fa fa-pencil-square" aria-hidden="true"></i>Get in Touch</span>
		<form style="margin-top:20px;" class="form-horizontal" role="form" method="post" action="">
			<input type="hidden" name="action" value="submit">
			<div class="form-group" style="display: inline-block;">
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
				</div>
			</div>
			<div class="form-group" style="display: inline-block;">
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" placeholder="Email" data-error="Bruh, that email address is invalid" required>
				</div>
			</div>
			<div style="display: block;" class="form-group">
				<div class="col-sm-10">
					<input style="width: 520px;" type="subject" class="form-control" id="subject" name="subject" placeholder="Subject" value="">
				</div>
			</div>
			<div style="display: block;" class="form-group">
				<div class="col-sm-10">
					<textarea style="width: 520px; max-width: 520px; height: 120px; max-height: 200px;" class="form-control" rows="4" name="message" placeholder="Message"></textarea>
				</div>
			</div>
			<div class="form-group" style="float: right;">
				<div class="col-sm-10 col-sm-offset-2">
					<input style="background-color: #f26522; border:0;" id="submit" name="submit" type="submit" value="Send Email" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
	<div class="office-address">
		<span class="span-title"><i style="color: #dd3333;margin-right: 6px;" class="fa fa-address-card" aria-hidden="true"></i>Office Address</span>
		<p class="p-text">
			FMI Flights Inc.<br />
			935 W. Webster Ave New Streets Chicago,<br/> IL 60614, NY Newyork USA<br />
			Mobile: +2346 17 38 93<br />
			Fax: 1-714-252-0026<br />
		</p>
	</div>

	<?php
} else {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$message = $_REQUEST['message'];

	if (($name == "") || ($email == "") || ($message == "") || ($subject == "")) {
		echo "<h3 class=\"h3-text\">Validation errors occurred. Please confirm the fields and submit it again.</h3>";
	} else {
		if (isValidEmail($email) == false) {
			echo "<h3 class=\"h3-text\">Your email address is invalid. Please try again.</h3>";
		} else {
			// Send email
			send_mail_contact("fmiflights@gmail.com", "FMI Flights", $email, $name, $subject, $message, "<h3 class=\"h3-text\">Your message has been sent successfully.</h3>");
		}
	}
}

include 'include/footer.php';
?>
