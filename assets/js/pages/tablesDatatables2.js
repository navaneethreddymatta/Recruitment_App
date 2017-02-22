/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables2 = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            /* Initialize Datatables */
            
			$('#example-datatable1').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatable2').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatable3').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatable4').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatable5').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 5,
                "aLengthMenu": [[5,10, 20, 30, -1], [5,10, 20, 30, "All"]]
            });
			$('#example-datatable6').dataTable({
                "aoColumnDefs": [ { "bSortable": false, "aTargets": [  ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30,40, -1], [10, 20, 30,40, "All"]]
            });
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('event','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable1_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getIncluded('statusDefinition');\"><i class=\"fa fa-plus\"></i> Include</button>").appendTo('#example-datatable2_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('email','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable3_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('people','');\"><i class=\"fa fa-plus\"></i> New</button>").appendTo('#example-datatable4_length');
			$("<button style='margin-left:10px' class=\"btn btn-alt btn-primary\" onclick=\"getSelected('statusNewDef','');\"><i class=\"fa fa-plus\"></i> New Round</button>").appendTo('#example-datatable5_length');
        }
    };
}();