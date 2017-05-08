var facebookFeedTemplate = null;
var emptyLaneTemplate = null;

$(document).ready(function(){

    setupHandleBars();

    $('#data-sources .draggable').draggable({
        helper: 'clone',
        cursor: 'move',
        revert: true
    });

    $('.droppable').droppable({
        drop: function(event, ui){
            var feedId = ui.draggable.attr('data-id');
            var laneId = $(this).attr('id');
            addToLane($(this),feedId, laneId);
        }
    });

    $('#settings-lanes .btn-remove').on('click', function(){
        var element = $(this).closest('.settings-lane');
        var laneId = element.attr('id');
        removeFromLane(element, laneId);
    });
});

function setupHandleBars(){
    var facebookFeedSource = $('#facebook-feed-template').html();
    facebookFeedTemplate = Handlebars.compile(facebookFeedSource);

    var emptyLaneSource = $('#empty-lane-template').html();
    emptyLaneTemplate = Handlebars.compile(emptyLaneSource);
}

function addToLane(element, feedId, laneId){

    var pageId = $('#settings').attr('data-page-id');
    $.post(
        '/settings/addtolane',
        {
            "feedId": feedId,
            "laneId": laneId,
            "pageId": pageId,
            'width': 3
        },
        function(data){
            if(data.success == 1){
                var htmlElement = $.parseHTML(facebookFeedTemplate(data.data));
                element.after(htmlElement);
                element.remove();

                $(htmlElement).find('.btn-remove').on('click', function(){
                    removeFromLane($(htmlElement));
                });
            }else{
                alert(data.message);
            }
        }
    )
}

function removeFromLane(element, laneId){
    var pageId  = $('#settings').attr('data-page-id');
    $.post(
        '/settings/removefromlane',
        {
            "pageId": pageId,
            "laneId": laneId
        },
        function(data){
            if(data.success == 1){
                var htmlElement = $.parseHTML(emptyLaneTemplate({id:laneId}));
                element.after(htmlElement);
                element.remove();

                $(htmlElement).droppable({
                    drop: function(event, ui){
                        var feedId = ui.draggable.attr('data-id');
                        var laneId = $(this).attr('id');
                        addToLane($(this),feedId, laneId);
                    }
                });
            }else{
                alert(data.message);
            }
        }
    )
}
