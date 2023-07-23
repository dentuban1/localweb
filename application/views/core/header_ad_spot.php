<?php
    if( $this->options->get('header-ad-status') ) { ?>
        <div class="text-center header-ad mt-5">
            <?php echo $this->options->get('header-ad-code'); ?>
        </div>
    <?php }