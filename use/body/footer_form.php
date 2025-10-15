<?php
    $formName = 'FooterForm';
    $webhookURL = 'https://hooks.zapier.com/hooks/catch/11442191/u55fp4l/';
    $redirectURL = '/gracias';
?>

<form id="<?php echo $formName; ?>" class="main-form" action="#">
    <?php include("use/body/form_inputs.php") ?>
</form>

<div id="messageError" class="form-error-message">
    Algo salió mal... por favor, intenta de nuevo más tarde.
</div>

<?php include("use/body/form.js.php") ?>