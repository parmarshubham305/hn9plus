@extends('admin.layouts.layout')
@section('content')
<section class="content-header">
     <h1>
		Projects 
		<small>lists</small>
     </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li><a href="#">skills</a></li>
        <li class="active">Data tables</li>
    </ol> -->
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
        	<div class="box box-info">
            <div class="box-header">
              	<p style="text-align: right">
	                <a href="javascript:void(0);" id="refresh" onclick="reload()" class="btn btn-info icon-btn p-5">Refresh</a>
	                <a href="javascript:void(0);" id="delete" onclick="" class="btn btn-danger icon-btn p-5 hidden">Delete</a>
	            </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
	                <tr class="btn-primary">
	                  <th><div class="animated-checkbox"><label><input type="checkbox" class="selectall" /><span class="label-text"></span></label></div></th>
	                  <th>User</th>
					  <th>Manager</th>
	                  <th>Type</th>
	                  <th>Title</th>
	                  <th>Timeline</th>
	                  <th>Payment Type</th>
	                  <th>Action</th>
	                </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
	                <tr class="btn-primary">
	                  <th><div class="animated-checkbox"><label><input type="checkbox" class="selectall" /><span class="label-text"></span></label></div></th>
	                  <th>User</th>
					  <th>Manager</th>
					  <th>Type</th>
	                  <th>Title</th>
	                  <th>Timeline</th>
	                  <th>Payment Type</th>
	                  <th>Action</th>
	                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            @include('admin.layouts.overlay')
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
@stop

@section('css')
{{  Html::style('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
{{  Html::style('backend/plugins/sweetalert/sweetalert.css') }}
@stop

@section('js')
@include('admin.layouts.alert')
{{ Html::script('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}
{{ Html::script('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
{{ Html::script('backend/plugins/sweetalert/sweetalert.min.js') }}
{{ Html::script('backend/js/fnStandingRedraw.js') }}
{{ Html::script('backend/js/delete_script.js') }}

	<script type="text/javascript">

	var title = "Are you sure to delete this record?";
	var text = "You will not be able to recover this record";
	var type = "warning";
	var delete_path = "{{ URL::route('admin.projects.delete') }}";
	var token = "{{ csrf_token() }}";

	$('#delete').click(function(){
	    var delete_id = $('#dataTable tbody input[type=checkbox]:checked');
	    checkLength(delete_id);
	});

	function filterWithSite(siteId) {
		$('#dataTable').DataTable().ajax.reload( null, false );
	}

	$(function()
	{
	    var dataTable = $('#dataTable').dataTable({
	        "bProcessing": false,
	        "bServerSide": true,
	        "autoWidth": true,
	        "bSearching": true,
	        "aaSorting": [
	            [1, "asc"]
	        ],
	        "sAjaxSource": "{{ URL::route('admin.projects.index') }}",
	        "fnServerParams": function ( aoData ) {
	            aoData.push({ "name": "act", "value": "fetch" });
	            server_params = aoData;
	        },
	        "aoColumns": [
	        {
	            mData: "id",
	            bSortable: false,
	            bVisible: true,
	            sWidth: "5%",
	            sClass: 'text-center',
	            mRender: function(v, t, o)
	            {
	                return '<div class="animated-checkbox">'
	                            + '<label>'
	                            +' <input type="checkbox" id="chk_'+v+'" name="id[]" value="'+v+'"/>'
	                            +'<span class="label-text"></span></label></div>';
	            }
	        },
	        { "mData": "user",sWidth: "10%",bSortable: true,},
			{ "mData": "manager",sWidth: "10%",bSortable: true,},
	        { "mData": "is_project",sWidth: "10%",bSortable: true,
				mRender: function(v, t, o) {
	                var html = o['is_project'] == '0' ? 'Quote ' +'( '+o['quote_type'] + ' )' : 'Project';
	                return html;
	            }
			},
	        { "mData": "title",sWidth: "10%",bSortable: true,},
	        { "mData": "timeline",sWidth: "10%",bSortable: true,},
	        { "mData": "payment_type",sWidth: "10%",bSortable: true,},
	        {
	            mData: null,
	            bSortable: false,
	            sWidth: "10%",
	            sClass: "text-center",
	            mRender: function(v, t, o) {
	                var showUrl = '{{ route("admin.projects.show", ":id") }}';
            		showUrl = showUrl.replace(':id',o['id']);

	                // var string_obj = JSON.stringify(o);

	                var act_html = "<div class='btn-group'>"
	                                // +"<a class='btn btn-primary' href='"+editUrl+"' data-toggle='tooltip' title='Edit' data-placement='top' class='p-5'><i class='fa fa-pencil'></i></a> "
	                                +"<a class='btn btn-primary' href='" +  showUrl + "' data-toggle='tooltip' title='View' data-placement='top'><i class='glyphicon glyphicon-eye-open'></i></a> "
	                                +" <a class='btn btn-danger' href='javascript:void(0)' onclick=\"deleteRecord('"+delete_path+"','"+title+"','"+text+"','"+token+"','"+type+"',"+o['id']+")\" data-toggle='tooltip' title='Delete' data-placement='top'><i class='fa fa-trash-o'></i></a>"
	                                +"</div>"
	                return act_html;
	            }
	        },
	        ],
	        fnPreDrawCallback : function() {
	            $(".overlay").show();
	        },
	        fnDrawCallback : function (oSettings) {
	           $('.overlay').hide();
	        }
	    });
	    dataTable.fnSetFilteringDelay(1000);
	});

	$(".selectall").on('click', function(){
	    var is_checked = $(this).is(':checked');
	    if(is_checked) {
	    	$('#delete').removeClass('hidden');
	    } else {
	    	$('#delete').addClass('hidden');
	    }
	    $(this).closest('table').find('tbody tr td:first-child input[type=checkbox]').prop('checked',is_checked);
	    $(".selectall").prop('checked',is_checked);
	});
	</script>
@stop