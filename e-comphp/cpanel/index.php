<?php
    require '../controllerUserData.php';

	function get_users ($con) {
		$mysql = mysqli_query($con, "SELECT `uid` FROM `users`");
		$nums = mysqli_num_rows($mysql);
		return $nums;
	}
	function get_products ($con){
		$mysql = mysqli_query($con, "SELECT `id` FROM `products`");
		$nums = mysqli_num_rows($mysql);
		return $nums;
	}
    function get_admins ($con) {
        $mysql = mysqli_query($con, "SELECT `uid`,`priority` FROM `users` WHERE `priority` = '0'");
		$nums = mysqli_num_rows($mysql);
		return $nums;
    }
    function constumers_interest($con) {
        $mysql = mysqli_query($con, "SELECT `product_id`
        FROM     `cart_table`
        GROUP BY `product_id`
        ORDER BY COUNT(*) DESC
        LIMIT    1;
        ");
        if(mysqli_num_rows($mysql) > 0){
            $assoc = mysqli_fetch_assoc($mysql);

            $first = $assoc['product_id'];
            // $sec = $assoc['product_id'][1];
            return $first;
        }else{
            return 'null';
        }
		
    }
    if(isset($_SESSION['pri'])){
        if($_SESSION['pri'] != 0){
            header('Location: ../index.php');
            $_SESSION['message_reg'] = "Sorry you dont have permision to get there";
            $_SESSION['icon']        = "error";
        }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap cdn -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
    <title>Admin Panel</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="../">Go Back</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Admin Actions
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="./admin_promote_area.php">Promote to Admin</a>
				<a class="dropdown-item" href="./add_product.php">New Product</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="./manage_products.php">Manage Products</a>
				</div>
			</li>
		
			</ul>
		
		</div>
	</nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="alert alert-success w-100">
            
            <h3>Welcome Back, <?php echo $_SESSION['name'];?></h3>
            </div>
        </div>
    </div>
	
    <div class="container">
    <!-- FIRST SECTION -->
            <div class="col-md-12 ">
                <div class="row ">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users-cog"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Admins</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <a href="admin_promote_area.php"><?php echo get_admins($con);?></a>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span><i class="fa fa-arrow-up"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Users</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <a href="control_users.php"><?php echo get_users($con);?></a>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span><i class="fa fa-arrow-up"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa fa-shopping-cart"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Products</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <a href="./add_product.php"><?php echo get_products($con); ?></a>
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span><i class="fa fa-arrow-up"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-medium"><i class="fa fa-magnet"></i></div>
                                <div class="mb-2">
                                    <h5 class="card-title mb-0">Most Common Product</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                             <a href="../product.php?p=<?php echo constumers_interest($con);?>"><?php echo constumers_interest($con);?></a> 
                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span><i class="fa fa-arrow-up"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- END FIRST SECTION -->
    </div>
    



    <?php include './inc/scripts.php';?>
</body>
</html>

<?php

}
}else{
    header('Location: ../index.php');
            $_SESSION['message_reg'] = "Sorry you dont have permision to get there";
            $_SESSION['icon']        = "error";
}


?>