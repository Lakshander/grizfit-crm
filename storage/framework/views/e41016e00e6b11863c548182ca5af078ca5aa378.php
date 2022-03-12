<?php $__env->startSection('CSS'); ?>
    <?php echo HTML::style('admin/global/plugins/datatables/datatables.min.css'); ?>

    <?php echo HTML::style('admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid"      >
        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo e(route('gym-admin.dashboard.index')); ?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Invoice</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class=" fa fa-file font-red"></i>
                                <span class="caption-subject font-red bold uppercase"> Invoices</span>
                            </div>

                            <div class="actions col-sm-2 col-xs-12">

                                <a href="<?php echo e(route('gym-admin.gym-invoice.create-invoice')); ?>" id="add_payment" class="btn dark"> Create <span class="hidden-xs">Invoice</span>
                                    <i class="fa fa-plus"></i>
                                </a>

                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column table-100" id="mem-payments">
                                <thead>
                                <tr>
                                    <th class="max-desktop" > Invoice # </th>
                                    <th class="desktop"> Client </th>
                                    <th class="desktop"> Date</th>
                                    <th class="desktop"> Total </th>
                                    <th class="desktop"> Generated By </th>
                                    <th class="desktop"> Items </th>
                                    <th class="desktop"> Actions</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>

    

    <div class="modal fade bs-modal-md in" id="gymPaymemtModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade bs-modal-md in" id="receiptModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php echo HTML::script('admin/global/scripts/datatable.js'); ?>

    <?php echo HTML::script('admin/pages/scripts/table-datatables-managed.js'); ?>

    <?php echo HTML::script('admin/global/plugins/datatables/datatables.min.js'); ?>

    <?php echo HTML::script('admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>

    <?php echo HTML::script('admin/global/plugins/bootbox/bootbox.min.js'); ?>

    <script>
        jQuery(document).ready(function() {
            load_dataTable();
        });
        function load_dataTable()
        {
            var table = $('#mem-payments');
            // begin first table
            table.dataTable({
                responsive: true,
                "sAjaxSource": "<?php echo e(route('gym-admin.gym-invoice.create')); ?>",
                bDestroy:true,
                "columns": [
                    {data: 'invoice_number', name: 'invoice_number'},
                    {data: 'client_name', name: 'client'},
                    {data: 'invoice_date', name: 'date'},
                    {data: 'total', name: 'total'},
                    {data: 'generated_by', name: 'generated_by'},
                    {data: 'items_column', name: 'items'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ records",
                    "infoEmpty": "No records found",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Show _MENU_",
                    "search": "Search:",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "previous":"Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number"
            });
        }

    </script>
    <script>
        $('#mem-payments').on('click','.remove-invoice',function(){
            var id = $(this).data('invoice-id');
            bootbox.confirm({
                message: "Do you want to delete this invoice?",
                buttons: {
                    confirm: {
                        label: "Yes",
                        className: "btn-primary"
                    }
                },
                callback: function(result){
                    if(result){

                        var url = '<?php echo e(route('gym-admin.gym-invoice.destroy',':id')); ?>';
                        url = url.replace(':id',id);

                        $.easyAjax({
                            url: url,
                            type: "DELETE",
                            data: {id: id,_token: '<?php echo e(csrf_token()); ?>'},
                            success: function(){
                                load_dataTable();
                            }
                        });
                    }
                    else {
                        console.log('cancel');
                    }
                }
            })
        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gym-merchant.gymbasic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>