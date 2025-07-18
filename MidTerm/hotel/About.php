<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About</title>
  <style>
        body {
        font: 1.2rem "Fira Sans", sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        background-image: url('coffee.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        
        }
        .container {
        display: flex;
        justify-content: flex-end;
        padding: 40px;
        }
        .right {
        flex: 1;
        max-width: 400px;
        background-color: #c5b49a;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: left;
        }
        .right h2 {
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 1.6rem;
        color: black;
        }
        .actions a.button-17 {
        min-width: 150px;
        text-align: center;
        padding: 12px 24px;
        font-size: 1em;
        border-radius: 30px;
        transition: all 0.3s ease;
        margin-bottom: -30px;
        }

        .button-inline {
        font-size: 1em;
        background-color: var(--color1);
        color: white;
        text-decoration: none;
        border: none;
        font-family: "Varela Round", sans-serif;
        padding: 12px 24px;
        border-radius: 30px;
        transition: background-color 0.3s ease;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        }

        .button-inline:hover {
        background-color: var(--color1g);
        color: black;
        }

        .button-inline.danger {
        background-color: #e74c3c;
        }

        .button-inline.danger:hover {
        background-color: #ff6b6b;
        }
        .button, button, input[type="submit"] {
        cursor: pointer;
        transition: transform 0.2s ease, background 0.3s ease;
        font-size: 1em;
        font-family: "Varela Round", sans-serif;
        color: black;
        }

        .button:hover, button:hover, input[type="submit"]:hover {
        transform: scale(1.05);
        background-color: var(--color2);
        color: black;
        }

        .button-17 {
        font-size: 1em;
        background-color: var(--color1);
        color: white;
        text-decoration: none;
        border: none;
        font-family: "Varela Round", sans-serif;
        transition: background-color 0.3s ease;
        cursor: pointer;
        padding: 12px 24px;
        border-radius: 30px;
        text-align: center;
        display: inline-block;
        margin: 10px;
        position: relative;
        z-index: 10;
        }

        .button-17:hover {
        background-color: var(--color1g);
        color: black;
        }
  </style>
</head>
<body style="background-image: url('coffee.jpg');">
  <button class="button-17" role="button" onclick="window.location.href='index.php'">Home</button>
  <div class="container">
    <div class="right">
      <h2>Developers</h2>
      <p>1. Gerard Aytona</p>
      <p>2. Ian Lindley Del Rosario</p>
      <p>3. Kenjiro Ogura</p>
    </div>
  </div>
</body>
</html>
