var timers = [];

/**
 * show add task form
 */
$( ".add-card" ).click(function() {
    $(this).addClass('hidden');
    $(this).next().removeClass('hidden');
    $(this).next().find('textarea').val('').focus();
});

/**
 * close add task form
 */
$( ".close-button" ).click(function() {
    $(this).parents('.add-card-form').addClass('hidden');
    $(this).parents('.add-card-form').prev().removeClass('hidden');
});

/**
 * submit add card
 */
$( ".add-card-form form" ).submit(function( event ) {
    event.preventDefault();

    var title = $(this).find('textarea').val();
    var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
    var data = {_token: CSRF_TOKEN, card_title:title, project_id: projectId};

    var _self = this;

    $.post('/addcard', data, function(data){
        var itemNum = [];
        $( ".item-number span" ).each(function( index ) {
            itemNum.push($(_self).html());
        });

        card_members[data.new_id] = [];
        pausedtimers[data.new_id] = 0;

        var textVal = $(_self).find('textarea').val();
        var insertTarget = $(_self).data('insert');
        $('#'+insertTarget).append('<div id="card-number-' + data.new_id + '" data-column="Todo" class="list-item clearfix"><div class="item-body"><p class="item-title">'+textVal+'</p><div class="clearfix"><div class="title-panel"><span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span><span class="number">0</span><span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span><span class="number">0</span><span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="number">0</span></div><div class= "item-number pull-right">#<span>'+ data.new_id +'</span></div></div><div class="clearfix"><div class="members-list pull-right clearfix"></div></div></div><p class="start-card" data-target="doing-lists">Start</p></div><div id="card-members-' + data.new_id + '" class="hidden"></div><div id="card-comments-' + data.new_id +'" class="hidden"></div>');
        hideForm($(_self).data('target'));
    }, 'json');
});

/**
 * open modal
 */
$(document).on("click",".list-item .item-body",function() {
    var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
    $('.backlog-button').hide();
    if ( is_manager && $('#card-number-' + card_id).attr('data-column') == 'Done' ) {
        $('.backlog-button').show();
    }

    var due_date = $('#card-number-' + card_id).attr('data-due');

    $('#datetimepicker1').datetimepicker({
        value: due_date,
        format: 'm.d.Y H:i:s'
    });

    $('#members-dropdown').attr('data-card-id', card_id);
    $('#members-dropdown .inputs').html('');
    $('#members-dropdown .inputs').append('<select id="members-select" multiple></select>');
    $('#members-dropdown .inputs select').html($('#all-members').html());
    $('select').val(card_members[card_id]).material_select();

    $('#card-display .members-list.members-dp').html($('#card-members-' + card_id).html());

    // add comments
    $('#card-display .comments-list').html( $('#card-comments-' + card_id).html() );

    $('#card-display').modal('show');
    var number = $(this).find('.item-number span').html();
    var title = $(this).find('.item-title').html();

    $('#card-display .card-number-modal').html('#'+number);
    $('#card-display .card-title-modal').html(title);
});

/**
 * move card to Doing
 */
$(document).on("click",".start-card",function() {
    var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
    var _token = $('meta[name="_token"]').attr('content');

    $.post('/changecolumn', {card_id: card_id, column: 'Doing', _token: _token}, function(data){}, 'json');

    var html = $(this).parent().find('.item-body').html();
    var target = $(this).data('target');
    $(this).parent().remove();
    $('#'+target).append('<div id="card-number-' + card_id + '" data-column="Doing" class="list-item clearfix"><div class="item-body">'+html+'</div><p class="status-card"><span class="pause pull-left double-status" data-target="todo-lists">Pause</span><span class="timer"><i class="glyphicon-time glyphicon"></i></span><span class="done pull-right double-status" data-target="done-lists">Done</span></p></div>');

    // start timer
    timers[card_id] = new newtimer($('#card-number-' + card_id + ' .timer'), pausedtimers[card_id]);
});

/**
 * move card to Todo or Done
 */
$(document).on("click",".double-status",function() {
    var html = $(this).parents('.list-item').find('.item-body').html();
    var target = $(this).data('target');
    var cardTarget = ''
    if(target == 'todo-lists') {
        cardTarget = '<p class="start-card" data-target="doing-lists">Start</p>';
        var _column = 'Todo';
    } else {
        cardTarget = '<div class="status-holder"><p class="completed pending">Waiting for feedback</p><div class="change-status hidden"><p>Set as Completed</p></div></div>';
        var _column = 'Done';
    }

    var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
    var _token = $('meta[name="_token"]').attr('content');

    // stop timer
    pausedtimers[card_id] = timers[card_id].getTime();
    timers[card_id].stop();

    $.post('/changecolumn', {card_id: card_id, column: _column, _token: _token}, function(data){}, 'json');

    $(this).parents('.list-item').remove();
    $('#'+target).append('<div id="card-number-' + card_id + '" data-column="' + _column + '" class="list-item clearfix"><div class="item-body">'+html+'</div>'+cardTarget+'</div>');
});

