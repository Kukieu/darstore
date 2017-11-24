<?php

$upload_directory = "uploads";
//helper functions

function last_id(){
	global $connection;
	
	return mysqli_insert_id($connection);
	
}



function set_message($msg){
	if(!empty($msg)) {
		
		$_SESSION['message'] = $msg;
	}else{
		
		$msg = "";
	}
	
	
}

function display_message(){
	
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}
function redirect($location){
		
	return header("Location: $location");
}

function query($sql){
	
	global $connection;
	
	return mysqli_query($connection, $sql);
}

function confirm($result){
	
	global $connection;
	
	if(!$result){
					
					die("QUERY FAILED " . mysqli_error($connection));
				}
	
}


function escape_string($string){
	
		global $connection;

		return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
	
	
	return mysqli_fetch_array($result);
}
function display_image($picture){
	
	//global $upload_directory; //problem ze ścieżką przy dodaniu folderów w uploads
	
	//return $upload_directory . DS . $picture;
	
	return $picture;
	
}

/*--------------------------------------------------FRONT END FUNCTIONS*/

//get products

function get_products(){
	
	$query = query(" SELECT * FROM products WHERE product_category_id = 1");
	
	confirm($query);
	
	while($row = fetch_array($query)){
		
		$product_image = display_image($row['product_image']);
		
		$product = <<<DELIMETER
		
		 <div class="col-sm-4 col-lg-4 col-md-4 ">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"><img src="../resources/uploads/{$row['product_id']}/{$product_image}" alt="" style="width:260px;height:320px"></a>
                            <div class="caption">
                                <h4 class="pull-right">{$row['product_price']} zł</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
								
                                <p>{$row['short_desc']}</p>
								 <a class="btn btn-primary" target="_self" href="../resources/cart.php?add={$row['product_id']}">Dodaj do koszyka</a>
                            </div>
                            
                        </div>
                    </div>
		
DELIMETER;
		
		echo $product;
	}
}
function get_categories(){
	
$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)){
						
$categories_links = <<<DELIMETER
	
<a href='category.php?id={$row['cat_id']}' class='list-group-item cat_in_grey'>{$row['cat_title']}</a>

DELIMETER;

echo $categories_links;
					
				}
	
}

function get_products_in_cat_page(){
	
	$query = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " ");
	
	confirm($query);
	
	while($row = fetch_array($query)){
		
		$product_image = display_image($row['product_image']);
		
		$product = <<<DELIMETER
		
<div class="col-sm-4 col-lg-4 col-md-4 text-left">
<div class="thumbnail">
<a href="item.php?id={$row['product_id']}"><img src="../resources/uploads/{$row['product_id']}/{$product_image}" alt="" style="width:360px;height:400px"></a>
<div class="caption">
<h4 class="pull-right">{$row['product_price']} zł</h4>
<h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
</h4>

<p>{$row['short_desc']}</p>
 <a class="btn btn-primary" target="_self" href="../resources/cart.php?add={$row['product_id']}">Dodaj do koszyka</a>
</div>

</div>
</div>
		
DELIMETER;
		
		echo $product;
	}
}


function get_products_in_shop_page(){
	
	$query = query(" SELECT * FROM products");
	
	confirm($query);
	
	while($row = fetch_array($query)){
		
		$product_image = display_image($row['product_image']);
		
		$product = <<<DELIMETER
		
<div class="col-sm-4 col-lg-4 col-md-4 text-left">
<div class="thumbnail">
<a href="item.php?id={$row['product_id']}"><img src="../resources/uploads/{$row['product_id']}/{$product_image}" alt="" style="width:360px;height:400px"></a>
<div class="caption">
<h4 class="pull-right">{$row['product_price']} zł</h4>
<h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
</h4>

<p>{$row['short_desc']}</p>
 <a class="btn btn-primary" target="_self" href="../resources/cart.php?add={$row['product_id']}">Dodaj do koszyka</a>
</div>

</div>
</div>
		
DELIMETER;
		
		echo $product;
	}
}

