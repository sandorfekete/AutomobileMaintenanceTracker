<?php

require_once 'autoload.php';

AMT::init();
Database::init();

$order = new Order();
//$order->fetch('0');
//$order->get('foo');
//$order->set('notes', 100);
$order->set('notes', '100 <html> "DELETE FROM", INSERT inot');
//$order->save();

echo '<pre>'; print_r($order); exit();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Automobile Maintenance Tracker</title>

    <!-- AMT CSS -->
    <link rel="stylesheet" href="css/template.css" />

    <!-- OTHER JS -->
	<script src="<?php echo BASEURL ?>/js/jquery-1.11.2.min.js"></script>
    <!-- AMT JS -->
    <script src="js/AMT.js"></script>
</head>
<body>
    <h1>Automobile Maintenance Tracker</h1>
	
	<h2>Orders</h2>
	
	<table width="100%" border="1">
		<thead>
			<tr>
				<th>id</th>
				<th>auto</th>
				<th>type</th>
				<th>notes</th>
				<th>created</th>
				<th>modified</th>
				<th>completed</th>
				<th>actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Mazda 3 Sedan Blue</td>
				<td>oil change</td>
				<td></td>
				<td>0000-00-00 00:00:00</td>
				<td>0000-00-00 00:00:00</td>
				<td>0000-00-00 00:00:00</td>
				<td>
					<button>EDIT</button>
					<button>DELETE</button>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8">
					<button>ADD</button>
				</td>
			</tr>
		</tfoot>
	</table>
	
	
    <script>AMT.init();</script>
</body>
</html>
