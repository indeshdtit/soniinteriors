(function($) {
    'use strict';
    $(document).ready(function() {
        // Data Table
        initTableWithSearch();
        
        // Delete Button
        $(".conf_btn").click(function(event) {
            if (window.confirm('Are you sure?'))
            {
                window.location.href = $(this).attr('data-location');
            }
        });
    });

    $('.panel-collapse label').on('click', function(e) {
        e.stopPropagation();
    });

    // Notification
    var notif_ele = $('div[data-notif-msg]');
    if (notif_ele.length > 0 && notif_ele.attr('data-notif-msg') != '')
    {
        $('.page-content-wrapper').pgNotification({
            message: notif_ele.attr('data-notif-msg'),
            type: notif_ele.attr('data-notif-cls'),
            position: 'top',
            timeout: 5000,
            style: 'bar'
        }).show();
    }

    feather.replace({
        'width': 16,
        'height': 16
    })
})(window.jQuery);

function initTableWithSearch()
{
    var table = $('#tableWithSearch');
    var settings = {
        "sDom": "<t><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "pageLength": 50,
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "iDisplayLength": 5
    };

    table.dataTable(settings);
    
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });
}

function delete_attachment(ele, attachment_id)
{
    if (window.confirm('Are you sure?'))
    {
        $.ajax({
            url: iBaseUrl + "/delete_attachment",
            dataType: "JSON",
            type: "POST",
            data: {'_token': $("input[name='_token']").val(), 'attachment_id': attachment_id},
            success: function(retJson) {
                if (retJson.status)
                {
                    $(ele).parent().remove();
                }
                else
                {
                    alert(retJson.msg);
                }
            }
        });
    }
}