/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            $('#example-datatable').dataTable({
                "aoColumnDefs": [ { "bSortable": true, "aTargets": [  ] } ],
				"iDisplayLength": 10,
				"order": [ 4, 'desc' ],
                "aLengthMenu": [[10, 20, 50,100,250, -1], [10, 20, 50,100,250, "All"]]
            });
			$('#example-datatable5').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0 ] } ],
				"iDisplayLength": 10,
				"order": [ 4, 'desc' ],
                "aLengthMenu": [[10, 20, 50,100,250, -1], [10, 20, 50,100,250, "All"]]
            });
			
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();