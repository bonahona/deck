<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pages</h3>
    </div>
    <div class="panel-body">
        <?php if(count($LocalUser->UserPages) == 0):?>
            <span class="light-grey">Inga sidor</span>
        <?php else:?>
            <?php foreach($LocalUser->UserPages->Where(array('IsDeleted' => 0)) as $userPage):?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if($CurrentUserPage != null && $CurrentUserPage->Id == $userPage->Id):?>
                            <b><?php echo $userPage->PageTitle;?></b>
                                <?php if(!$userPage->IsActive):?>
                                    <span class="light-grey">(Inactive)</span>
                                <?php endif;?>
                            <a href="<?php echo '/settings/deleteuserpage/' . $userPage->Id;?>" class="btn btn-md btn-default pull-right modal-confirmation"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php else:?>
                            <a href="/Settings/Edit/<?php echo $userPage->Id;?>"><?php echo $userPage->PageTitle;?></a>
                            <?php if(!$userPage->IsActive):?>
                                <span class="light-grey">(Inactive)</span>
                            <?php endif;?>
                            <a href="<?php echo '/settings/deleteuserpage/' . $userPage->Id . '/' . $CurrentUserPage->Id;?>" class="btn btn-md btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-md btn-default col-lg-12" data-toggle="modal" data-target="#create-page">Create page</button>
            </div>
        </div>
    </div>
</div>