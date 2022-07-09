<?php
	include 'connect.php';
	$sql = "SELECT COUNT(wishlist.p_id), product.p_id, p_name FROM wishlist LEFT JOIN product ON product.p_id = wishlist.p_id  GROUP BY wishlist.p_id ORDER BY COUNT(wishlist.p_id) DESC LIMIT 5";
              $result = mysqli_query($conn, $sql);
              $data = array();
				foreach ($result as $row) {
					$data[] = $row;
				}
                

mysqli_close($conn);
echo json_encode($data);

?>