<?php /* @var $this Controller*/?>

<div class="row">
    <div class="col-lg-2">
        <?php echo $this->PartialView('Elements/SettingsSidebar', array('LocalUser' => $LocalUser, 'CurrentUserPage' => (isset($UserPage) ? $UserPage : null)));?>
    </div>

    <div id="settings" class="col-lg-10" data-page-id="<?php echo $UserPage->Id;?>">
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            User page: <b><?php echo $UserPage->PageTitle;?></b>
                            <?php if($UserPage->IsActive == 0):?>
                                <span class="panel-title light-grey">(Inactive)</span>
                            <?php endif;?>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Form->Start('UserPage');?>
                        <?php echo $this->Form->Hidden('Id');?>
                        <div class="row form-group form-inline">
                            <label class="col-lg-2">Page Title</label>
                            <?php echo $this->Form->Input('PageTitle', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true', 'style' => 'width:82%')));?>
                        </div>
                        <div class="row form-group form-inline">
                            <label class="col-lg-2">Navigation name</label>
                            <?php echo $this->Form->Input('NavigationName', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true', 'style' => 'width:82%')));?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">Status</h2>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <label>
                                                    <?php echo $this->Form->Bool('IsActive', array('attributes' => array('class' => 'form-control')));?>
                                                    Active
                                                </label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <label>
                                                    <?php echo $this->Form->Bool('IsNotify', array('attributes' => array('class' => 'form-control')));?>
                                                    Use notification
                                                </label>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                <label>
                                                    <?php echo $this->Form->Bool('ShowInMenu', array('attributes' => array('class' => 'form-control')));?>
                                                    Show in the menu
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=""></div>
                        <?php echo $this->Form->Submit('Save', array('attributes' => array('class' => 'btn btn-medium btn-default')));?>
                        <?php echo $this->Form->End();?>
                    </div>
                </div>
                <div id="settings-lanes" class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><b>Lanes</b></h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php foreach($LaneFeeds as $id => $laneFeed):?>
                                <div class="col-lg-3">
                                    <?php if($laneFeed == null):?>
                                        <?php echo $this->PartialView('Templates/EmptyLane', array('Id' => $id, 'Element' => $laneFeed));?>
                                    <?php else:?>
                                        <?php echo $this->PartialView('Templates/FacebookFeed', array('Id' => $id, 'Element' => $laneFeed));?>
                                    <?php endif;?>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            <b>Sources</b>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->PartialView('Elements/DataFeedTypes', array('FeedTypes' => $FeedTypes));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->PartialView('Templates/FacebookFeed', array('Id' => null, 'Element' => null));?>
<?php echo $this->PartialView('Templates/EmptyLane', array('Id' => null, 'Element' => null));?>