<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $template['title'] ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php $settings = Setting::first(); ?>
    <meta name="keywords" content="<?php echo isset($settings->keywords) && $settings->keywords  != '' ? $settings->keywords : ''; ?>">
    <?php echo $template['partials']['styles'] ?>
</head>
<body class="skin-blue" style="padding-bottom: 70px;">
    <!-- Top header section. Contains the profile details -->
    <?php echo $template['partials']['header'] ?>
    <div class="wrapper">   
          <?php echo $template['body'] ?>
    </div>
    <?php echo $template['partials']['footer'] ?>
</body>
</html>