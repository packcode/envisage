<?php
mysql_connect("localhost","db_name","db_password");

if($_POST){
@mysql_select_db("envisage") or die("unable to select database");
$update="";
$team_name=$_POST["team_name"];
$team_size=$_POST["team_size"];
$email=$_POST["email"];
$person_name=$_POST["person_name"];
$mobile=$_POST["mobile"];
$university=$_POST["university"];
$state=$_POST["state"];
//echo $team_name;
//echo $team_size;
//echo $email;
//echo $person_name;
//echo $mobile;
//echo $university;
//echo $state;

$query=mysql_query("select mobile from telephone");
while($row=mysql_fetch_array($query))
{
	if($mobile==$row['mobile'])
	{
		$update="User already registered with same mobile number.";
		goto last;
		//echo"<a href='event.html' style='background:#000000; text-align:center;background-size:30px 60px;'>Go Back</a>";
		//exit(1);
	}
}

if($team_name==""||$team_size==""||$email==""||$person_name==""||$mobile==""||$university==""||$state=="")
{
	$update="Pls fill all the fields.All fields are mandatory";
}
elseif($team_size<=0||$team_size>4)
{
	$update="Team size should be between 1 and 4.";
}
else
{
$subject="Successfully Registered for Envisage.";
$message="Hello Team $team_name,
Thank you for your registration for ENVISAGE'14, the National Annual Technical Fest.
Your details have been saved.";
$from="envisage@iic.ac.in";
mysql_query("Insert into register (team_name,team_size,email,person_name,mobile,university,state) values('$team_name','$team_size','$email','$person_name','$mobile','$university','$state')");
mysql_query("insert into telephone values($mobile)");
$update="Thanks for registration";


mail($email,$subject,$message,"From: $from\n");
mail("informatica@iic.ac.in","registration","$team_name","From: $from\n");
}

//echo"<a href='event.html' style='background:#47639e; text-align:center;background-size:30px 1000px;'>Go Back</a>";
}
last:
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Envisage'14</title>
<meta name="keywords" content="Envisage'14, Envisage, Envisage 2014, Envisage iic" />
<meta name="robots" content="all" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" media="all" type="text/css" href="css/main.css" />
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="http://webey.eu/css/ie7.css"><![endif]-->

<script type="text/javascript" src="js/raphael.js" ></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="js/jquery.mousewheel.min.js" ></script>
<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js" ></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js" ></script>
<script type="text/javascript" src="js/main.js" ></script>

<link rel="SHORTCUT ICON" href="favicon.gif" />

<script type="text/javascript">
	$(document).ready(function(){
						var page_block = 'block_3';				block_nr_position = $('#container2 .'+page_block).position();
		block_nr_left = block_nr_position.left;
		block_nr_top = block_nr_position.top;
		$('body,html').scrollLeft(block_nr_left);
		$('body,html').scrollTop(block_nr_top);
	});
</script>


 <script type="text/javascript">
function validateForm(){
var numericExpression = /^[0-9]+$/;
var test = /^[1-4]+$/;
var team_name= document.getElementById('team_name');
var size = document.getElementById('size');
var mobile = document.getElementById('mobile');
var email = document.getElementById('email');
var person_name=document.getElementById('person_name');
var university=document.getElementById('university');
var state=document.getElementById('state');

/*var sTest = "g66ghy7";

var iCount = 0;
for (iIndex in sTest) {
    if (!isNaN(parseInt(sTest[iIndex]))) {
        iCount++;
    }
}*/
//var x=document.forms["contact-form"]["bg"].value;
//function isAlphabet(elem, helperMsg){
var alphaExp = /^[a-zA-Z][a-zA-Z ]+$/;
if(!team_name.value.match(alphaExp)){
// return true;
// }
//else{
alert("Please enter only letters for Name");
team_name.focus();
return false;
}
//} 
//function lengthRestriction(elem, min, max, helperMsg){
uInput =parseInt(size.value,10);

if(!size.value.match(test)){
// return true;
// }else{
alert("Team size should be between 1-4.");
size.focus();
return false;
}
//}
//function isNumeric(elem, helperMsg){toString().length

if((!mobile.value.match(numericExpression))||mobile.value.length!=10){
// return true;
/// }else{
alert("Please enter a 10 digit Mobile Number");
mobile.focus();
return false;
}
//}

if(!person_name.value.match(alphaExp)){
// return true;
// }
//else{
alert("Please enter only letters for Name");
person_name.focus();
return false;
}


if(!university.value.match(alphaExp)){
// return true;
// }
//else{
alert("Please enter only letters for Name");
university.focus();
return false;
}

if(!state.value.match(alphaExp)){
// return true;
// }
//else{
alert("Please enter only letters for Name");
state.focus();
return false;
}

}

