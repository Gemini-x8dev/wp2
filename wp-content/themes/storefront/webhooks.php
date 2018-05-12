<?php
/*
 * Template Name: webhooks
 */

get_header();
?>
    <div class="uk-card-primary uk-card-body" id="hw2018-change-pword">
        <h3 class="uk-card-title">Looking to change your password eh?</h3>
        <fieldset class="uk-fieldset uk-form-stacked" style="background-color: inherit !important;">
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">Password</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                </div>
            </div>
            <div class="uk-margin">
                <button class="uk-button uk-button-primary" onclick="Hw2018Ajax.changePassword()">Change</button>
            </div>
        </fieldset>
        <p>Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

<?php
get_footer();


