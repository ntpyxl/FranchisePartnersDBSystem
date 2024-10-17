<?php require_once 'core/dbConfig.php' ?>
<?php require_once 'core/functions.php' ?>

<html>
    <head>
        <title>ntpyxl Franchising Partners</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <input type="submit" value="Return to home page" onclick="window.location.href='index.php'">
        
        <?php $PartnerIDData = getPartnerByID($pdo, $_GET['partner_id']); ?> <br><br>
        <b>Currently viewing:</b> <br>
        <b>Partner ID:</b> <?php echo $PartnerIDData['partner_id']; ?> <br>
        <b>Partner Name:</b> <?php echo $PartnerIDData['first_name'] . ' ' . $PartnerIDData['last_name']; ?>

        <h3>ADD A NEW FRANCHISE:</h3>
        <form action="core/handleForms.php?partner_id=<?php echo $_GET['partner_id']; ?>" method="POST">
            <label for="business_name">Name</label>
            <input type="text" name="business_name" id="business_name" required> <br>

            <label for="franchise_location">Location</label>
            <input type="text" name="franchise_location" id="franchise_location" required> <br>

            <input type="submit" name="addFranchiseButton" value="Add franchise">
        </form> <br>

        <h3>Partner <?php echo $PartnerIDData['first_name']; ?>'s franchises:</h3>
        <table>
            <tr>
                <th>Franchise ID</th>
                <th>Franchise Name</th>
                <th>Franchise Location</th>
                <th>Date Franchised</th>
                <th>Actions</th>
            </tr>

            <?php $PartnerFranchisesData = getFranchisesByPartnerID($pdo, $_GET['partner_id']); ?>
            <?php foreach ($PartnerFranchisesData as $row) { ?>
            <tr>
                <td><?php echo $row['franchise_id']?></td>
                <td><?php echo $row['business_name']?></td>
                <td><?php echo $row['franchise_location']?></td>
                <td><?php echo $row['date_franchised']?></td>
                <td>
                    <?php
                        $franchise_id = $row['franchise_id'];
                        $partner_id = $_GET['partner_id'];
                    ?>
                    <input type="submit" value="Edit Franchise" onclick="window.location.href='editFranchise.php?franchise_id=<?php echo $franchise_id; ?>&partner_id=<?php echo $partner_id; ?>';">
                    <input type="submit" value="Remove Franchise" onclick="window.location.href='removeFranchise.php?franchise_id=<?php echo $franchise_id; ?>&partner_id=<?php echo $partner_id; ?>';">
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>