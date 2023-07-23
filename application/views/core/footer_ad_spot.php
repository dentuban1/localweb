<?php
    if( $this->options->get('footer-ad-status') ) { ?>
        <div class="text-center footer-ad mt-5">
            <?php echo $this->options->get('footer-ad-code'); ?>
        </div>
    <?php }