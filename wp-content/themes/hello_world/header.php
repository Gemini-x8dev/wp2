<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= bloginfo('title') ?></title>
    <?php echo wp_head() ?>
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="<?= site_url() ?>"><?= bloginfo('title') ?></a></h5>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4"><?= bloginfo('title') ?></h1>
    <p class="lead"><?= bloginfo('description') ?></p>
</div>
