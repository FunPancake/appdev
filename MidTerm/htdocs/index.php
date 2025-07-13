<?php
session_start();
$menu = [
  ['name' => 'Home', 'link' => 'index.php'],
  [
    'name' => 'Pricing',
    'link' => '#',
    'sub' => [
      ['name' => 'Single', 'link' => 'single.php'],
      ['name' => 'Twin', 'link' => 'twin.php'],
      ['name' => 'Double', 'link' => 'double.php'],
      ['name' => 'Suite', 'link' => 'suite.php']
    ]
  ],
  [
    'name' => 'About',
    'link' => '#',
    'sub' => [
      ['name' => 'Developers', 'link' => 'About.php']
    ]
  ],
  ['name' => 'Login', 'link' => 'login.php']
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hotel Homepage</title>
  <link rel="stylesheet" href="mainstyle.css?v=3">
</head>
<body>

  <!-- Navigation Menu -->
  <nav class="menu">
  <ol>
    <?php foreach ($menu as $item): ?>
      <li>
        <a href="<?= htmlspecialchars($item['link']) ?>">
          <?= htmlspecialchars($item['name']) ?>
        </a>
        <?php if (isset($item['sub'])): ?>
          <ul class="sub-menu">
            <?php foreach ($item['sub'] as $sub): ?>
              <li>
                <a href="<?= htmlspecialchars($sub['link']) ?>">
                  <?= htmlspecialchars($sub['name']) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>


  <!-- Background Slideshow -->
  <div class="background-slideshow"></div>

  <!-- Main Content -->
  <div class="content">
    <h1>Welcome to Our Hotel Booking System</h1>
    <p>Choose your room, check availability, and book with ease!</p>
  </div>

  <!-- Slideshow Script -->
  <script>
    const images = [
      '1st_image.jpg',
      '2nd_image.jpg',
      '3rd_image.jpg'
    ];

    let current = 0;
    const bg = document.querySelector('.background-slideshow');

    function changeBackground() {
      bg.style.opacity = 0;
      setTimeout(() => {
        current = (current + 1) % images.length;
        bg.style.backgroundImage = url('${images[current]}');
        bg.style.opacity = 1;
      }, 500);
    }

    bg.style.backgroundImage = url('${images[0]}');
    bg.style.opacity = 1;
    setInterval(changeBackground, 6000);
  </script>

</body>
</html>