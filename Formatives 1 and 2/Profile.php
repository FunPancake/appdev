<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Resume</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>My Student Resume</h1>
</header>

<main>
    <table>
        <!-- Profile Row -->
        <tr>
            <th colspan="2">Profile</th>
        </tr>
        <tr>
            <td style="width: 35%; text-align: center;">
                <img src="selfie.jpg" alt="Profile" class="profile-image">
            </td>
            <td style="width: 60%;">
                <?php include 'information.php'; showPersonalInfo(); ?>
            </td>
        </tr>

        <!-- Career Objective -->
        <tr><td colspan="2"><?php showCareerObjective(); ?></td></tr>

        <!-- Educational Attainment -->
        <tr><td colspan="2"><?php showEducation(); ?></td></tr>

        <!-- Skills -->
        <tr><td colspan="2"><?php showSkills(); ?></td></tr>

        <!-- Affiliations -->
        <tr><td colspan="2"><?php showAffiliation(); ?></td></tr>

        <!-- Work Experience -->
        <tr><td colspan="2"><?php showWorkExperience(); ?></td></tr>
    </table>
</main>

</body>
</html>
