<?php
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'lms');

	$sql = $conn->prepare("SELECT ISBN FROM books WHERE ISBN LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		// $studentResult[] = $row["studentName"];
$bookResult[] = $row;
		}
		echo json_encode($bookResult);
	}
	$conn->close();
?>
