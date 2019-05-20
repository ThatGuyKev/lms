<?php
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'lms');

	$sql = $conn->prepare("SELECT studentID, studentName FROM students WHERE studentName LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		// $studentResult[] = $row["studentName"];
$studentResult[] = $row;
		}
		echo json_encode($studentResult);
	}
	$conn->close();
?>
