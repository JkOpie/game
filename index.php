<!DOCTYPE html>
<html>

<head>
  <title>Touch the View Game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div class="container-fluid">
    
    <div class="center">
      <div class="game" id="game">
        <h1>Touch the highlighted view</h1>
        <h4 class="mb-0">Level: <span id="level">0</span></h4>
        <h4 class="mb-0">Score: <span id="score">0</span></h4>
        <div id="views">
          <div class="view"></div>
          <div class="view"></div>
          <div class="view"></div>
          <div class="view"></div>
        </div>
        <div class="text-center">
          <h4 class="mb-3">Timer: <span id="timer">0.00</span></h4>
          <button class="btn  btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Modal</button>
          <button id="start" class="btn  btn-outline-primary">Start</button>
          <button id="restart" class="btn btn-outline-secondary">Restart</button>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Top 25 winners</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="add_win.php" method="post">

              <div class="form-group mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="form-group mb-3">
                <label class="form-label">Score</label>
                <input type="text" name="score" class="form-control" value="0" disabled>
                <input type="hidden" name="score" class="form-control" value="0">
              </div>

              <div class="form-group mb-3">
                <label class="form-label">Time (seconds)</label>
                <input type="text" name="time" class="form-control" value="0" disabled>
                <input type="hidden" name="time" class="form-control" value="0">
              </div>

              <div class="text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            
          </div>
          
        </div>
      </div>
  </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script1.js"></script>
</body>

</html>