</script>
</head>

<body>
<div id="container">
	<div id="fixed_background"></div>
	<div id="quadra"></div>
	
<div class="middle_head_bgr"></div>
	
	<div id="menu">
		<ul>
			<li class="block_2"><a href="details.php" title="details">Details</a></li>
			<li class="block_3"><a href="events.php" title="events">Events</a></li>
<li id="logo" class="block_1"><a id="home_url" href="index.php" title="Envisage">ENVISAGE<br/>'14</a></li>
			<li class="block_4"><a href="register.php" title="Register">Register</a></li>
			<li class="block_5 last_menu"><a href="contact_s.php" title="Contact us">Contact US</a></li>
		</ul>
	</div>
	
	<div id="container2"> 

	<div class="block block_1">
		<div class="block_ins">
			<div class="why_us">
				<div id="homepage"></div>
				<div class="why_content why_0"><div class="iic"></div></div>
				<div class="why_content why_1"><div class="quality"></div></div>
				<div class="why_content why_2"><div class="interactivity"></div></div>
				<div class="why_content why_3"><div class="marketing"></div></div>
				<div class="why_content why_4"><div class="cms"></div></div>
				<div class="why_content why_5"><div class="integrity"></div></div>
				
				<div class="why_hover why_hover_0"><div class="left_side"><img src="css/inno/da_vinci_la.png" alt="iic" /></div><div class="right_side"><img src="css/inno/da_vinci_ra.png" alt="iic" /></div><div class="text"></div><div class="home_title"><span class="color">IIC</div></div>				
				<div class="why_hover why_hover_1"><div class="left_side"><img src="css/inno/da_vinci_la.png" alt="Quality" /></div><div class="right_side"><img src="css/inno/da_vinci_ra.png" alt="Quality" /></div><div class="text"></div><div class="home_title"><span class="color">Leonardo</span><br/>da Vinci</div></div>
				<div class="why_hover why_hover_2"><div class="left_side"><img src="css/inno/braille_l.png" alt="Interactivity" /></div><div class="right_side"><img src="css/inno/braille_r.png" alt="Interactivity" /></div><div class="text"></div><div class="home_title"><span class="color">Louis</span><br/>Braille</div></div>
				<div class="why_hover why_hover_3"><div class="left_side"><img src="css/inno/babbage_l.png" alt="Marketing" /></div><div class="right_side"><img src="css/inno/babbage_r.png" alt="Marketing" /></div><div class="text"></div><div class="home_title"><span class="color">Charles</span><br/>Babbage</div></div>
				<div class="why_hover why_hover_4"><div class="left_side"><img src="css/inno/edison_l.png" alt="Content Management System" /></div><div class="right_side"><img src="css/inno/edison_r.png" alt="Content Management System" /></div><div class="text"></div><div class="home_title"><span class="color">Thomas A.</span><br/>Edison</div></div>
				<div class="why_hover why_hover_5"><div class="left_side"><img src="css/inno/marconi_l.png" alt="Integrity" /></div><div class="right_side"><img src="css/inno/marconi_r.png" alt="Integrity" /></div><div class="text"></div><div class="home_title"><span class="color">Guglielmo</span><br/>Marconi</div></div>
			</div>
		</div>
	</div>
	<div class="block block_2">
		<div class="block_ins">
			<div class="title"><div class="title_ins">DETAILS</div></div>
			<div class="title_link">http://iic.ac.in</div>
			<div class="wrap">
								<div class="services_list">
											<div class="single single_active">
						<div class="arrow arrow_active"></div>
						<div class="single_ins">
							<div class="image" style="background:url(uploads/services/da_vinci.png) no-repeat 50% 0;height:39px;margin-top:5px;"></div>
							<div class="separation"></div>
							<div class="name">Leonardo da<br/>Vinci</div>
							<div class="clear"></div>
						</div>
						</div>
											<div class="single">
						<div class="arrow"></div>
						<div class="single_ins">
							<div class="image" style="background:url(uploads/services/braille.png) no-repeat 50% 0;height:29px;margin-top:10px;"></div>
							<div class="separation"></div>
							<div class="name">Louis<br/>Braille</div>
							<div class="clear"></div>
						</div>
						</div>
											<div class="single">
						<div class="arrow"></div>
						<div class="single_ins">
							<div class="image" style="background:url(uploads/services/babbage.png) no-repeat 50% 0;height:38px;margin-top:5.5px;"></div>
							<div class="separation"></div>
							<div class="name">Charles<br/>Babbage</div>
							<div class="clear"></div>
						</div>
						</div>
											<div class="single">
						<div class="arrow"></div>
						<div class="single_ins">
							<div class="image" style="background:url(uploads/services/edison.png) no-repeat 50% 0;height:40px;margin-top:4.5px;"></div>
							<div class="separation"></div>
							<div class="name">Thomas A.<br/>Edison</div>
							<div class="clear"></div>
						</div>
						</div>
											<div class="single single_last">
						<div class="arrow"></div>
						<div class="single_ins">
							<div class="image" style="background:url(uploads/services/marconi.png) no-repeat 50% 0;height:42px;margin-top:3.5px;"></div>
							<div class="separation"></div>
							<div class="name">Guglielmo<br/>Marconi</div>
							<div class="clear"></div>
						</div>
						</div>
									</div>
				<div class="services_description">
