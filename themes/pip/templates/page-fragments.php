<?php
    if (have_rows('elements')) {
        while (have_rows('elements')) {
            the_row();

            ?>
            <a name="<?php echo get_sub_field('anchor'); ?>"></a>
            <?php

            get_template_part('templates/fragments/fragment', get_sub_field('type'));
        }
    }
