<!DOCTYPE html>
<html>
<head>
  <?php if (isset($title)): ?>
    <title> <?= htmlspecialchars($title) ?> </title>
  <?php else: ?>
    <title>Google Form Spammer</title>
  <?php endif ?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <script type="text/javascript" src="assets/js/home.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

  <div class="page-header">
    <pre><h1>Google Form Spammer <small>Infinite Submissions</small></h1></pre>
    <h3>Only works with Google Forms which have multiple submisions allowed. Doesn't work with forms which require login.</h3>
  </div>