<!--IIC about Leonardo da vinci-->
										<div class="single_desc single_desc_active">


					<div class="question">Register</div>
					<div class="content ins">
						<h2>Da Vinci</h2>
						<hr />
						<ul>
<p>about Leonardo da vinci</p>
<div class="clear"></div>					</div>
					<div class="big_image" style="background:url(uploads/services/vinci_inno.png) no-repeat 90% 90%;"></div>					</div>
										
<!--IIC about Louis Braille-->
<div class="single_desc">
					<div class="question">Register</div>
					<div class="content ins">
						<h2>Braille</h2>
						<hr />
						<p>ABout Louis Braille</p>
<div class="clear"></div>					</div>
					<div class="big_image" style="background:url(uploads/services/braille_inno.png) no-repeat 90% 90%;"></div>					</div>
										
<!--IIC about Charles Babbage-->
<div class="single_desc">
					<div class="question">Register</div>
					<div class="content ins">
						<h2>Babbage</h2>
						<hr />
						<p>about charles babbage</p>
<div class="clear"></div>					</div>
					<div class="big_image" style="background:url(uploads/services/babbage_inno.png) no-repeat 90% 90%;"></div>					</div>
										
<!--IIC about Edison-->
<div class="single_desc">
					<div class="question">Register</div>
					<div class="content ins">
						<h2>Edison</h2>
						<hr />
						<p>About Edison</p>
<div class="clear"></div>					</div>
					<div class="big_image" style="background:url(uploads/services/edison_inno.png) no-repeat 90% 90%;"></div>					</div>

