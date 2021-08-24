<!doctype html>
<html lang="en">
<head>
 <title>Laravel 8 CRUD - Menggunakan API Firebase</title>
 <style>
    html, body {
    width: 100%;
    height:100%;
    }

    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    th, td {
    text-align: left;
    padding: 8px;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
 </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
 <div class="row">
 <div class="col-md-12" style="padding-top: 5%">
 <div class="card card-default">
    <a href="/mahasiswa/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
 <div class="card-header">
 <div class="row">
 <div class="col-md-10">
 <strong style="color: deepskyblue">Tambah Data Mahasiswa</strong>
 </div>
 </div>
 </div>
 <div class="card-body">
 <form id="addUser" class="" method="POST" action="">
 {{-- Grup Inputan --}}
 {{-- Nama --}}
 <div class="form-group">
 <label for="nama_depan" class="col-md-12 col-form-label">Nama Depan</label>
 
 <div class="col-md-12">
 <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="" required autofocus>
 </div>

 <div class="form-group">
 <label for="nama_belakang" class="col-md-12 col-form-label">Nama Belakang</label>
 
 <div class="col-md-12">
 <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="" required autofocus>
 </div>
 {{-- NPM --}}
 <div class="form-group">
 <label for="no_npm" class="col-md-12 col-form-label">NPM</label>
 
 <div class="col-md-12">
 <input id="no_npm" type="text" class="form-control" name="no_npm" value="" required autofocus>
 </div>
 {{-- Angkatan --}}
 <div class="form-group">
 <label for="tahun_mhs" class="col-md-12 col-form-label">Angkatan Tahun</label>
    
 <div class="col-md-12">
 <input id="tahun_mhs" type="text" class="form-control" name="tahun_mhs" value="" required autofocus>
 </div>
 {{-- Jurusan --}}
 <div class="form-group">
 <label for="jurusan_mhs" class="col-md-12 col-form-label">Jurusan</label>
       
 <div class="col-md-12">
 <input id="jurusan_mhs" type="text" class="form-control" name="jurusan_mhs" value="" required autofocus>
 </div>
 </div>
 <div class="form-group">
 <div class="col-md-12 col-md-offset-3">
 <button type="button" class="btn btn-primary btn-block desabled" id="submitUser">
 Tambah
 </button>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div> 
 </div>
 </div>
 </div>

 {{-- Tabel Data --}}
 <div class="col-md-12" style="padding-top: 2%">
 <div class="card card-default">
 <div class="card-header">
 <div class="row">
 <div class="col-md-12">
 <strong style="color: deepskyblue">Daftar Semua User</strong>
 </div>
 </div>
 </div>
 
 <div class="card-body" style="overflow-x:auto;">
 <table class="table table-bordered">
 <tr>
 <th>Nama Depan</th>
 <th>Nama Belakang</th>
 <th>NPM</th>
 <th>Tahun</th>
 <th>Jurusan</th>
 <th width="180" class="text-center">Aksi</th>
 </tr>
 <tbody id="tbody">
 
 </tbody> 
 </table>
 </div>
 </div>
 </div>
 </div>
 </div>

 
 <!-- Model untuk Hapus -->
 <form action="" method="POST" class="users-remove-record-model">
 <div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
 <div class="modal-dialog" style="width:55%;">
 <div class="modal-content">
 <div class="modal-header">
 <h4 class="modal-title" id="custom-width-modalLabel">Hapus Data</h4>
 <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
 </div>
 <div class="modal-body">
 <h4>Apakah kamu yakin ingin menghapus data?</h4>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Tutup</button>
 <button type="button" class="btn btn-danger waves-effect waves-light deleteMatchRecord">Hapus</button>
 </div>
 </div>
 </div>
 </div>
 </form>
 
 <!-- Model untuk update -->
 <form action="" method="POST" class="users-update-record-model form-horizontal">
 <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
 <div class="modal-dialog" style="width:55%;">
 <div class="modal-content" style="overflow: hidden;">
 <div class="modal-header">
 <h4 class="modal-title" id="custom-width-modalLabel">Update Data</h4>
 <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
 </div>
 <div class="modal-body" id="updateBody">
 
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal">Tutup</button>
 <button type="button" class="btn btn-success waves-effect waves-light updateUserRecord">Update</button>
 </div>
 </div>
 </div>
 </div>
 </form>
 <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-app.js"></script>
 <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-database.js"></script>
 <script>
 // Pengaturan konfigurasi Firebase SDK
 var config = {
 apiKey: "{{ config('services.firebase.api_key') }}",
 authDomain: "{{ config('services.firebase.auth_domain') }}",
 databaseURL: "{{ config('services.firebase.database_url') }}",
 projectId: "{{ config('services.firebase.project_id') }}",
 storageBucket: "{{ config('services.firebase.storage_bucket') }}",
 messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
 appId: "{{ config('services.firebase.app_id') }}",
 measurementId: "{{ config('services.firebase.measurement_id') }}"
 };
 // Inisialisasi Firebase
 firebase.initializeApp(config);
 
 var database = firebase.database();
 
 var lastIndex = 0;
 
 // Mendapatkan Data
 firebase.database().ref('users/').on('value', function(snapshot) { 
 var value = snapshot.val();
 var htmls = [];
 $.each(value, function(index, value){
 if(value) {
 htmls.push('<tr>\
 <td>'+ value.nama_depan +'</td>\
 <td>'+ value.nama_belakang +'</td>\
 <td>'+ value.no_npm +'</td>\
 <td>'+ value.tahun_mhs +'</td>\
 <td>'+ value.jurusan_mhs +'</td>\
 <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success updateData" data-id="'+index+'">Update</a>\
 <a data-toggle="modal" data-target="#remove-modal" class="btn btn-outline-danger removeData" data-id="'+index+'">Hapus</a></td>\
 </tr>');
 }    	
 lastIndex = index;
 });
 $('#tbody').html(htmls);
 $("#submitUser").removeClass('desabled');
 });
 
 
 // Menambah Data
 $('#submitUser').on('click', function(){
 var values = $("#addUser").serializeArray();
 var nama_depan = values[0].value;
 var nama_belakang = values[1].value;
 var no_npm = values[2].value;
 var tahun_mhs = values[3].value;
 var jurusan_mhs = values[4].value;
 var userID = lastIndex+1;
 
 firebase.database().ref('users/' + userID).set({ 
 nama_depan: nama_depan, //penamaan kolom di database
 nama_belakang: nama_belakang,
 no_npm: no_npm,
 tahun_mhs: tahun_mhs,
 jurusan_mhs: jurusan_mhs,
 });
 
 // Nilai id
 lastIndex = userID;
 $("#addUser input").val("");
 });
 
 // Update Data
 var updateID = 0;
 $('body').on('click', '.updateData', function() {
 updateID = $(this).attr('data-id');
 firebase.database().ref('users/' + updateID).on('value', function(snapshot) { 
 var values = snapshot.val();
 // perbarui data
 var updateData = '<div class="form-group">\
 <label for="nama_depan" class="col-md-12 col-form-label">Nama Depan</label>\
 <div class="col-md-12">\
 <input id="nama_depan" type="text" class="form-control" name="nama_depan" value="'+values.nama_depan+'" required autofocus>\
 </div>\
 </div>\
 <div class="form-group">\
 <label for="nama_belakang" class="col-md-12 col-form-label">Nama Belakang</label>\
 <div class="col-md-12">\
 <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="'+values.nama_belakang+'" required autofocus>\
 </div>\
 </div>\
 <div class="form-group">\
 <label for="no_npm" class="col-md-12 col-form-label">NPM</label>\
 <div class="col-md-12">\
 <input id="no_npm" type="text" class="form-control" name="no_npm" value="'+values.no_npm+'" required autofocus>\
 </div>\
 </div>\
 <div class="form-group">\
 <label for="tahun_mhs" class="col-md-12 col-form-label">Tahun</label>\
 <div class="col-md-12">\
 <input id="tahun_mhs" type="text" class="form-control" name="tahun_mhs" value="'+values.tahun_mhs+'" required autofocus>\
 </div>\
 </div>\
 <div class="form-group">\
 <label for="jurusan_mhs" class="col-md-12 col-form-label">Jurusan</label>\
 <div class="col-md-12">\
 <input id="jurusan_mhs" type="text" class="form-control" name="jurusan_mhs" value="'+values.jurusan_mhs+'" required autofocus>\
 </div>\
 </div>';
 
 $('#updateBody').html(updateData);
 });
 });
 
 $('.updateUserRecord').on('click', function() {
 var values = $(".users-update-record-model").serializeArray();
 var postData = {
 nama_depan : values[0].value,
 nama_belakang : values[1].value,
 no_npm : values[2].value,
 tahun_mhs : values[3].value,
 jurusan_mhs : values[4].value,
 };
 
 var updates = {};
 updates['/users/' + updateID] = postData; 
 
 firebase.database().ref().update(updates);
 
 $("#update-modal").modal('hide');
 });
 
 
 // Hapus Data
 $("body").on('click', '.removeData', function() {
 var id = $(this).attr('data-id');
 $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
 });
 
 $('.deleteMatchRecord').on('click', function(){
 var values = $(".users-remove-record-model").serializeArray();
 var id = values[0].value;
 firebase.database().ref('users/' + id).remove();
 $('body').find('.users-remove-record-model').find( "input" ).remove();
 $("#remove-modal").modal('hide');
 });
 $('.remove-data-from-delete-form').click(function() {
 $('body').find('.users-remove-record-model').find( "input" ).remove();
 });
 </script>
</body>
</html>