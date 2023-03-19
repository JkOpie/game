<html>
<?php include('db_connection.php'); ?>

<head>
    <title>Touch the View Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<style>
    .card-body{
        border-radius: 6px;
    }
    .card-body:hover{
        background-color: #0d6efd;
        color: #fff;
        border-radius: 6px;
    }

</style>

<body>
    <div class="container">
        <div class="d-flex justify-content-start align-items-center py-4">
            <a class="btn btn-outline-primary me-3" href="index.php">Play Game</a>
            <h1>Top 25 Dashboard</h1>
        </div>

        <div class="card">
            <div class="card-body bg-primary text-white">
                <div class="row">
                    <div class="col-2">No.</div>
                    <div class="col-3">Name</div>
                    <div class="col-2">Score</div>
                    <div class="col-2">Time</div>
                    <div class="col-3">Win At</div>
                </div>
            </div>
        </div>

        <?php
        $sql = 'select * from win order by score desc limit 25';
        $result = $conn->query($sql);
        $count = 0;
        if ($result->num_rows > 0) {
            // output data of each row

            while ($row = $result->fetch_assoc()) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2"><?php echo ++$count ;?></div>
                            <div class="col-3"> <?php echo $row['name']; ?></div>
                            <div class="col-2"> <?php echo $row['score']; ?></div>
                            <div class="col-2"> <?php echo $row['seconds'].'sec'; ?></div>
                            <div class="col-3"> <?php echo $row['created_at']; ?></div>
                        </div>
                    </div>
                </div>
        <?php }
        }
        ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
</script>