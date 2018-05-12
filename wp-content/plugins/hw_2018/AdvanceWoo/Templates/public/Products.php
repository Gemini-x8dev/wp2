<?php

class Products {

    public static function recentReviews ($tabs) {
        $tabs['hc2018_recentReviews'] = array(
            'title' 	=> __( 'Recent Reviews', 'woocommerce' ),
            'priority' 	=> 50,
            'callback' 	=> [self::class,'displayReviews']
        );

        return $tabs;
    }

    public static function displayReviews () {
        $reviews = Reviews::all();
        ?>
        <ul class="uk-list uk-list-divider" style="margin: 0px !important;height: 33rem;overflow-y: scroll;box-shadow: 0px 0px 1px 0px darkgrey;padding: 1rem;">
        <?php
        foreach ($reviews as $review){
            ?>
            <li>
             <div class="uk-card uk-card-default uk-card-body">
                     <div class="uk-card-badge"><?= self::stars($review->stars) ?>
                         </div>
                     <h3 class="uk-card-title"><?= $review->name ?></h3>
                     <p><?= $review->review ?></p>
                 </div>
            </li>
            <?php
        }
        ?>
        </ul>
        <?php
    }

    public static function stars ($s) {
        $stars = '';
        for($i=0;$i<intval($s);$i++){
            $stars .= '<span uk-icon="star">';
        }
      return $stars;
    }

}