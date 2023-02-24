<?php
// Replace 'your_api_key_here' with your actual Pixabay API key
$api_key = '31733936-2d1721d6529567277ce7c3792';

// Check if an image ID was passed in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Fetch image details from Pixabay API
  $url = "https://pixabay.com/api/?key=$api_key&id=$id";
  $response = file_get_contents($url);
  $data = json_decode($response);
  
  // Extract the image details
  $image = $data->hits[0];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $image->tags; ?> - Copyright Free Image Downloader</title>
  <!-- Add Bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1><?php echo $image->tags; ?></h1>
    <img src="<?php echo $image->webformatURL; ?>" class="img-fluid" alt="<?php echo $image->tags; ?>">
    <hr>
    <div class="row">
      <div class="col-md-6">
        <ul class="list-group">
          <li class="list-group-item"><strong>Views:</strong> <?php echo $image->views; ?></li>
          <li class="list-group-item"><strong>Downloads:</strong> <?php echo $image->downloads; ?></li>
          <li class="list-group-item"><strong>Likes:</strong> <?php echo $image->likes; ?></li>
          <li class="list-group-item"><strong>Comments:</strong> <?php echo $image->comments; ?></li>
        </ul>
      </div>
      <div class="col-md-6">
        <h5>Uploaded by:</h5>
        <p><?php echo $image->user; ?></p>
        <a href="<?php echo $image->largeImageURL; ?>" class="btn btn-primary">Download</a>
      </div>
    </div>
  </div>
  <!-- Add Bootstrap JS CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
