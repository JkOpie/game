<?php 

include('db_connection.php'); 

$score = $_POST['score'];

$sql = "SELECT MIN(score) AS min_score, MAX(score) AS max_score
FROM (
    SELECT score
    FROM win
    ORDER BY score DESC
    LIMIT 25
) top_scores;
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if (intval($score) >= $max_score || (intval($score) >= $min_score && intval($score) <= $max_score)) {
            echo  json_encode(["count_within_range_or_above_max" => true]);
        } else {
            echo  json_encode(["count_within_range_or_above_max" => false]);
        }
    }
  } else {
    echo "0 results";
    die();
  }
?>