<?php require_once("../../config.php");

if(isset($_GET['id'])) {
	
	$query = query("DELETE FROM orders WHERE order_id = " . escape_string($_GET['id']) . " ");
	confirm($query);
	
	set_message("Zamówienie skasowane");
	redirect("../../../admin/index.php?orders");
} else {
	
	redirect("../../../admin/index.php?orders");
}

?>