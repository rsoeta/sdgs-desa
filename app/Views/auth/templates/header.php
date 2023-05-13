<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/login-style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://pemdespsl.site/assets/css/login-form-elements.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://pemdespsl.site/assets/bootstrap/css/bootstrap.bar.css" media="screen" type="text/css" />
    <link type='text/css' href="https://pemdespsl.site/desa/css/siteman.css" rel='Stylesheet' />
    <link rel="shortcut icon" href="https://pemdespsl.site/desa/logo/favicon.ico" />
    <script src="<?= base_url(); ?>/dist/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="https://pemdespsl.site/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://pemdespsl.site/assets/js/validasi.js"></script>
    <script type="text/javascript" src="https://pemdespsl.site/assets/js/localization/messages_id.js"></script>
    <script type="text/javascript">
        var csrfParam = 'sidcsrf';
        var getCsrfToken = () => document.cookie.match(new RegExp(csrfParam + '=(\\w+)'))[1]
    </script>
</head>