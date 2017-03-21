<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Logistic | Livaza</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="{{ asset('assets/customer/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/jfile-upload/jquery.fileupload.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/customer/css/_all-skins.min.css') }}">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <style>
    .color-title {
      color: #000080;
    }
    .no-padding-left {
      padding-left: 0px;
    }
    .clear-padding {
      padding:  0px;
    }
    .table-po th, .table-po td {
      text-align: center;
      vertical-align: middle !important;
    }

    .table-po.table-bordered th, .table-po.table-bordered td {
      border: 1px solid black !important;
    }
  </style>
  <!--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src=" https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>-->


  @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position: fixed">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>L</b>VZ</span>
      <span class="logo-lg"><b>Logistic</b>LIVAZA</span>
    </a>
    <nav class="navbar navbar-fixed-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
   <aside class="main-sidebar" style="position: fixed;">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="">
          <a href="/prototype/logistic/merchant-list">
            <span>Merchant List</span>
          </a>
        </li>
         <li class="">
          <a href="/prototype/logistic/home">
            <span>Create PO</span>
          </a>
        </li>
        <li class="">
          <a href="">
            </i> <span>PO Sent</span>
          </a>
        </li>
        <li class="">
          <a href="">
            <span>PO Shipped</span>
          </a>
        </li>
        <li class="">
          <a href="">
            <span>All Order</span>
          </a>
        </li>
        <li class="">
          <a href="">
           <span>Export as Excel</span>
          </a>
        </li>
        <li class="">
          <a href="">
            <span>List Payment B2C</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    @yield('content')
  </div>
  <footer class="main-footer">
    Livaza
  </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('assets/plugins/jui/js/jquery-ui.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('assets/plugins/jfile-upload/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/jfile-upload/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/jfile-upload/jquery.fileupload.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/plugins/jclipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/customer/js/app.min.js') }}"></script>
@include('vendors/messages-jquery') 
<div class="modal fade" id="livaza-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<script type="text/javascript">
$(function() {

    new Clipboard('.btn');

    $('body').delegate('a[target=show-modal],button[target=show-modal]','click',function(){
        var url = $(this).attr('href');
        ajaxModal(url,$(this));
        return false;
    });

    $('body').delegate('a[target=print],button[target=print]','click',function(){
        var url = $(this).attr('href');
        window.open(url,'popUpWindow','height=600,width=900,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        return false;
    });

    $('.media-list').on('click', '.delete-modal', function(event){
      if($(this).data('method') === 'delete') {
          event.preventDefault();
          $("#delete-data .delete-me").attr('action', $(this).attr('href'));
          if($(this).attr('message')!=null){
              $('#message-dialog').html($(this).attr('message'));
          }
          $("#delete-data").modal('show');
      }
    });

    $('.delete-modal').click(function(event){
      if($(this).data('method') === 'delete') {
          event.preventDefault();
          $("#delete-data .delete-me").attr('action', $(this).attr('href'));
          if($(this).attr('message')!=null){
              $('#message-dialog').html($(this).attr('message'));
          }
          $("#delete-data").modal('show');
      }
    });

    function ajaxModal(url,el){
        $('#livaza-modal').css({'width':''});
        if($(el).hasClass('modal-max')){
            $('#livaza-modal').css({'width':'900px'});
        }
        $('#livaza-modal').html();
          $.ajax({
                  url: url,
                  data:'ajax=1',
                  cache: false,
                  dataType: 'html',
                  success: function(msg){
                      $('#livaza-modal').html(msg);
                      $('#livaza-modal').modal('show');
                  },
                  error: function(){
                      $('#livaza-modal').html("Oww... snapp.. Failed to open modal");
                      $('#livaza-modal').modal('show');
                  }
           });

          return true;
    }
});
</script>
@stack('js')
</body>
</html>
