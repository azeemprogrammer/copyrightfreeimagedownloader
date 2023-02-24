<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Copyright Free Image Downloader</title>
  <!-- Add Bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Copyright Free Image Downloader</h1>
    <form method="GET" action="">
      <div class="form-group">
        <input type="text" name="q" class="form-control" placeholder="Search images" value="<?php echo $_GET['q'] ?? ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <hr>
    <div class="row">
      <?php
      $apiKey = '31733936-2d1721d6529567277ce7c3792';
      $url = 'https://pixabay.com/api/?key=' . $apiKey . '&q=' . urlencode($_GET['q'] ?? '') . '&per_page=20';
      $response = file_get_contents($url);
      $data = json_decode($response);
      foreach ($data->hits as $image) {
        ?>
        <div class="col-md-3 mb-3">
          <div class="card rounded">
            <img src="<?php echo $image->webformatURL; ?>" class="card-img-top " alt="<?php echo $image->tags; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $image->tags; ?></h5>
              <p>By: <?php echo $image->user; ?></p>
              <a href="image.php?id=<?php echo $image->id; ?>" class="btn btn-primary">Download</a>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
  <!-- Add Bootstrap JS CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