<!--IIC about Marconi-->										
<div class="single_desc">
					<div class="question">Register</div>
					<div class="content ins">
						<h2>Marconi</h2>
						<hr />
						<p>About Marconi</p>
<div class="clear"></div>					</div>
					<div class="big_image" style="background:url(uploads/services/marconi_inno.png) no-repeat 90% 90%;"></div>					</div>
									</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<div class="block block_3">
		<div class="block_ins">
			<div class="title"><div class="title_ins">EVENTS</div></div>
			<div class="title_link">http://envisage.iic.ac.in</div>
			<div class="wrap">
								<div class="project_list">
					<div id="scroll_bg"><div id="scroll"><div class="bottom"><div id="scroll_middle"></div></div></div></div>
					<div id="all_projects">
											<div class="project project_active">
							<div class="pr_arrow pr_arrow_active"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Ostentatio</li>
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Lanstorm</li>
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Make[Break]</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">xquizIT</li>
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Co-Dennis</li>
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">ArteFAct</li>
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Script-Maestro</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">The White Collars</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Sets n Steps</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Osiris</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Hazy Maze</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Weave-n-app</li>
									
								</ul>
							</div>
						</div>
											<div class="project">
							<div class="pr_arrow"></div>
							<div class="project_ins">
								<ul>
									<li class="name">Turn Coat</li>
									
								</ul>
							</div>
						</div>

										</div>
				</div>
<!--IIC Rules/Description of Events-->

				<div class="project_description">
<!-- IIC ostentatio Description-->
										<div class="single_project single_project_active">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>ostentatio</li>
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
<!-- IIC ostentatio Images-->
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/ostentatio/1.png" alt="ostentatio" /></div>
																					<div class="screen"><img src="uploads/ostentatio/1.png" alt="ostentatio" /></div>
																					<div class="screen"><img src="uploads/ostentatio/1.png" alt="ostentatio" /></div>
																					<div class="screen"><img src="uploads/ostentatio/1.png" alt="ostentatio" /></div>
																					<div class="screen"><img src="uploads/ostentatio/1.png" alt="ostentatio" /></div>
																			</div>
<!-- IIC ostentatio Images-->
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>Participant have to bring their own cameras and the required softwares, computers may be allotted on request.</li>
<li>Participant can cover all the events, opening ceremony and pre-event activities as well going in the Institute.</li>
<li>Further rules shall be disclosed before the event.</li>
<li>Team Size:1-2.</li>
<li>Platform:Linux/Windows</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
														<div class="nav next">Next<br/>work</div>						</div>
					</div>

<!-- IIC ostentatio Description ends-->
<!-- IIC lanstorm Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Lanstorm</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/lanstorm/1.png" alt="Lanstorm" /></div>
																					<div class="screen"><img src="uploads/lanstorm/1.png" alt="LanStorm" /></div>
																					<div class="screen"><img src="uploads/lanstorm/1.png" alt="LanStorm" /></div>
																					<div class="screen"><img src="uploads/lanstorm/1.png" alt="LanStorm" /></div>
																					<div class="screen"><img src="uploads/lanstorm/1.png" alt="LanStorm" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>

<h3>COUNTER STRIKE</h3>
<li>TEAM SIZE - 3</li>
<h3>NFS-MOST WANTED</h3>
<li>TEAM SIZE - 1</li>
<li>Further details shall be disclosed before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC lanstorm Description ends-->

<!-- IIC make break Description-->

										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Make[Break]</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/makebreak/1.png" alt="Make[Break]" /></div>
																					<div class="screen"><img src="uploads/makebreak/1.png" alt="Make[Break]" /></div>
																					<div class="screen"><img src="uploads/makebreak/1.png" alt="Make[Break]" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>Preliminary round will be a MCQ based on C, C++ and JAVA.</li>
<li>Four team will qualify for final round.</li>
<li>Final round will be based on Debugging and finding out errors.</li>
<li>Further details shall be disclosed before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC make break Description ends-->
<!-- IIC xquizit Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Xquizit</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/xquizit/1.png" alt="xquizit" /></div>
																					<div class="screen"><img src="uploads/xquizit/1.png" alt="xquizit" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>The event has a preliminary round of MCQs.</li>
