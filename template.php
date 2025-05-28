<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Component Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightgray;
        }

        header {
            background-color: darkslategray;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            font-size: 36px;
            color: darkred;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        nav {
            background-color: dimgray;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            padding: 20px;
            background-color: white;
        }

        section {
            margin-bottom: 20px;
            padding: 15px;
            background-color: lightgray;
            border-left: 5px solid blue;
        }

        p {
            font-size: 16px;
            color: black;
            line-height: 1.6;
            background-color: whitesmoke;
            padding: 10px;
            border-left: 4px solid steelblue;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            margin: 20px 0;
            width: 100%;
            max-width: 400px;
        }

        input, select, textarea, button {
            display: block;
            margin: 10px 0;
            padding: 8px;
            width: 100%;
            font-size: 16px;
            border: 1px solid gray;
            border-radius: 4px;
        }

        button {
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkblue;
        }

        .extra-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 4px;
        }

        .extra-button:hover {
            background-color: darkgreen;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: navy;
            color: white;
        }

        footer {
            background-color: silver;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <h1>This is Header</h1>
</header>

<!-- Navigation -->
<nav>
    <ul>
        <li><a href="#">Menu 1</a></li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
    </ul>
</nav>

<!-- Main Content -->
<main>

    <!-- Section -->
    <section>
        <h2>This is a Section</h2>
        <p>This paragraph is inside a section. You can use this for grouping content logically.</p>
    </section>

    <!-- Paragraph -->
    <p>This is a standalone paragraph below the section.</p>

    <!-- Form -->
    <div class="form-container">
        <form action="submit.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email">

            <button type="submit">Submit</button>
        </form>

        <!-- Extra Button Below the Form -->
        <button class="extra-button">Click Me</button>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>This is header</td>
                <td>Table content</td>
            </tr>
            <tr>
                <td>Row 2</td>
                <td>More content</td>
            </tr>
        </tbody>
    </table>

</main>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> All rights reserved. This is Footer.
</footer>

</body>
</html>
