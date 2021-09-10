$(function () {

    // general settings for modal loading
    $.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner =
        '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' +
        '<div class="progress progress-striped active">' +
        '<div class="progress-bar bg-grey-300" style="width: 100%;"></div>' +
        '</div>' +
        '</div>';

    $.fn.modalmanager.defaults.resize = true;

    // init variable
    var _tn = $('meta[name="_tn"]').attr('content');
    var origin = window.location.origin;
    var table = $('#data-users');

    // Table setup
    // ------------------------------
    // Setting datatable options
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        responsive: true,
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip><r>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                first: 'First',
                last: 'Last',
                next: '&rarr;',
                previous: '&larr;',
            },
        },
        drawCallback: function () {
            $(this)
                .find('tbody tr')
                .slice(-3)
                .find('.dropdown, .btn-group')
                .addClass('dropup');
        },
        preDrawCallback: function () {
            $(this)
                .find('tbody tr')
                .slice(-3)
                .find('.dropdown, .btn-group')
                .removeClass('dropup');
        },
    });

    // begin datatable user
    var TableEmployee = table.DataTable({
        processing: true,
        language: {
            processing: 'Please wait..'
        },
        serverSide: true,
        ajax: {
            url: origin + '/user/listJson',
            error: function (xhr) {
                // hide footer bugs
                $('.footer').hide();

                // popup error
                swal({
                    title: "<span style='color:#ef5350'>" + xhr.status + ' ' + xhr.statusText + '</span>',
                    text: xhr.responseJSON.error.description,
                    confirmButtonColor: '#ef5350',
                    type: 'error',
                    html: true
                },
                function (isConfirm) {
                    if (isConfirm) {

                        // scroll to top
                        window.scrollTo(0, 0);

                        // reload pages
                        location.reload();
                        return false;
                    }
                });
            }

            
        },
        columns: [
            {
                data: 'id'
            },
            {
                data: 'username'
            },
            {
                data: 'display_name'
            },
            {
                data: 'email'
            },
            {
                data: 'groups'
            },
            {
                data: 'active'
            },
            {
                data: 'action'
            }
        ],
        columnDefs: [
            {
                targets: [0],
                visible: false,
                orderable: false,
                searchable: false
            },
            {
                targets: [4],
                render: function (data) {
                    return '<span class="label label-flat border-grey text-grey-600">' + data + '</span>';
                }
            },
            {
                targets: [5],
                fnCreatedCell: function (td) {
                    $(td).addClass('text-center');
                },
                orderable: false
            },
            {
                targets: [6],
                fnCreatedCell: function (td) {
                    $(td).addClass('text-center');
                },
                
                orderable: false
            }
        ],
        order: [1, 'ASC']
    });

    // External table additions
    // ------------------------------
    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr(
        'placeholder',
        'Type to search..'
    );

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto',
    });

    // edit user
    $('#data-users').on('click', "a.link-edit", function (e) {
        e.preventDefault();
        var data_url = $(this).attr('data-href');
        console.log(data_url);
        var selector = '#form-edit-user';

        $('body').modalmanager('loading');

        setTimeout(function () {
            FormAjax(data_url, selector);
        }, 500);
    });

    // reload button datatable
    $('.icons-list').on('click', 'a#data-reload', function (e) {
        e.preventDefault();
        // reload datatable
        TableEmployee.ajax.reload(null, false);
    });

});