<li>Qualifying teams would compete with each other in Mains round.</li>
<li>No. of participants per team: 2.Further rules shall be disclosed by the coordinators before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC xquizit Description ends-->
<!-- IIC codennis Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Codennis</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/codennis/1.png" alt="Codennis" /></div>
																					<div class="screen"><img src="uploads/codennis/1.png" alt="Codennis" /></div>
																					<div class="screen"><img src="uploads/codennis/1.png" alt="Codennis" /></div>
																					<div class="screen"><img src="uploads/codennis/1.png" alt="Codennis" /></div>
																					<div class="screen"><img src="uploads/codennis/1.png" alt="Codennis" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>Co-Dennis will be based on Technical Knowledge of programming in C & C++.</li>
    <li>There will be Two Rounds- Prelims & Mains.</li>
    <li>Team clearing the prelims will proceed towards the mains.</li>
    <li>Team Size: 2</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC codennis Description ends-->
<!-- IIC artefact Description -->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>artefact</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/artefact/1.png" alt="artEfact"  /></div>
																					<div class="screen"><img src="uploads/artefact/1.png" alt="artEfact"  /></div>
																					<div class="screen"><img src="uploads/artefact/1.png" alt="artEfact"  /></div>
																					<div class="screen"><img src="uploads/artefact/1.png" alt="artEfact"  /></div>
																					<div class="screen"><img src="uploads/artefact/1.png" alt="artEfact" /></div>
																					<div class="screen"><img src="uploads/artefact/1.png" alt="artEfact" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>Bring nothing but your creative mind.</li>
    <li>Duration:75 minutes.</li>
    <li>Editor to be used : Coreldraw, Photoshop.</li>
    <li>Theme would be given at the start of the event.</li>
    <li>Further rules shall be disclosed before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC artefact Description ends-->
<!-- IIC script maestro Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Script Maestro</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/sm/1.png" alt="Script Maestro" /></div>
																					<div class="screen"><img src="uploads/sm/1.png" alt="Script Maestro" /></div>
																					<div class="screen"><img src="uploads/sm/1.png" alt="Script Maestro" /></div>
																					<div class="screen"><img src="uploads/sm/1.png" alt="Script Maestro" /></div>
																					<div class="screen"><img src="uploads/sm/1.png" alt="Script Maestro" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>This event will have one round.</li>
    <li>Platform: Windows/Mac OS X/Ubuntu.</li>
    <li>No. of participants per team : 2.</li>
    <li>Further rules shall be disclosed at the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC script maestro Description ends-->
<!-- IIC the white collars Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>The White Collars</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/wc/1.png" alt="The White Collars" /></div>
																					<div class="screen"><img src="uploads/wc/1.png" alt="The White Collars" /></div>
																					<div class="screen"><img src="uploads/wc/1.png" alt="The White Collars" /></div>
																					<div class="screen"><img src="uploads/wc/1.png" alt="The White Collars" /></div>
																					<div class="screen"><img src="uploads/wc/1.png" alt="The White Collars" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
    <h3>Papers are invited for research done under these topics.</h3>
        <li>Network Security Model</li>
        <li>Future Web Technology</li>
    <h3>Both Undergraduate and Postgraduate students can participate.</h3>
    <h3>Only single registration is allowed.</h3>
    <h3>Date of Submission(Soft Copy via email) - 26 February, 2014.</h3>
    <h3>Date of Presentation - 2 March,2014</h3>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC the white collars Description ends-->
