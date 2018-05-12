<?php

class Welcome {

    public static function welcomeMessage () {
        ?>
        <div class="uk-margin-bottom">
            <p>Give me reviews you silly silly man!
                <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #post-review">Review Time</button>
                <button class="uk-button uk-button-secondary" type="button" uk-toggle="target: #reviews-time" onclick="Hw2018Ajax.Reviews.get()">See some reviews</button></p>
            <!-- This is a button toggling the modal -->
            <!-- This is the modal -->
            <div id="post-review" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                    <h2 class="uk-modal-title">Put a honest review</h2>
                    <p>
                    <fieldset class="uk-fieldset" id="hw2018-reviews-form" style="background-color: inherit !important;">

                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="Name">
                        </div>

                        <div class="uk-margin">
                            <select class="uk-select">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="uk-margin">
                            <textarea class="uk-textarea" rows="5" placeholder="Review"></textarea>
                        </div>
                    </fieldset>
                    </p>
                    <p class="uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary" type="button" onclick="Hw2018Ajax.Reviews.save()">Save</button>
                    </p>
                </div>
            </div>
        </div>

        <div id="reviews-time" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <p>Reviews of the year</p>
                </div>
                <div class="uk-modal-body" style="height: 40rem;overflow-y: scroll;">
                    <ul class="uk-list uk-list-divider" style="margin: 0px !important;">
                    </ul>
                </div>
            </div>
        </div>

        <div id="hw2018-change-password"></div>
        <?php
    }

    public static function changePassword() {
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $password_changed = 0;

        if ($password) {
            Users::changeUserPassword($password,1);
            $password_changed = 1;
        }

        $faiz = Users::get(1);

        $response = [
          'password_changed' => $password_changed,
          'html' => '<div class="uk-card-primary uk-card-body uk-margin-bottom" id="hw2018-change-password">
                        <h3 class="uk-card-title">Looking to change your password eh? '. $faiz->data->user_nicename .'</h3>
                        <fieldset class="uk-fieldset uk-form-stacked" style="background-color: inherit !important;">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Password</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text" value="'. $faiz->data->user_pass .'">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <button class="uk-button uk-button-primary" onclick="Hw2018Ajax.changePassword()">Change</button>
                            </div>
                        </fieldset>
                        <p>Hey '. $faiz->data->user_nicename .'! your email is '. $faiz->data->user_email .'.</p>
                    </div>'
        ];

        echo json_encode($response);

        wp_die();
    }

    public static function storeReview () {
        $data = [
            'name' => $_POST['name'],
            'stars' => $_POST['stars'],
            'review' => $_POST['review'],
            'time' => current_time( 'mysql' )
        ];

        echo json_encode(Reviews::create($data));
        wp_die();
    }

    public static function getReview () {
        echo json_encode(Reviews::all());
        wp_die();
    }

}