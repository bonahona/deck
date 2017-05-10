<div class="row">
    <div class="col-lg-2">
        <?php echo $this->PartialView('Elements/Admin/SideBar');?>
    </div>
    <div class="col-lg-10">
        <h1 class="title">Feed types</h1>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($FeedTypes as $feedType):?>
                            <tr>
                                <td><?php echo $feedType->Id;?></td>
                                <td><?php echo $feedType->Title;?></td>
                                <td><?php echo $feedType->Description;?></td>
                                <td>
                                    <a href="<?php echo '/admin/clonefeedtype/' . $feedType->Id;?>" class="btn btn-medium btn-default"><span class="glyphicon glyphicon-copy"></span></a>
                                    <a href="<?php echo '/admin/editfeedtype/' . $feedType->Id;?>" class="btn btn-medium btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="<?php echo '/admin/deletefeedtype/' . $feedType->Id;?>" class="btn btn-medium btn-default"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <a href="/admin/createfeedtype" class="btn btn-md btn-default">Create</a>
            </div>
        </div>
    </div>
</div>