<!-- IIC sets and steps Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>SEts N Steps</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/sets/1.png" alt="sets N steps" /></div>
																					<div class="screen"><img src="uploads/sets/1.png" alt="sets N steps" /></div>
																					<div class="screen"><img src="uploads/sets/1.png" alt="sets N steps" /></div>
																					<div class="screen"><img src="uploads/sets/1.png" alt="sets N steps" /></div>
																					<div class="screen"><img src="uploads/sets/1.png" alt="sets N steps" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>The event has a preliminary round of MCQs based on Data Sructure & Algorithms.</li>
    <li>Qualifying teams would compete with each other in Mains round.</li>
    <li>No. of participants per team: 2.Further rules shall be disclosed by the coordinators before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC sets and steps Description ends-->
<!-- IIC osiris Description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Osiris</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/osiris/1.png" alt="osiris" /></div>
																					<div class="screen"><img src="uploads/osiris/1.png" alt="osiris" /></div>
																					<div class="screen"><img src="uploads/osiris/1.png" alt="osiris" /></div>
																					<div class="screen"><img src="uploads/osiris/1.png" alt="osiris" /></div>
																					<div class="screen"><img src="uploads/osiris/1.png" alt="osiris" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
<li>This event has a Preliminary round of MCQ based on Operating System.</li>
    <li>Four Teams will qualify for the final round.</li>
    <li>Final round will be based on Shell Scripting.</li>
    <li>Further rules shall be disclosed before the event.</li>
    <li>Team Size: 2</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC osiris Description ends-->
<!-- IIC osiris hazy maze description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Hazy Maze</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/hazy/1.png" alt="Hazy Maze" /></div>
																					<div class="screen"><img src="uploads/hazy/1.png" alt="Hazy Maze" /></div>
																					<div class="screen"><img src="uploads/hazy/1.png" alt="Hazy Maze" /></div>
																					<div class="screen"><img src="uploads/hazy/1.png" alt="Hazy Maze" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
    <li>Treasure hunt will be based on Technical Knowledge of network programming, brainstorming power and physical activities.</li>
    <li>There will be certain number of stages.</li>
    <li>Team Size:2</li>
    <li>Platform:Linux.</li>
    <li>Further rules shall be disclosed by the judges before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC osiris hazy maze description ends-->
<!-- IIC osiris weave an app description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Weave-N-App</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/weave/1.png" alt="Weave an App" /></div>
																					<div class="screen"><img src="uploads/weave/1.png" alt="Weave an App" /></div>
																					<div class="screen"><img src="uploads/weave/1.png" alt="Weave an App" /></div>
																					<div class="screen"><img src="uploads/weave/1.png" alt="Weave an App" /></div>
																					<div class="screen"><img src="uploads/weave/1.png" alt="Weave an App" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
    <li>Bring nothing but your mind.</li>
    <li>Note:Dont worry we will be providing you the Internet facility and all the stuff required to develop the app.</li>
    <li>Problem statement and platform will be given at the event kick start.</li>
    <li>Further rules shall be disclosed before the event.</li>
    <li>Max Team Size:2.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
					</div>
<!-- IIC osiris weave an app description ends-->
<!-- IIC osiris turn coat description-->
										<div class="single_project">
						<div class="head">
							<div class="head_ins">
								<div class="name">
									<ul>
										<li>Turn Coat</li>
										
									</ul>
								</div>
								<div class="link" onclick="window.open('http://iic.ac.in','_blank');">
									<div class="back"></div>
									<ul>
										<li><span>WEBSITE</span></li>
										<li><a href="http://iic.ac.in" title="IIC" target="_blank" onclick="return false;">http://iic.ac.in</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="middle">
							<div class="middle_sh">
								<div class="preview_bg">
																		<div class="preview">
																					<div class="screen screen_image"><img src="uploads/turncoat/1.png" alt="turncoat" /></div>
																					<div class="screen"><img src="uploads/turncoat/1.png" alt="turncoat" /></div>
																					<div class="screen"><img src="uploads/turncoat/1.png" alt="turncoat" /></div>
																			</div>
									<div class="selects">
																					<div class="screen_select screen_select_active"></div>
																					<div class="screen_select"></div>
																					<div class="screen_select"></div>
																			</div>
								</div>
								<div class="description">
									<h3>Rules</h3>
									<div class="content">
										<ul>
    <li>Time duration of debate: 4 minutes.</li>
    <li>Participants have to switch over for/against the argument instantaneously according to the judges.</li>
    <li>Further rules shall be disclosed by the judges before the event.</li>
