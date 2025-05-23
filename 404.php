<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>404 - Page Not Found</title>

  <!-- Lottie Animation Library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>

  <!-- Inline CSS -->
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .error-container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #f8f9fa;
    }

    .error-content {
      text-align: center;
    }

    .error-content h1 {
      font-size: 6rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    .error-content p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }

    .lottie-animation {
      max-width: 400px;
      margin-bottom: 2rem;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="error-container">
    <div class="lottie-animation"></div>
    <div class="error-content">
      <h1>404</h1>
      <p>Oops! The page you are looking for does not exist.</p>
      <a href="http://localhost/clean-blog/index.php" class="btn">Go Back</a>
    </div>
  </div>

  <!-- Inline JS -->
  <script>
    const animation = lottie.loadAnimation({
      container: document.querySelector('.lottie-animation'),
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'
    });
  </script>

</body>
</html>
