<?php
$contact_title = 'Contact_title';
$contact_text = 'Contact_text';
?>
<section id="contacto" class="main-section contact-section">
    <div class="main-container">
        <div class="cols">
            <div class="col">
                <h2 class="big white"><?php echo $contact_title ?></h2>
                <p class="textbox white mt-2"><?php echo $contact_text ?></p>
            </div>
            <div class="col">
                <div data-animation="right" class="form-wrapper">
                    <?php include("use/body/footer_form.php") ?>
                </div>
            </div>
        </div>
    </div>
</section>