function login_cms(){
	
	if(isset($_POST['submit'])){
		
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		
		$query = query("SELECT * FROM admins WHERE username = '{$username}' AND password = '{$password}'");
		confirm($query);
		
		if(mysqli_num_rows($query) == 0) {
			
			set_message("Taki login lub hasło nie istnieje");
			redirect("login_cms.php");
		}else {
			
			$_SESSION['username'] = $username;
			//set_message("Zalogowano pomyślnie");
			redirect("admin/index.php?orders");
		}
	}
}
function login_user(){
	
	if(isset($_POST['submit'])){
		
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		//$_SESSION['email'] = $email;
		
		
		$query = query("SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
		confirm($query);
		
		if(mysqli_num_rows($query) == 0) {
			
			set_message("Taki login lub hasło nie istnieje");
			//redirect("login.php");
		}else {
			
			$_SESSION['email'] = $email;
			//set_message("Zalogowano pomyślnie");
			//redirect("index.php");
		}
	}
}
function show_login_area(){
					login_user();
					$login_area = <<<DELIMETER
					<li>
                        <a href="login/signup.php">Rejestracja</a>
                    </li>
					<li>
                        <a href="login/main_login.php">Zaloguj się</a>
                    </li>
DELIMETER;
					if(!isset($_SESSION['username']))
					{
						
						echo $login_area;
					}
					else
					{
					return;
					}
	}	
	
function show_dropdown_area(){
					error_reporting(E_ERROR);
					$users_nick = $_SESSION['username'];
					$dropdown_area = <<<DELIMETER
					<ul class="nav navbar-nav navbar-right">
					 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">$users_nick <i class="fa fa-user"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="divider"></li>
                        <li>
                            <a href="login/logout.php"><i class="fa fa-fw fa-power-off"></i> Wyloguj</a>
                        </li>
                    </ul>
                </li>
				</ul>
DELIMETER;
					if(isset($_SESSION['username'])){
					

					return $dropdown_area;
		}	
	}

function send_message(){
	if(isset($_POST['submit'])){
		
		$to        = "stiekerosiem@gmail.com";
		$from_name = $_POST['name'];
		$subject   = $_POST['subject'];
		$email     = $_POST['email'];
		$message   = $_POST['message'];
		
		$headers = "From: {$from_name} {$email}";
		
		$result = mail($to, $subject, $message, $headers);
		
		if(!$result) {
			
			echo "Error";
			redirect("contact");
			
		}else{
			set_message("Wysłano pomyślnie");
		}
	}
	
}

/*--------------------------------------------------BACK END FUNCTIONS*/

function display_orders(){
	
	$query = query(" SELECT * FROM orders");	
	confirm($query);
	
	while($row = fetch_array($query)){
		
		$orders = <<<DELIMETER
		
<tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
	<td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;
echo $orders;
}	}

/*--------------------------------------------------Admin products*/


function get_products_in_admin(){
	
	$query = query(" SELECT * FROM products");
	
	confirm($query);
	
while($row = fetch_array($query)){
$category = show_product_category_title($row['product_category_id']);

$product_image = display_image($row['product_image']);
	
$product = <<<DELIMETER
<tr>
	<td>{$row['product_id']}</td>
	<td>{$row['product_title']}<br>
	<a href="index.php?edit_product&id={$row['product_id']}"><img src="uploads/{$row['product_id']}/{$product_image}" alt="" width="42" height="60" ></td></a>
	<td>{$category}</td>
	<td>{$row['product_price']}</td>
	<td>{$row['product_quantity']}</td>
    <td><a class="btn btn-info" href="index.php?edit_product&id={$row['product_id']}"><span class="glyphicon glyphicon-pencil"></span></a></td>
	<td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>		
DELIMETER;
		
		echo $product;
	}		
}

function show_product_category_title($product_category_id){

$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
confirm($category_query);

while($category_row = fetch_array($category_query)){
	
	return $category_row['cat_title'];
}
}

function add_product(){
	
if(isset($_POST['publish'])){
	
	$product_title 			= escape_string($_POST['product_title']);
	$product_category_id 	= escape_string($_POST['product_category_id']);
	$product_price 			= escape_string($_POST['product_price']);
	$product_quantity 		= escape_string($_POST['product_quantity']);
	$product_description 	= escape_string($_POST['product_description']);
	$short_desc				= escape_string($_POST['short_desc']);
	$product_image 			= escape_string($_FILES['file1']['name']);
	$add_image_2 			= escape_string($_FILES['file2']['name']);
	$add_image_3  			= escape_string($_FILES['file3']['name']);
	$add_image_4  			= escape_string($_FILES['file4']['name']);
	$add_image_5  			= escape_string($_FILES['file5']['name']);
	$product_image_temp_location	= $_FILES['file1']['tmp_name'];					//bez escape string bo był problem
	$add_image_2_temp_location	= $_FILES['file2']['tmp_name'];	
	$add_image_3_temp_location	= $_FILES['file3']['tmp_name'];	
	$add_image_4_temp_location	= $_FILES['file4']['tmp_name'];	
	$add_image_5_temp_location	= $_FILES['file5']['tmp_name'];	
	
	
	
	//$strpath = (string) $path;


	
	$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_quantity, product_description, short_desc, product_image, add_image_2, add_image_3, add_image_4, add_image_5) 
	VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_quantity}', '{$product_description}', '{$short_desc}', '{$product_image}', '{$add_image_2}', '{$add_image_3}', '{$add_image_4}', '{$add_image_5}')");
	confirm($query);
	$path = last_id();
	
	if ( ! is_dir($path)) {
    mkdir(UPLOAD_DIRECTORY . DS . $path);
}
	move_uploaded_file($product_image_temp_location , UPLOAD_DIRECTORY . DS . $path . DS . $product_image);
	move_uploaded_file($add_image_2_temp_location , UPLOAD_DIRECTORY . DS . $path . DS . $add_image_2);
	move_uploaded_file($add_image_3_temp_location , UPLOAD_DIRECTORY . DS . $path . DS . $add_image_3);
	move_uploaded_file($add_image_4_temp_location , UPLOAD_DIRECTORY . DS . $path . DS . $add_image_4);
	move_uploaded_file($add_image_5_temp_location , UPLOAD_DIRECTORY . DS . $path . DS . $add_image_5);
	
	$last_id = last_id();
	set_message("Dodano nowy produkt o identyfikatorze {$last_id}");
	redirect("index.php?products");	
}
}
function show_categories_add_product_page(){
	
$query = query("SELECT * FROM categories");
confirm($query);

while($row = fetch_array($query)){
						
$categories_options = <<<DELIMETER

<option value="{$row['cat_id']}">{$row['cat_title']}</option>	

DELIMETER;

echo $categories_options;
					
				}
	
}
function update_product(){
	
if(isset($_POST['update'])){
	
	$product_title 			= escape_string($_POST['product_title']);
	$product_category_id 	= escape_string($_POST['product_category_id']);
	$product_price 			= escape_string($_POST['product_price']);
	$product_quantity 		= escape_string($_POST['product_quantity']);
	$product_description 	= escape_string($_POST['product_description']);
	$short_desc				= escape_string($_POST['short_desc']);
	$product_image 			= escape_string($_FILES['file']['name']);
	$image_temp_location	= $_FILES['file']['tmp_name'];					//bez escape string bo był problem
	
	if(empty($product_image)){
		
		$get_pic = query("SELECT product_image FROM products WHERE product_id =" .escape_string($_GET['id']). "");
		confirm($get_pic);
		
		while($pic = fetch_array($get_pic)){
			$product_image = $pic['product_image'];
			
		}
		
		
	}
	
	move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $product_image);
	
	$query  = "UPDATE products SET ";
	$query .= "product_title 			= '{$product_title}'		, ";
	$query .= "product_category_id 		= '{$product_category_id}'	, ";
	$query .= "product_price 			= '{$product_price}'		, ";
	$query .= "product_quantity 		= '{$product_quantity}'		, ";
	$query .= "product_description 		= '{$product_description}'	, ";
	$query .= "short_desc 				= '{$short_desc}'			, ";
	$query .= "product_image 			= '{$product_image}'		  ";
	$query .= "WHERE product_id=" . escape_string($_GET['id']);
	
	$send_update_query = query($query);
	confirm($send_update_query);
	set_message("Zaktualizowano produkt");
	redirect("index.php?products");	
}
}

