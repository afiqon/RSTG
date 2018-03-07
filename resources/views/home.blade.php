@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



                <div class="panel-body">
                    <div class="row" id="thumbnails_container">      
                <div class="col-md-12 col-md-offset-0">

                <!-- INSTRUCTION -->
                  <div style="width: 100%;" class="panel-group" >
                    <div class="panel">
                      <div class="panel-heading bg-navy" >
                        <h4 class="panel-title" style="color:white;">
                          <a data-toggle="collapse" href="#collapse1">Statistics</a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                             <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                  $(document).ready(function(){
                    $('[data-toggle="popover"]').popover();   
                  });
                  </script>
                  </div></div>  
            
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      @include('flash::message')
                   <br>
                       <button type="button" class="btn btn-primary pull-right" onclick="modalAdd();">
                                    Add Comment
                                </button> 
                                <button type="button" class="btn btn-primary pull-right" onclick="checkbox();">
                                   Submit
                                </button>
                            </div>
                            <ol>
  <li>List item 1</li>
  <li>List item 2</li>
  <li>List item 3</li>
</ol>

                </div>
           
                  <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-primary">
                <div class="panel-heading">List of comments</div>

                <div class="panel-body">
                  <table class="table table-bordered" id="myTable" >
            <thead class="bg-navy" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:50%;"><center>Author</center></th>
             <th  style="width:20%;"><center>Description</center></th>
              <th  style="width:20%;"><center>Categorie</center></th>
             <th  style="width:10%;"><center>Date Created</center></th>
             <th  style="width:10%;"><center>Last Updated</center></th>
            <th style="width:20%;"><center>Action</center></th>
            </thead>
            </table>
                            </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->

    </div>
</div>
 <div class="modal modal-default fade" id="addApplication" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
       <!--  Form -->
        {!!Form::open(['role'=>'form','route'=>'addComment']) !!}
            <div class="modal-header btn-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add new comment</h4>
            </div>
            <div class="modal-body">
              
                  <div class="form-group">
                    {!! Form::label('nama', 'Author *', ['class' => 'control-label'])!!}
                    <!-- <div class="col-sm-10"> -->
                      {!! Form::text('nama',null, array('class'=>'form-control','placeholder'=>'Enter your name','required')) !!}
                    <!-- </div> -->
                  </div>
                    <div class="form-group">
                {!! Form::label('note', 'Description', ['class' => 'control-label'])!!}

                {!! Form::textarea('note',null, array('rows'=>'5','style'=>'width:100%')) !!}
              </div>
       
             <select class="form-control m-bot15" name="categorie">
             @foreach($cat as $categorie)
                       
  <option value="{{$categorie->id}}">{{$categorie->name}}</option>


                @endforeach   
                </select>     
                  <div class="form-group">

                      <p><b>Note: </b>Label marked * compulsory.</p>

                  </div>                  
            </div>
            <!-- </div> -->
            <div class="modal-footer">
             <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-primary childButton" id='addScopeButton'><i class="fa fa-fw fa-check"></i> Submit</button>
            </div>
          {!!Form::close() !!}

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- modal View -->

    <div class="modal modal-default fade" id="modalView" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Comment</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Profile Image -->
              <div class="box box-info">
                <div class="box-body box-profile">
                  <h3 class="profile-username text-center view_type"></h3>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Author :</b></div>
                        <div class="col-md-9"><a class="author"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Description :</b></div>
                        <div class="col-md-9"><a class="description"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Date Created :</b></div>
                        <div class="col-md-9"><a class="date_created"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Date Updated :</b></div>
                        <div class="col-md-9"><a class="date_updated"></a></div>
                      </div>
                    </li>
                 
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

    <!-- modal edit -->
     <div class="modal modal-default fade" id="modalEdit" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
       <!--  Form -->
        {!!Form::open(['role'=>'form','route'=>'addComment']) !!}
            <div class="modal-header alert-warning">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
              
                  <div class="form-group">
                    {!! Form::label('nama', 'Author *', ['class' => 'control-label'])!!}
                    <!-- <div class="col-sm-10"> -->
                      {!! Form::text('nama',null, array('class'=>'form-control','placeholder'=>'Enter your name','required','id'=>'author')) !!}
                    <!-- </div> -->
                    {{ Form::hidden('id',null   ,array('id' => 'invisible_id')) }}
                  </div>
                    <div class="form-group">
                {!! Form::label('note', 'Description', ['class' => 'control-label'])!!}

                {!! Form::textarea('note',null, array('rows'=>'5','style'=>'width:100%','id'=>'description')) !!}
              </div>

                       <select class="form-control m-bot15" name="categorie" id="categorie">
             @foreach($cat as $categorie)
                       
  <option value="{{$categorie->id}}">{{$categorie->name}}</option>


                @endforeach   
                </select>
                
                 
                  <div class="form-group">

                      <p><b>Note: </b>Label marked * compulsory.</p>

                  </div>                  
            </div>
            <!-- </div> -->
            <div class="modal-footer">
             <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Cancel</button>
              <button type="submit" class="btn btn-primary childButton" id='addScopeButton'><i class="fa fa-fw fa-check"></i> Submit</button>
            </div>
          {!!Form::close() !!}

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <script>
          function modalAdd(){
  
$('#addApplication').modal('toggle');

                            }

