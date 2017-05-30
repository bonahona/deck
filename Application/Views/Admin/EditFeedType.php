<div class="row">
    <div class="col-lg-2">
        <?php echo $this->PartialView('Elements/Admin/SideBar');?>
    </div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">Edit Feed Type</h1>
                <?php echo $this->Form->Start('FeedType');?>
                <?php echo $this->PartialView('Elements/Admin/EditFeedType', array('FeedType' => $FeedType));?>
                <?php echo $this->Form->End();?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">Meta data</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Form->Start('FeedTypeMetas', array('location' => '/admin/savefeedtypemetas/' . $FeedType->Id));?>
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-lg-4">DisplayName</th>
                                            <th class="col-lg-4">DataName</th>
                                            <th class="col-lg-2">IsOptional</th>
                                            <th class="col-lg-2">&nbsp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;?>
                                        <?php foreach($FeedType->FeedTypeMetas->Where(array('IsDeleted' => 0)) as $feedTypeMeta):?>
                                            <?php $count++;?>
                                            <tr>
                                                <?php echo $this->Form->Hidden('Id', array('value' => $feedTypeMeta->Id, 'index' => $count));?>
                                                <td>
                                                    <?php echo $this->Form->Input('DisplayName', array('value' => $feedTypeMeta->DisplayName, 'index' => $count, 'attributes' => array('class' => 'form-control', 'required' => 'true')));?>
                                                </td>
                                                <td>
                                                    <?php echo $this->Form->Input('DataName', array('value' => $feedTypeMeta->DataName, 'index' => $count, 'attributes' => array('class' => 'form-control', 'required' => 'true')));?>
                                                <td>
                                                    <?php echo $this->Form->Bool('IsOptional', array('value' => $feedTypeMeta->IsOptional, 'index' => $count, 'attributes' => array('class' => 'form-control')));?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo '/admin/deletefeedtypemeta/' . $feedTypeMeta->Id;?>" class="btn btn-md btn-default"><span class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <?php echo $this->Form->End();?>
                    </div>
                </div>
                <div class="row margin-top">
                    <div class="col-lg-12">
                        <a href="<?php echo '/admin/addfeedtypemetadata/' . $FeedType->Id;?>" class="btn btn-md btn-primary">Add Meta data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>