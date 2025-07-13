<?php
$image = get_sub_field('twi_image');
$twi_heading = get_sub_field('twi_heading');
$twi_cta = get_sub_field('twi_cta');
$twi_content = get_sub_field('twi_content');
$size = 'medium_large';

//OPTIONS
$reverse = get_sub_field('twi_reverse');//bool
$rev_respon = get_sub_field('twi_reverse_mob');//bool
?>

<section class="text-image-block">
    <div class="container">
        <div class="row <?= ($reverse) ? 'flex-row-reverse' : ''; ?> <?= ($rev_respon) ? 'respon-reverse' : ''; ?>">
            <div class="col-lg-6">
                <div class="tib-image-wrapper">
                    <?= wp_get_attachment_image( $image, $size ); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tib-content-wrapper">
                    <?php if ($twi_heading) : ?>
                        <h2 class="head-2"><?= $twi_heading ?></h2>
                    <?php endif; ?>
                    <div><?= $twi_content ?></div>
                    <?php if ( $twi_cta ) : ?>
                        <a href="<?= esc_url( $twi_cta['url'] ); ?>" class="btn" target="<?= $twi_cta['target'] ? $twi_cta['target'] : '_self' ?>">
                            <?= $twi_cta['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>