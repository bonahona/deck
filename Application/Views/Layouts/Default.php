<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->Html->Favicon('fyrvall-favicon.png');?>

    <title><?php echo $title;?></title>

    <?php echo $this->Html->Css('bootstrap.min.css');?>
    <?php echo $this->Html->Css('dashboard.css');?>
    <?php echo $this->Html->Css('font-awesome.css');?>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top dark-grey">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand light-grey" href="/">Deck</a>
        </div>
        <?php if($this->IsLoggedIn()):?>
            <?php if(isset($TopMenuItems)):?>
                <?php echo $this->PartialView('Elements/TopFeed', array('TopMenuItems' => $TopMenuItems));?>
            <?php endif;?>
        <?php endif;?>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if($this->IsLoggedIn()):?>
                    <span class="navbar-brand light-grey"><?php echo $this->GetCurrentUser()->getName();?></span>
                    <a href="/Settings"><span class="navbar-brand light-grey glyphicon glyphicon-cog"></span></a>
                    <li><a class="light-grey" href="/User/Logout">Log out</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div id="file-container" class="col-sm-12 main">
            <?php if(isset($BreadCrumbs)):?>
                <?php echo $this->PartialView('Breadcrumbs', array('BreadCrumbs' => $BreadCrumbs));?>
            <?php endif;?>
            <?php echo $view;?>

            <div class="panel">
                <div class="panel-heading">
                    <h2 class="panel-title"></h2>
                </div>
                <div class="panel-body">
                    <?php foreach ($this->Logging->Cache->Fetch() as $logEntry):?>
                        <?php var_dump($logEntry);?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($this->ViewData['LoadedTemplatePaths']) && count($this->ViewData['LoadedTemplatePaths']) > 0):?>
    <?php foreach($this->ViewData['LoadedTemplatePaths'] as $loadedTemplatePath):?>
        <?php echo $this->PartialView($loadedTemplatePath);?>
    <?php endforeach;?>
<?php endif;?>

<?php foreach($this->JavascriptFiles as $javascriptFile):?>
    <?php echo $javascriptFile;?>
<?php endforeach;?>

</body>
</html>
