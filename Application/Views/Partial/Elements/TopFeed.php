<?php if(count($TopMenuItems) > 0):?>
    <span class="navbar-brand light-grey">|</span>
    <?php foreach($TopMenuItems as $topMenuItem):?>
        <a class="navbar-brand light-grey" href="<?php echo $topMenuItem->GetLink();?>"><?php echo $topMenuItem->PageTitle;?>
            <?php if($topMenuItem->IsNotify == 1):?>
                <span class="badge"><?php echo $topMenuItem->GetNotificationCount();?></span>
            <?php endif;?>
        </a>
    <?php endforeach;?>
<?php endif;?>