function modalView(id,author,description,date_created,date_updated)
{
    $('#modalView').modal('toggle');
     $('#invisible_id').val(id);
    $('.author').html(author);
    $('.description').html(description);

    var date = new Date(date_created);
    var month = date.getMonth() + 1;

    var dateC=date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();


    var date2 = new Date(date_created);
    var month2 = date.getMonth() + 1;

    var dateU=date2.getDate() + "/"+ (month2.length > 1 ? month2 : "0" + month2) + "/" + date2.getFullYear();
    $('.date_created').html(dateC);
    $('.date_updated').html(dateU);
}
function modalEdit(id,author,description,categorie)
{
    $('#modalEdit').modal('toggle');
     $('#invisible_id').val(id);
    $('#author').val(author);
    $('#description').val(description);
    $('#categorie').val(categorie);

}

  function tblComment(id) {
    var user_id='{{Auth::user()->id}}';
 $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        bDestroy: true,
        ajax: {
            type: "POST",
            url: '/findComment',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
             // specialize_0: $('#specialize_0').val(),
             // specialize_1: $('#specialize_1').val(),
             // specialize_2: $('#specialize_2').val(),
             // specialize_3: $('#specialize_3').val(),
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                       var checkboxes='<input id="checkBox" type="checkbox" name="id[]" value="\'' + row.description + '\'">';
                        return checkboxes;
                    }

                    return meta.row+1;
                },
                width: "1%"
                , 
            },
    
            {
                render: function (data, type, row, meta) {

                    return row.user.name;
                }, width: "10%"
                , 
            },
            {
                render: function (data, type, row, meta) {
                
                  return row.description;
                }, width: "10%"
                , 
            },
            {
                render: function (data, type, row, meta) {
                console.log('obj',row);
                  return row.categorie.name;
                }, width: "10%"
                , 
            },
             {
                render: function (data, type, row, meta) {
                
                var date = new Date(row.created_at);
                var month = date.getMonth() + 1;

                return date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }, width: "10%"
                , 
            },
             {
                render: function (data, type, row, meta) {

                var date = new Date(row.updated_at);
                var month = date.getMonth() + 1;

                return date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                  
                }, width: "10%"
                , 
            },
             {
                render: function (data, type, row, meta) {

               var btn='';
               '<a class="btn btn-danger btn-xs btn-rounded delete" data-tooltip="true" data-placement="bottom" title="Delete" onclick=" hapus(\'' + row.id + '\')"><i class="fa fa-trash"></i></a>'
                    if(row.user.id==user_id){
                             btn='<center><a class="btn btn-info btn-xs btn-rounded edit" data-tooltip="true" data-placement="bottom" title="View" onclick=" modalView(' + row.id + ',\'' + row.user.name + '\',\'' + row.description + '\',\'' + row.created_at + '\',\'' + row.updated_at + '\')" ><i class="fa fa-eye fa-2x"></i></a> <a class="btn btn-warning btn-xs btn-rounded edit" data-tooltip="true" data-placement="bottom" title="Edit" onclick=" modalEdit(' + row.id + ',\'' + row.author + '\',\'' + row.description + '\',\'' + row.categorie.id + '\')" ><i class="fa fa-pencil fa-2x"></i></a> <a class="btn btn-danger btn-xs btn-rounded delete" data-tooltip="true" data-placement="bottom" title="Delete" onclick=" hapus(\'' + row.id + '\')"><i class="fa fa-trash fa-2x"></i></a></center>'; 
                    }
                  return btn;
                }, width: "8%"
                , orderable: false
            },

            // {
            //     render: function (data, type, row, meta) {

            //         return getSpecializedArea(row);
            //     }, width: "40%"
            //     , orderable: false
            // },
           
        ]

    });
}
tblComment();

 function hapus(id){
    // var url = '/system_list/remove';
    $.ajax({
    type: "POST",
            url: '/deleteComment',
             data: {
            id : id,
        },
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            success: function (response)
            {
              tblComment();
              pieChart();
            },
            
    });
    }
// ajax call to reload chart
function pieChart()
{
        $.ajax({
    type: "POST",
            url: '/pieChart',
             data: {
        
        },
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
              async: false,
            success: function (response)
            {
            passData(response);
            },
            
    });
}
function passData(id)
{   console.log(JSON.parse(id));
    var pie=JSON.parse(id);
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Comment by Author'
    },
    tooltip: {
     
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
              
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Comments',
        colorByPoint: true,
        data: pie
    }]
});
    return id;
}
//chart
pieChart();

function checkbox()
{
       $('#myTable').find('input[type="checkbox"]:checked').each(function(){
    
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element 
               console.log('asaasda');
            }
          
      });
}
    </script>
@endsection
