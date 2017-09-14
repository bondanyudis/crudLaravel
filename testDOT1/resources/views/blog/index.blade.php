@extends('app')
  @section('content')
<h2 class="text-info">CRUD Laravel, Bootstrap and Ajax</h2>

  <div class="form-group row add" style="margin-top: 20px">
    <div class="col-md-3" style="margin-bottom: 20px">
      <input type="text" class="form-control" id="nama1" name="nama1"
      placeholder="nama..." required>
      <p class="error text-center alert alert-danger hidden"></p>
    </div>
    <div class="col-md-3" style="margin-bottom: 20px">
      <input type="text" class="form-control" id="alamat1" name="alamat1"
      placeholder="alamat..." required>
      <p class="error text-center alert alert-danger hidden"></p>
    </div>
    <div class="col-md-3">
      <input type="text" class="form-control" id="telepon1" name="telepon1"
      placeholder="telepon" required>
      <p class="error text-center alert alert-danger hidden"></p>
    </div>
    <div class="col-md-2">
      <button class="btn btn-warning" type="submit" id="add">
        <span class="glyphicon glyphicon-plus"></span> tambah data baru
      </button>
    </div>
  </div>

  <div class="row">
    <div class="table-responsive">
      <table class="table table-borderless" id="table">
        <tr>
          <th>No.</th>
          <th>nama</th>
          <th>alamat</th>
          <th>telepon</th>
        </tr>
        {{ csrf_field() }}

        <?php $no=1; ?>
        @foreach($blogs as $blog)
          <tr class="item{{$blog->id}}">
            <td>{{$no++}}</td>
            <td>{{$blog->nama}}</td>
            <td>{{$blog->alamat}}</td>
            <td>{{$blog->telepon}}</td>
            <td>
            <button class="edit-modal btn btn-primary" data-id="{{$blog->id}}" data-nama="{{$blog->nama}}" data-alamat="{{$blog->alamat}}" data-telepon="{{$blog->telepon}}">
              <span class="glyphicon glyphicon-edit"></span> Edit
            </button>
            <button class="delete-modal btn btn-danger" data-id="{{$blog->id}}" data-nama="{{$blog->nama}}" data-alamat="{{$blog->alamat}}" data-telepon="{{$blog->telepon}}">
              <span class="glyphicon glyphicon-trash"></span> Hapus
            </button>
          </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" for="nama">nama</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="nama">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="alamat">alamat</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="alamat">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="telepon">telepon</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="telepon">
              </div>
            </div>
          </form>
            <div class="deleteContent">
            Apakah anda yakin unuk mengahapus daa ini ? <span class="title"></span> ?
            <span class="hidden id"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  @stop