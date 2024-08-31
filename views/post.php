<!-- src/Views/post.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post->title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $post->title; ?></h1>
        <p class="text-muted">By <?php echo $post->author; ?> | <?php echo $post->createdDate; ?></p>
        <p><?php echo $post->content; ?></p>
        <a href="/" class="btn btn-secondary">Back to Homepage</a>
    </div>
</body>
</html>
