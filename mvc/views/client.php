<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <?php if ($data['page'] === 'product_detail') echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>' ?>
    <?php if (isset($data['css'])) {
        foreach ($data['css'] as $value) {
    ?>
            <link rel="stylesheet" href="<?php echo _PUBLIC_PATH . '/client/assets/css/' . $value . '.css' ?>" />
    <?php
        }
    } ?>
    <title><?= 'Mooboo | ' . htmlspecialchars($data['title']) ?></title>
</head>

<body>
    <div class="wrapper">
        <?php require_once VIEW_PATH . "block/client/header.php" ?>
        <?php require_once VIEW_PAGE_PATH . 'client/' . $data['page'] . '.php' ?>
        <?php require_once VIEW_PATH . "block/client/footer.php" ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($data['page'] === 'product_detail') echo '<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>' ?>
    <script src="<?php echo _PUBLIC_PATH . '/client/assets/js/' . $data['js'] . '.js' ?>"></script>
</body>

</html>