/**
 * move card to Backlog
 */
$(document).on('click', '#to-backlog-btn', function(){
    var _token = $('meta[name="_token"]').attr('content');
    var card_id = $('#members-dropdown').attr('data-card-id');
    $.post('/changecolumn', {card_id: card_id, column: 'Backlog', _token: _token}, function(data){}, 'json');

    $('#card-display').modal('hide');
    var html = $('#card-number-' + card_id + ' .item-body').html();
    $('#card-number-' + card_id).remove();
    $('#backlog-lists').append('<div id="card-number-' + card_id + '" data-column="Backlog" class="list-item clearfix"><div class="item-body">'+html+'</div></div>');

});

/**
 * set new date due
 */
$(document).on('change', '#datetimepicker1', function(){
    var _token = $('meta[name="_token"]').attr('content');
    var card_id = $('#members-dropdown').attr('data-card-id');
    $.post('/changedue', {card_id: card_id, due: $(this).val(), _token: _token}, function(data){}, 'json');
    $('#card-number-' + card_id).attr('data-due', $(this).val());
});

/**
 * set members to card
 */
$(document).on('change','#members-dropdown', function(){
    var _token = $('meta[name="_token"]').attr('content');
    var card_id = $('#members-dropdown').attr('data-card-id');
    var project_id = $('#members-dropdown').attr('data-project-id');
    card_members[card_id] = [];
    $('#members-dropdown .members-list').html('');
    $('#card-members-' + card_id).html('');

    var ids = $('#members-select').val();
    if (ids == null) {
        ids = [];
    } else {
        for (var i = 0; i < ids.length; i++) {
            card_members[card_id].push(ids[i]);
        }
    }

    var users = jQuery(this).find('input').val();
    users = users.split(',');

    for (var i = 0; i < users.length; i++) {
        var names = users[i];
        names = names.split(' ');
        var count = names.length;
        var fname = names[0].charAt(0);
        var lname = names[count - 1].charAt(0);
        if (fname == '') {
            if (undefined != names[1]) {
                fname = names[1].charAt(0);
            }
        }
        if(fname) {
            $('#members-dropdown .members-list').append('<span class="member" title="' + users[i] + '">' + fname + '</span>');
            $('#card-members-' + card_id).append('<span class="member" title="' + users[i] + '">' + fname + '</span>');
        }
    }

    $.post('/changemembers', {card_id: card_id, project_id: project_id, members: ids, _token: _token}, function(data){}, 'json');
});

jQuery(document).on('click','.status-holder .pending', function(){
    jQuery(this).parent().find('.change-status').removeClass('hidden');
});

jQuery(document).on('click','.status-holder .change-status p', function(){
    jQuery(this).parents('.status-holder').find('.completed.pending').removeClass('pending').html('Completed');
    jQuery(this).parent().addClass('hidden');
});

/**
 * add new comment
 */
$(document).on("click","#add-comment",function() {
    var _token = $('meta[name="_token"]').attr('content');
    var card_id = $('#members-dropdown').attr('data-card-id');

    var msg = $(this).parent().find('textarea').val();
    var user = $(this).parent().find('.members-list').html();

    $(this).parent().find('textarea').val('');
    if ('' != msg) {
        $.post('/addcommment', {card_id: card_id, comment: msg, _token: _token}, function(data){}, 'json');
        
        $('#card-display .comments-list').append('<div class="comment"><div class="members-list">' + user + '</div><p>' + msg + '</p></div>');
        $('#card-comments-' + card_id).append('<div class="comment"><div class="members-list">' + user + '</div><p>' + msg + '</p></div>');

        // count comments
        var count = parseInt($('#card-count-comments-' + card_id).html());
        count++;
        $('#card-count-comments-' + card_id).html(count);
    }
});

$(document).ready(function($) {
    $('select').material_select();
    $('.caret').html('');

    $('#card-display').on('shown.bs.modal', function() {
    });

    /**
     * start timers
     */
    $('.card-item').each(function(){
        if ('Doing' == $(this).attr('data-column')) {
            var thisId = $(this).attr('id');
            timers[$(this).attr('data-card-id')] = new newtimer($('#' + thisId + ' .timer'), $(this).attr('data-timer-start'));
        }
    });
});

function hideForm(id) {
    $('#'+id).addClass('hidden');
    $('#'+id).prev().removeClass('hidden');
}
