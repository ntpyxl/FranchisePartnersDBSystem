<?php require_once 'core/dbConfig.php' ?>
<?php require_once 'core/functions.php' ?>

<html>
    <head>
        <title>ntpyxl Franchising Partners</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h3>Are you sure you want to remove this franchise?</h3>

        <?php $PartnerIDData = getPartnerByID($pdo, $_GET['partner_id']); ?>
        <b>Currently viewing:</b> <br>
        <b>Partner ID:</b> <?php echo $PartnerIDData['partner_id']; ?> <br>
        <b>Partner Name:</b> <?php echo $PartnerIDData['first_name'] . ' ' . $PartnerIDData['last_name']; ?> <br><br>

        <?php $franchiseData = getFranchiseByID($pdo, $_GET['franchise_id']) ?>
        <form action="core/handleForms.php?franchise_id=<?php echo $_GET['franchise_id']; ?>&partner_id=<?php echo $_GET['partner_id']; ?>" method="POST">
            <table>
                <tr>
                    <th>Franchise ID</th>
                    <th>Franchise Name</th>
                    <th>Franchise Location</th>
                    <th>Date Franchised</th>
                </tr>
                <tr>
                    <td><?php echo $franchiseData['franchise_id']?></td>
                    <td><?php echo $franchiseData['business_name']?></td>
                    <td><?php echo $franchiseData['franchise_location']?></td>
                    <td><?php echo $franchiseData['date_franchised']?></td>
                </tr>
            </table>

            <input type="submit" name="removeFranchiseButton" value="Remove">
        </form>

        <input type="submit" value="Cancel" onclick="window.location.href='viewPartnerFranchises.php?partner_id=<?php echo $_GET['partner_id']; ?>';">
    <body>
</html>