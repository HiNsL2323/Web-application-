<?php

// Connect to database
include 'DBconn.php';

// Predefine filtering result in rooms.php
if (isset($_GET['roomGrade'])) {
    $roomGrade = mysqli_real_escape_string($conn, $_GET['roomGrade']);
    $sql = "SELECT * FROM room_details WHERE roomGrade = '$roomGrade'";
} else {
	$sql = "SELECT * FROM room_details WHERE roomGrade = '$roomGrade'";
}

// Filter available rooms
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">
	<link rel="stylesheet" href="css/roomDetail.css">
	<title>Rooms</title>
</head>

<body>
	<?php include "navbar.php"; ?>

    <!-- Rooms Details -->
	<section id="room-page">
		<div class="room-details">
			<!-- IMG -->
			<div class="room-img">

				<!-- Swiper Slider -->
				<div class="swiper mySwiper">
					<div class="swiper-slide">
						<?php
						    echo "<img src='img/rooms/{$row['roomIMG']}' />";
						?>
					</div>
				</div>

			</div>
			<!-- Text -->
			<div class="room-text">
				<!-- Room Grade-->
				<?php
				    echo "
			            <span class=\"room-category\">Grade</span>
			            <h3>{$row['roomGrade']}</h3>
                        <span class=\"room-price\">{$row['roomPrice']}</span>
                    ";
                    $spec = $row['roomSpec'];
                    echo "<p>".nl2br($spec)."</p>";
				?>

				<!--btn-->
				<div class="room-button">
                    <a href="reservation.php?roomGrade=<?php echo $row['roomGrade'] ?>" class="add-wishlist-btn">Check Available Room</a>
				</div>
				<!--help-btn-->
				<a href="#" class="help-btn">Need Any Help?</a>
			</div>
		</div>
	</section>

    <?php include "footer.php"; ?>
</body>
</html>