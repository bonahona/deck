<?php foreach(array_keys($LoadedTemplateNames) as $loadedTemplateVariablesName):?>
var <?php echo $loadedTemplateVariablesName;?> = null;
function get<?php echo ucfirst($loadedTemplateVariablesName);?>(){
    return <?php echo $loadedTemplateVariablesName;?>
}
<?php endforeach;?>

function startFeed(){
    <?php foreach($LoadedFeeds as $loadedFeed):?>
    <?php echo $loadedFeed['JavascriptFunctionName'];?>();
    <?php endforeach;?>
}

function setupHandleBars(){
    <?php foreach($LoadedTemplateNames as $templateVariableName => $loadedTemplateName):?>
    var <?php echo $templateVariableName;?>Source = $('#<?php echo $loadedTemplateName;?>').html();
    <?php echo $templateVariableName;?> = Handlebars.compile(<?php echo $templateVariableName;?>Source);
    <?php endforeach;?>
}

<?php foreach($LoadedFeeds as $loadedFeed):?>
function <?php echo $loadedFeed['JavascriptFunctionName'];?>() {
    $.get(
        '<?php echo $loadedFeed['DataSourceUrl'];?>',
        {},
        function(data){
            if(data.success == 1){
                <?php echo $loadedFeed['CallbackFunction'];?>(data.data.events, <?php echo $loadedFeed['TemplateVariableName'];?>);
            }
        }
    )
}
<?php endforeach;?>
