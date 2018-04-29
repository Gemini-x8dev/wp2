<?php

require_once dirname(__FILE__) . "/../HwInit.php";

HwInit::includeClasses('API');

if (isset($_POST['blogname'])) {
    if($_POST['blogname']) {
        Options::updateOption('blogname',$_POST['blogname']);
    }
    if($_POST['about']) {
        Options::updateOption('about',$_POST['about']);
    }
}
?>

<div class="wrap">
    <h1>Bespoke Settings</h1>

    <form action="" method="post">
        <p>This is a totally bispoke set of settings. I dont know how the heck they could be used.</p>
        <table class="form-table"><tbody>
            <tr>
                <th scope="row">Blog Name</th>
                <td>
                    <input type="text" name="blogname" value="<?= Options::getOption('blogname') ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">About</th>
                <td>
                    <textarea name="about" rows="5" cols="30"><?= Options::getOption('about') ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
    </form>

</div>