var n_div = '#notificationDiv';

/*********************************************************************************************
 ****Modal Call can be used everywhere just use the class name as "js-modal-call"****
 *********************************************************************************************/


$(document).on('click', '.js-modal-call', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    var data = {};

    var myModal = $('#js-modal').modal('show');
    loadModalContent(url, data, $(this), myModal);

});
function loadModalContent(url, data, element, myModal) {
    $.ajax({
        type: 'get',
        url: url,
        data: data,
        dataType: 'html',
        beforeSend: function () {
            myModal.find(".js-modal-content").html('<span class="glyphicon glyphicon-refresh spinning"></span> Loading...');
        },
        success: function (data) {
            var newHtml = myModal.find(".js-modal-content").html(data);
        },
        error: function () {
            myModal.find(".js-modal-content").html('<div class="loader"> Error </div>');
        }
    })
    return false;
}

function show_message(msg) {
    $(n_div).html(msg).show();
}
function hide_message(msg) {
    $(n_div).html(msg).fadeOut(5000);
}
function hide_message_fast(msg) {
    $(n_div).html(msg).fadeOut(1000);
}

$(document).on('submit','form',function(){
    $('input[type="submit"]').attr('disabled','disabled');
    $('input[type="submit"]').prop('value','Please wait ...');    
});


// $(document).ajaxStart(function () {$('#loadingDiv').show();});
// $(document).ajaxStop(function () {$('#loadingDiv').fadeOut('show');});



// js for grid load

$(document).on('click', '#ajax_pagination a', function (e) {
    e.preventDefault();
    if($(this).attr('href') == '#'){        
        return false;
    }else{
        var page = $(this).attr('href').replace(/[^0-9]/gi, '');
        var limit = $('#page_limit').val();        
        loadGrid(page, limit)
    }
        
});
$(document).on('click', '.grid_order_by', function (e) {
    e.preventDefault();    
    orderBy = $(this).data('value');
    gridOrderBy(orderBy);
});

$(document).on('keyup', '.grid_search', function (e) {
    e.preventDefault();
    filterGrid();
});

function initView(gridUrl, linkId){
    $('#' + linkId).addClass('active');
    window.gridUrl = gridUrl;    
    window.orderBy = 'created_at';    
    window.order = 'desc';
    loadGrid(1);    
}

function loadGrid(page, limit) {
    url = base_url + window.gridUrl;
    data = {};
    data['page'] = page;
    data['limit'] = limit;
    data['orderBy'] = window.orderBy;
    data['order'] = window.order;    
    $(".grid_search").each(function() {        
        name = $(this).attr('name');
        value = $(this).val();
        data[name] = value;
    });     
    
    $.ajax({
        type: "POST",
        cache: false,
        data:data,
        url: url,
        dataType: "html",
        success: function(response){
            $("#pagesDiv").html(response);
            
            $('.grid_order_by').removeClass('grid_order_by_asc').removeClass('grid_order_by_desc');            
            $(".grid_order_by").each(function() {
                if($(this).data('value') == window.orderBy){
                    if(window.order == 'asc'){
                        $(this).addClass('grid_order_by_asc');                        
                    }else{
                        $(this).addClass('grid_order_by_desc')
                    }
                    
                }
            });
//            hide_message_fast(response.msg);
        }
    });
}

function filterGrid(){
    var page = $('#current_page').val();
    var limit = $('#page_limit').val();    
    loadGrid(page, limit);
}

function gridOrderBy(orderBy){
    if(orderBy == window.orderBy){
        reverseOrder();
    }else{
        window.orderBy = orderBy;
        window.order = "asc";
    }
    filterGrid();
}

function reverseOrder(){
    if(window.order == "desc"){
        window.order = "asc";
    }else{
        window.order = "desc";
    }
}

//delete
$(document).on('click', '#confirm_delete', function (e) {
    e.preventDefault();
    var form = $("#form_confirm_delete");
    var url = $(form).attr('action');
    //alert(url);
    $.ajax({
        type : 'POST',
        data : {},
        url : url,
        dataType: 'json',
        start: parent.show_message('Deleting ...'),
        success: function (response) {
            if (response.status == 'success') {
                show_message(response.msg);
                var page = $('#current_page').val();    
                var limit = $('#page_limit').val();                
                loadGrid(page, limit);
                hide_message(response.msg);
                $('#js-modal').modal('hide');
            } else {
                show_message(response.msg);
                hide_message(response.msg);
            }
        },                 
    })
});
// end grid js