</ul>
<div class="clear"></div>									</div>
								</div>
							</div>
						</div>
						<div class="foot">
							<div class="nav prev">Previous<br/>work</div>							<div class="nav next">Next<br/>work</div>						</div>
<!-- IIC osiris turn coat description ends-->
				</div>
<!--IIC end events-->
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<div class="block block_4">
		<div class="block_ins">
			<div class="title"><div class="title_ins">Register</div></div>
			<div class="title_link">http://iic.ac.in/</div>
			<div class="wrap">
			
				<div class="about"><div class="content ins">
				<div class="form">
					
						<?php
                if($_POST)
                {
                echo"<h1 style='color:#8248ea;'>$update</h1>";
                }
                ?>
						<!--<form id="contact-form" action="" onsubmit="return validateForm()"  method="post">
							
							<br><div  class="div_input"><input id="team_name" type="text" name="team_name" value="Team Name" onfocus="if(this.value=='Team Name')this.value=''" onblur="if(this.value=='')this.value='Team Name';" /></div>
							<br><div class="div_input"><input id="size"  type="number" name="team_size" value="Team Size" onfocus="if(this.value=='Team Size')this.value=''" onblur="if(this.value=='')this.value='Team Size';" /></div>
							<br><div  class="div_input"><input id="email" type="email" name="email" value="E-mail" onfocus="if(this.value=='E-mail')this.value=''" onblur="if(this.value=='')this.value='E-mail';" /></div>
							<br><div  class="div_input"><input id="person_name" type="text" name="person_name" value="Contact Person Name" onfocus="if(this.value=='Contact Person Name')this.value=''" onblur="if(this.value=='')this.value='Contact Person Name';" /></div>							
							<br><div  class="div_input"><input id="mobile" type="number" name="mobile" value="Mobile" onfocus="if(this.value=='Mobile')this.value=''" onblur="if(this.value=='')this.value='Mobile';" /></div>
							<br><div  class="div_input"><input id="university" type="text" name="university" value="Institute/University" onfocus="if(this.value=='Institute/University')this.value=''" onblur="if(this.value=='')this.value='Institute/University';" /></div>
							<br><div  class="div_input"><input id="state" type="text" name="state" value="State" onfocus="if(this.value=='State')this.value=''" onblur="if(this.value=='')this.value='State';" /></div>							
							<br><div class="div_btn"><input id="form_send" type="submit" name="c_send" value="Register" /></div>
							
							
							<div class="clear"></div>
						</form>-->
							<form id="contact-form" class="contact-form" onsubmit="return validateForm()" method="post" action="">
            	
            	<p class="contact-name">
            	
            		<input id="team_name" type="text" placeholder="Team Name" value="" name="team_name" required="true" /> Team Name
            	
            	</dd>
                </p>
                	<p class="contact-name">
            		<input id="size" type="number" placeholder="Team Size (1-4)" value="" name="team_size" required="true" /> Team Size
                </p>
                <p class="contact-email">
                	<input  type="email" placeholder="Email Address" value="" name="email" required="true"/> Email
                </p>
               <!-- <p class="contact-message">
                	<textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
                </p>-->
                </p>
                	<p class="contact-name">
            		<input id="person_name" type="Text" placeholder="Contact Person Name" value="" name="person_name" required="true"/> Contact Person Name
                </p>
                	<p class="contact-name">
            		<input id="mobile" type="number" placeholder="Mobile Number" value="" name="mobile" required="true"/> Mobile Number
                </p>
                <p class="contact-name">
            		<input id="university" type="Text" placeholder="Institute/University" value="" name="university" required="true"/> Institute/University
                </p>
                <p class="contact-name">
            		<input id="state" type="Text" placeholder="State" value="" name="state" required="true"/> State
                </p>
                <p class="contact-submit">
                
                	<input class=submit style="margin-bottom:30px;color:#8248ea;" type="submit" value="Submit" required="true"/>
                </p>
                
            </form>

					
					</div>