function show_categories_in_admin(){
$category_query = query("SELECT * FROM categories");
confirm($category_query);

while($row = fetch_array($category_query)){
	
$cat_id = $row['cat_id'];						
$cat_title = $row['cat_title'];

$category = <<<DELIMETER
	
<tr>
	<td>{$cat_id}</td>
	<td>{$cat_title}</td>
	<td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;
echo $category;
					
				}
	
}
function add_category(){
	
	if(isset($_POST['add_category'])){
		$cat_title = escape_string($_POST['cat_title']);
		
		if(empty($cat_title) || $cat_title == " ") {
			
			echo "<p class='bg-danger'>Pole nie może być puste</p>";
		} else {
		
		$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
		confirm($insert_cat);
		
		set_message("Kategoria dodana");
		
		}
	}
}


function display_users(){
$query = query("SELECT * FROM users");
confirm($query);

while($row = fetch_array($query)){
	
$user_id = $row['user_id'];						
$username = $row['username'];
$password = $row['password'];
$email = $row['email'];

$user = <<<DELIMETER
<tr>
		<td>{$user_id}</td>
		<td>{$username}</td>			   
		
		<td>{$email}</td>
		<td><a class="btn btn-info" href="../../resources/templates/back/edit_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>
DELIMETER;
echo $user;
					
				}
	
}
function add_user(){
	if(isset($_POST['add_user'])){
		
		$username 	= escape_string($_POST['username']);
		$password 	= escape_string($_POST['password']);
		$email 		= escape_string($_POST['email']);
		//$user_photo = escape_string($_FILES['file']['name']);
		//$photo_temp = $_FILES['file']['tmp_name'];
		
		//move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);
		
		$query = query("INSERT INTO users(username,password,email) VALUES('{$username}','{$password}','{$email}')");
		confirm($query);
		
		redirect("index.php?users");
	}
}
function get_reports(){
	
	$query = query(" SELECT * FROM reports");
	
	confirm($query);
	
while($row = fetch_array($query)){
	
$report = <<<DELIMETER
<tr>
	<td>{$row['report_id']}</td>
	<td>{$row['product_id']}</td>
	<td>{$row['order_id']}<br>
	<td>{$row['product_price']}</td>
	<td>{$row['product_title']}</td>
	<td>{$row['product_quantity']}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>		
DELIMETER;
		
		echo $report;
	}		
}

/*---------------------------------------------------SLIDES*/
function add_slides(){
	
}

function get_current_slide() {
	
}
function get_active() {
	
}
function get_slides() {
	$query = query("SELECT * FROM slides");
	confirm($query);
	
	while($row = fetch_array($query)){
		
$slides = <<<DELIMETER
<div class="item">
		<img class="slide-image" src="images/carousel/karuzela2.jpg" alt="">
		
</div>

DELIMETER;
	
echo $slides;	
		
	}
	
}
function get_slide_thumbnails() {
	
	
}
/*---------------------------------------------------END SLIDES*/
?>