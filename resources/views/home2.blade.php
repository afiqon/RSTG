@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2"> -->

        <div class="panel panel-primary">
                <div class="panel-heading">Carian Pemandu Pelancong</div>
                   <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                  </div>
              </div>
              <div class="box-body table-responsive">

                    <table class="table table-bordered"  width="80%">
                        <tbody>
                            
                            
                            <tr>
                                <td   width="30%" > <label >Nama</label></td>
                                <td colspan="3">  
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </tr>
                              <tr>
                                <td   width="30%" > <label >IC</label></td>
                                <td colspan="3">  
                                    <input id="ic" type="text" class="form-control" name="ic" value="{{ old('ic') }}" required autofocus>
                            </tr>
                            <tr>
                                <td   width="30%" > <label >No Lesen</label></td>
                                <td colspan="3">  
                                    <input id="licenseno" type="text" class="form-control" name="licenseno" value="{{ old('licenseno') }}" required autofocus>
                            </tr>
                        </tbody>
                    </table>

                <div class="panel-body">
                    <div class="col-md-2 pull-right" >                    
                        <button type="button" class="form-control btn btn-primary" onclick="tblTg()" id="bn"> Carian </button>
                    </div>
                    <div class="form-group">
                        <div  id="message"></div>
                    </div>
                </div>
              </div>
            </div>
           
                  <!-- <div class="col-md-8 col-md-offset-2"> -->
            <div class="panel panel-primary">
                <div class="panel-heading">Senarai Pemandu Pelancong</div>

                <div class="panel-body">
                  <table class="table table-bordered" id="myTable" >
            <thead class="bg-navy" >
            <th  style="width:1%;"><center>No.</center></th>
            <th  style="width:50%;"><center>Nama</center></th>
             <th  style="width:20%;"><center>Kad Pengenalan</center></th>
              <th  style="width:10%;"><center>No Lesen</center></th>
              <th  style="width:3%;"><center>Jenis</center></th>
                <th  style="width:20%;"><center>Tempoh Sah</center></th>
            <th style="width:20%;"><center>Tindakan</center></th>
            </thead>
            </table>
                            </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->

    </div>
</div>
 <div class="modal modal-default fade" id="modalView" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Paparan Maklumat Pemandu Pelancong</h4>
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
                        <div class="col-md-3"><b>Nama :</b></div>
                        <div class="col-md-9"><a class="nama"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>No. Kad Pengenalan :</b></div>
                        <div class="col-md-9"><a class="ic"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>No Lesen :</b></div>
                        <div class="col-md-9"><a class="licenseno"></a></div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Jenis :</b></div>
                        <div class="col-md-9"><a class="type"></a></div>
                      </div>
                    </li>
                       <li class="list-group-item">
                      <div class="row">
                        <div class="col-md-3"><b>Tempoh Sah :</b></div>
                        <div class="col-md-9"><a class="date"></a></div>
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
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Tutup</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


    <script>
          function modalAdd(){
  
$('#addApplication').modal('toggle');

                            }



  function tblTg(id) {

    var user_id='{{Auth::user()->id}}';
 $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        bPaginate: true,
        bDestroy: true,
        ajax: {
            type: "POST",
            url: '/findTg',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
             name: $('#name').val(),
             ic: $('#ic').val(),
             licenseno: $('#licenseno').val(),
             // specialize_3: $('#specialize_3').val(),
            }
        },
        columns: [
            {
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                     return (meta.row + 1);
                    }

                    return meta.row+1;
                },
                width: "1%"
                , 
            },
    
            {
                render: function (data, type, row, meta) {

                    if(row.user)
                    {
                      return row.user.usr_fullname;
                    }
                    else
                    {
                      return 'NULL';
                    }
                }, width: "10%"
                , 
            },
            {
                render: function (data, type, row, meta) {
                
                  return row.usr_id;
                }, width: "10%"
                , 
            },
            {
                render: function (data, type, row, meta) {
                // console.log('obj',row);
                  return row.tg_no_lesen;
                }, width: "10%"
                , 
            },
              {
                render: function (data, type, row, meta) {
                if(row.tg_type){
                  return row.tg_type.tg_type_name;
                }
                else
                {
                  return 'NULL';
                }
                }, width: "10%"
                , 
            },
            //tg_tkh_lesen_tamat
                 {
                render: function (data, type, row, meta) {
                console.log('obj',row);
               
                var date = new Date(row.tg_tkh_lesen_tamat);
                var month = date.getMonth() + 1;

                return date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }, width: "10%"
                , 
            },

             {
                render: function (data, type, row, meta) {

               var btn='<a class="btn btn-info btn-xs btn-rounded edit" data-tooltip="true" data-placement="bottom" title="View" onclick="modalView(' + row.usr_id + ',\'' + row.user.usr_fullname + '\',\'' + row.tg_no_lesen + '\',\'' + row.tg_type.tg_type_name+ '\',\'' + row.tg_tkh_lesen_tamat + '\')"   ><i class="fa fa-eye fa-2x"></i></a>';
   
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
function tblyajra()
{
  $('#myTable').DataTable({
            processing: true,
            serverSide: true,
              ajax: "findTg",
        });
}
// tblTg();
function modalView(id,author,licenseno,type,dateexpired)
{
    $('#modalView').modal('toggle');
     $('.ic').html(id);
    $('.nama').html(author);
    $('.licenseno').html(licenseno);
$('.type').html(type);
    var date = new Date(dateexpired);
    var month = date.getMonth() + 1;

    var dateC=date.getDate() + "/"+ (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
    $('.date').html(dateC);
}
    </script>
@endsection
