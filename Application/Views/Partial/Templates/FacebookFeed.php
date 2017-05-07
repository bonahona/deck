<?php if($Element == null):?>
    <script id="facebook-feed-template" type="text/x-handlebars-template">
        <div id="lane-{{laneId}}" class="panel panel-default settings-lane">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <span class="{{icon}}"></span>
                    <b>{{title}}</b>
                </h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <p>{{description}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" class="btn btn-medium btn-danger btn-remove pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </script>
<?php else:?>
    <div id="lane-<?php echo $Id;?>" class="panel panel-default settings-lane">
        <div class="panel-heading">
            <h2 class="panel-title">
                <span class="<?php echo $Element['Icon'];?>"></span>
                <b><?php echo $Element['Title'];?></b>
            </h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <p><?php echo $Element['Description'];?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="btn btn-medium btn-danger btn-remove pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
