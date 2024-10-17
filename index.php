<?php require_once 'core/dbConfig.php' ?>
<?php require_once 'core/functions.php' ?>

<html>
    <head>
        <title>ntpyxl Franchising Partners</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h2>Welcome to ntpxl's Franchising Partners! Enter below your details to become a partner!</h2>
        
        <form action="core/handleForms.php" method="POST">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" required> <br>

            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" required> <br>

            <label for="age">Age</label>
            <input type="number" name="age" id="age" min="0" required> <br>

            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Gay">Gay</option>
                <option value="Lesbian">Lesbian</option>
                <option value="Transgender">Transgender</option>
                <option value="Prefer Not To Say">Prefer Not To Say</option>
            </select> <br>

            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" min="1970-01-01" max="2024-12-31" required> <br>

            <label for="home_address">Home Address</label>
            <input type="text" name="home_address" id="home_address" required> <br>

            <input type="submit" name="addPartnerButton" value="Add partner">
        </form> <br>

        <h3>Our partners and their franchises!</h3>
        <table>
            <tr>
                <th>Partner ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Home Address</th>
                <th>Date Registered</th>
                <th>Actions</th>
            </tr>

            <?php $allPartnersData = getAllPartners($pdo); ?>
            <?php foreach ($allPartnersData as $row) { ?>
            <tr>
                <td><?php echo $row['partner_id']?></td>
                <td><?php echo $row['first_name']?></td>
                <td><?php echo $row['last_name']?></td>
                <td><?php echo $row['age']?></td>
                <td><?php echo $row['gender']?></td>
                <td><?php echo $row['birthdate']?></td>
                <td><?php echo $row['home_address']?></td>
                <td><?php echo $row['date_registered']?></td>
                <td style="max-width: 350px;">
                    <input type="submit" value="View Franchises" onclick="window.location.href='viewPartnerFranchises.php?partner_id=<?php echo $row['partner_id']; ?>';">
                    <input type="submit" value="Edit Partner" onclick="window.location.href='editPartner.php?partner_id=<?php echo $row['partner_id']; ?>';">
                    <input type="submit" value="Remove Partner" onclick="window.location.href='removePartner.php?partner_id=<?php echo $row['partner_id']; ?>';">
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>