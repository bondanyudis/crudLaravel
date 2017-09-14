<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple CRUD with Ajax and Modal</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    // Edit Data (Modal and function edit data)
    $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#nama').val($(this).data('nama'));
    $('#alamat').val($(this).data('alamat'));
    $('#telepon').val($(this).data('telepon'));
    $('#myModal').modal('show');
});
  $('.modal-footer').on('click', '.edit', function() {
  $.ajax({
      type: 'post',
      url: '/editItem',
      data: {
          '_token': $('input[name=_token]').val(),
          'id': $("#fid").val(),
          'nama': $('#nama').val(),
          'alamat': $('#alamat').val(),
          'telepon': $('#telepon').val()
      },
      success: function(data) {
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nama + "</td><td>" + data.alamat + "</td><td>"+data.telepon + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-nama='" + data.nama + "' data-alamat='" + data.alamat +"' data-telepon='" + data.telepon + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-nama='" + data.nama + "' data-alamat='" + data.alamat + "' data-telepon='" + data.telepon +"'><span class='glyphicon glyphicon-trash'></span>Hapus</button></td></tr>");
      }
  });
});
// add function
$("#add").click(function() {
  $.ajax({
    type: 'post',
    url: '/addItem',
    data: {
      '_token': $('input[name=_token]').val(),
      'nama': $('input[name=nama1]').val(),
      'alamat': $('input[name=alamat1]').val(),
      'telepon': $('input[name=telepon1]').val()
    },
    success: function(data) {
      if ((data.errors)) {
        $('.error').removeClass('hidden');
        $('.error').text(data.errors.nama);
        $('.error').text(data.errors.alamat);
        $('.error').text(data.errors.telepon);
      } else {
        $('.error').remove();
        $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nama + "</td><td>" + data.alamat + "</td><td>" + data.telepon +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-nama='" + data.nama + "' data-alamat='" + data.alamat +"' data-telepon='" + data.telepon+ "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-nama='" + data.nama + "' data-alamat='" + data.alamat +"' data-telepon='" + data.telepon  +"'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
      }
    },
  });
  $('#nama1').val('');
  $('#alamat1').val('');
  $('#telepon1').val('');
});

//delete function
$(document).on('click', '.delete-modal', function() {
  $('#footer_action_button').text(" Delete");
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Delete');
  $('.id').text($(this).data('id'));
  $('.deleteContent').show();
  $('.form-horizontal').hide();
  $('.title').html($(this).data('title'));
  $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function() {
  $.ajax({
    type: 'post',
    url: '/deleteItem',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data) {
      $('.item' + $('.id').text()).remove();
    }
  });
});

</script>
  </body>
</html>