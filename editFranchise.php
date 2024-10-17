<?php require_once 'core/dbConfig.php' ?>
<?php require_once 'core/functions.php' ?>

<html>
    <head>
        <title>ntpyxl Franchising Partners</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h3>Please edit the according values as you intend.</h3>

        <?php $PartnerIDData = getPartnerByID($pdo, $_GET['partner_id']); ?>
        <b>Currently viewing:</b> <br>
        <b>Partner ID:</b> <?php echo $PartnerIDData['partner_id']; ?> <br>
        <b>Partner Name:</b> <?php echo $PartnerIDData['first_name'] . ' ' . $PartnerIDData['last_name']; ?> <br><br>

        <?php $franchiseData = getFranchiseByID($pdo, $_GET['franchise_id']); ?>

        <form action="core/handleForms.php?franchise_id=<?php echo $_GET['franchise_id']; ?>&partner_id=<?php echo $_GET['partner_id']; ?>" method="POST">
            <label for="business_name">Name:</label>
            <input type="text" name="business_name" id="business_name" value="<?php echo $franchiseData['business_name']; ?>"> <br>

            <label for="franchise_location">Location:</label>
            <input type="text" name="franchise_location" id="franchise_location" value="<?php echo $franchiseData['franchise_location']; ?>"> <br>
            
            <input type="submit" name="editFranchiseButton" value="Apply changes">
        </form>

        <input type="submit" value="Cancel" onclick="window.location.href='viewPartnerFranchises.php?partner_id=<?php echo $_GET['partner_id']; ?>';">
    <body>
</html>