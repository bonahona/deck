<?php /* @var $this Controller*/?>

<div class="row">
    <div class="col-lg-3">
        <?php echo $this->PartialView('Elements/SettingsSidebar', array('LocalUser' => $LocalUser));?>
    </div>
</div>

<?php echo $this->PartialView('Modals/CreatePage', array('UserPage' => $this->Models->UserPage->Create()));?>