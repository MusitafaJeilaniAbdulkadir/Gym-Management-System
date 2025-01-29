<?php 
session_start();



error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	
	<?php include 'include/header.php';?>
	

	<!-- Header Section end -->

	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/pge-header.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Home</h2>
					<p>Physical Activity Or Can Improve Your Health</p>
				</div>
			</div>
		</div>
	</section>


	


	<section class="pricing-section ">
		<div class="container">
			<div class="section-title text-center">
				<h2>Our Services</h2>
				<p>We offer all gym services</p>
			</div>
			<div class="section-title text-center set-bg">
				<img src="https://www.dmoose.com/cdn/shop/articles/feature-image_53bc68fc-efa4-40ef-8f00-c0a54896868d.jpg?v=1677597466" alt="">
				<h2>Arm Excercises</h2>
			</div>
			<div class="section-title text-center">
				<img src="https://cdn.centr.com/content/28000/27279/images/landscapewidedesktop1x-4601970b35e1f871f46a83d782b103fc-model-dumbbell-leg-inline-1-169-3294.jpg" alt="">
				<h2>Leg Excercises</h2>
			</div>
			<div class="section-title text-center">
				<img src="https://i0.wp.com/www.muscleandfitness.com/wp-content/uploads/2020/01/Beginner-Weightlifter-Barbell-Benchpress-Tech-Analytics.jpg?quality=86&strip=all" alt="">
				<h2>Chest Excercises</h2>
			</div>
			<div class="section-title text-center">
				<img src="https://i0.wp.com/www.muscleandfitness.com/wp-content/uploads/2018/04/1109-space-savers-main.jpg?quality=86&strip=all" alt="">
				<h2>Full body Excercises</h2>
			</div>
			<div class="section-title text-center">
				<img src="https://i0.wp.com/www.strengthlog.com/wp-content/uploads/2024/02/strength-training-exercises-for-beginners-scaled.jpg?fit=2560%2C1707&ssl=1" alt="">
				<h2>Strength Excercises</h2>
			</div>
			<div class="section-title text-center">
				<img src="img//event/1.jpg" alt="">
				<h2>Weight Excercises</h2>
			</div>
		</div>

	</section>



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Pricing plans</h2>
				<p>Practice Yoga to perfect physical beauty, take care of your soul and enjoy life more fully!</p>
			</div>
			<div class="row">
				        <?php 

$sql ="SELECT id, category, titlename, PackageType, PackageDuratiobn, Price, uploadphoto, Description, create_date from tbladdpackage";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
				<div class="col-lg-3 col-sm-6">
					<div class="pricing-item begginer">
						<div class="pi-top">
							<h4><?php echo $result->titlename;?></h4>
						</div>
						<div class="pi-price">
							<h3><?php echo htmlentities($result->Price);?></h3>
							<p>	<?php echo $result->PackageDuratiobn;?></p>
						</div>
						<ul>
							<?php echo $result->Description;?>
							
						</ul>
						<?php if(strlen($_SESSION['uid'])==0): ?>
						<a href="login.php" class="site-btn sb-line-gradient">Booking Now</a>
						<?php else :?>
							<!-- <a href="#" class="site-btn sb-line-gradient">Booking Now</a> -->
							 <form method='post'>
                            <input type='hidden' name='pid' value='<?php echo htmlentities($result->id);?>'>
                          

                        <input class='site-btn sb-line-gradient' type='submit' name='submit' value='Booking Now' onclick="return confirm('Do you really want to book this package.');"> 
                        </form> 
							 <?php endif;?>
					</div>
				</div>
				<?php  $cnt=$cnt+1; } } ?>
			</div>
		</div>
	</section>
	

	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
