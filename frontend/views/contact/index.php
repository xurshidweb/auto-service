<?

?>

<div role="main" class="main">
    <?= $this->render('_contact-header'); ?>

    <?= $this->render('_contact-basic'); ?>

    <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
    <div class="position-relative appear-animation w-100" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.4825324807907!2d71.74977981524775!3d40.37599696603987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38bb9b465410e38b%3A0x9c5b3c4e6c3624b!2sFergana%20International%20Airport!5e0!3m2!1sru!2s!4v1657644776259!5m2!1sru!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <?= $this->render('@frontend/views/partials/brand-images'); ?>

</div>