<div class="clear"></div></div></div>
				<div class="career"><div class="towers"></div><div class="corner"></div><div class="content ins"><h1>Special Offer</h1><h2><p>First 15 registrations get a special discount of 50%.</p></h2>
<br>
<br>
<h3><a href="generalrules.pdf">General Rules</a></h3><div class="clear"></div></div></div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="block block_5">
		<div class="block_ins">
			<div class="title"><div class="title_ins">CONTACT US</div></div>
			<div class="title_link">http://envisage.iic.ac.in/contact_us</div>
			<div class="wrap">
				<div class="contacts">
					<div class="left_side">
					<div class="ins">
						<div class="details">
																					<ul><li>E-mail: <a href="mailto:envisage@iic.ac.in" title="info@envisage.iic.ac.in">envisage@iic.ac.in</a></li></ul>
							<div class="contacts_sep"></div>
							<ul><li>Institute of Informatics & Communication</li><li>University of Delhi South Campus</li></ul>
							<div class="clear"></div>
						</div>
						<div class="map">
							<iframe width=80% height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps/ms?ie=UTF8&amp;hl=en&amp;oe=UTF8&amp;msa=0&amp;msid=215083984525498784311.0004daa5dc0a9270ced71&amp;t=m&amp;source=embed&amp;ll=28.584748,77.165136&amp;spn=0.015074,0.034246&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.co.in/maps/ms?ie=UTF8&amp;hl=en&amp;oe=UTF8&amp;msa=0&amp;msid=215083984525498784311.0004daa5dc0a9270ced71&amp;t=m&amp;source=embed&amp;ll=28.584748,77.165136&amp;spn=0.015074,0.034246" style="color:#0000FF;text-align:left">IIC</a> in a larger map</small>
<br />
Designed and implemented by - <a href="http://www.south.du.ac.in/uims">IIC-UDSC</a>
						</div>
					</div>
					</div>
					<div class="form">
					<div class="ins">
						<!--<h2>Query</h2>
						<form id="request_form" action="index.html" method="post">
							<div class="div_input"><input type="text" name="c_name" value="Name" onfocus="if(this.value=='Name')this.value=''" onblur="if(this.value=='')this.value='Name';" /></div>
							<div class="div_input"><input type="text" name="c_email" value="E-mail" onfocus="if(this.value=='E-mail')this.value=''" onblur="if(this.value=='')this.value='E-mail';" /></div>
							<div class="div_input"><input type="text" name="c_tel" value="Telephone" onfocus="if(this.value=='Telephone')this.value=''" onblur="if(this.value=='')this.value='Telephone';" /></div>
							<div class="div_textarea"><textarea name="c_text" rows="1" cols="1" onfocus="if(this.value=='Text')this.value=''" onblur="if(this.value=='')this.value='Text';">Text</textarea></div>
							<div class="div_btn"><input id="form_send" type="submit" name="c_send" value="Send" /></div>
							<div class="div_warnings"></div>
							<div class="loading"><img src="css/images/loading-en.gif" alt="Loading" /></div>
							<div class="clear"></div>
						</form>-->
						<ul>
                    <li><h2><a href="#">envisage@iic.ac.in</a></h2></li>
                    <li><h2>(011) 2411-0237</h2></li>
                    <li><h2>Institute of Informatics & Communication, UDSC<br>
                        Benito Jaurez Road,<br>
                        New Delhi-110021</h2><br>
                    </li>
                </ul>
					</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
</div>

<!--placeholder for every file js-->

</body>

</html>
