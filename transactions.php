<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "transactions";
include("header.php");

if(isset($_SESSION['username'])){ 
	$group_query = "SELECT permissions 
	FROM Users 
	WHERE username='" . $_SESSION['username'] . "'";
	$group_statement = $conn->prepare($group_query);
	$group_statement->execute();
	$group = $group_statement->fetchColumn(0);
	$group_statement->closeCursor();
	
	if($group === 'admin' || $group === "superuser") {
		$transactions_query = "SELECT *
		FROM transactions
		ORDER BY date DESC LIMIT 50";
		$transactions_statement = $conn->prepare($transactions_query);
		$transactions_statement->execute();
		$transactions = $transactions_statement->fetchAll();
		$transactions_statement->closeCursor();
?>
<!-- Main Content Begin -->

<div class="container users_container">
	<h1>Transactions</h1>
	<table>
		<tr>
			<th>Slide ID</th>
			<th>Username</th>
			<th>Type</th>
			<th>Date</th>
		</tr>
		
<?php foreach ($transactions as $transaction) : ?>
		<tr>
			<td><?php echo $transaction['slideid']; ?></td>
			<td><?php echo $transaction['username']; ?></td>
			<td><?php echo $transaction['type']; ?></td>
			<td><?php echo $transaction['date']; ?></td>
		</tr>
<?php endforeach; ?>

	</table>
</div>

<!-- Main Content End -->
<?php
include("footer.php");
	} //endif isadmin
	else {
		echo "You do not have permission to access this page.";
	}
} // endif username isset

else {
	$loginURL = "login_page.php";
	echo "Please <a href='$loginURL'>login</a> to continue";
}
?>
