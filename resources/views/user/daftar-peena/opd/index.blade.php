@extends('homepage::layouts.app')

@section('htmlheader_title')
	eLitbang
@endsection
@section('navbar')
<ul class="navbar-nav mr-auto w-100 justify-content-end">
              @auth
              <li class="nav-item"><a href="#" title="Dashboard">Hi, {{Auth::user()->nama}}</a></li>                                                                                   
			  <li class="nav-item">
                <a class="nav-link page-scroll" href="{{route('sipeena')}}">Home</a>
              </li>
              <li class="nav-item">
              <a class="nav-link page-scroll" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </li> 
              </li>  
              @endauth                             
</ul>
@endsection
@section('main-content')
<section id="contact" class="section"> 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif     
      <div class="contact-form">
        <div class="container">
          <div class="section-header">          
            <h2 class="section-title">Form Pendaftaran</h2>
            <span>Inovasi Perangkat Daerah</span>
            <br><br>
          </div>
          <div class="row">
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-mb-12">
          	  <form action="{{url('sipeena/store-opd')}}" name="form1" method="post" enctype="multipart/form-data">
          		@csrf
				  <table width="100%">
	          		<tr>
	          			<td width="20%" height="45px" valign="top">Nama Perangkat Daerah <small><font color="red">*</font></small></td>
	          			<td width="30%" height="45px" valign="top">
                    <select name="nama" class="form-control" style="font-size: 12px; padding: 3px 3px; border-radius: 15px;" required>
                      @foreach($unitkerja as $data)
					  <option value="{{$data->nama_uk}}">{{$data->nama_uk}}</option>
					  @endforeach
                    </select>
                    <!-- <input name="nama" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required> --></td>
	          			<td width="20%" height="45px" valign="top">Nama Lengkap <small><font color="red">*</font></small></td>
	          			<td width="30%" height="45px" valign="top"><input name="tgjawab" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
	          		</tr>
	          		<tr>
	          			<td width="20%" height="45px" valign="top">NIP <small><font color="red">*</font></small></td>
	          			<td width="30%" height="45px" valign="top"><input name="nip" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
	          			<td width="20%" height="45px" valign="top">Jabatan <small><font color="red">*</font></small></td>
	          			<td width="30%" height="45px" valign="top"><input name="jabatan" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
	          		</tr>
                <tr>
                  <td width="20%" height="45px" valign="top">Email <small><font color="red">*</font></small>
                    <br><small>*) Pastikan email Anda benar</small></td>
                  <td width="30%" height="45px" valign="top"><input name="email" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
                  <td width="20%" height="45px" valign="top">No. Telepon <small><font color="red">*</font></small></td>
                  <td width="30%" height="45px" valign="top"><input name="telp" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
                </tr>
                <tr>
                  <td width="20%" height="45px" valign="top">Surat Pernyataan Minat (.pdf) <small><font color="red">*</font></small></td>
                  <td width="30%" height="45px" valign="top"><input name="surat_pernyataan" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file"></td>
                </tr>
				<tr>
					<td width="20%" height="45px" valign="top">Alamat <small><font color="red">*</font></small></td>
					<td width="30%" height="45px" valign="top"><textarea name="alamat" class="form-control" style="padding: 3px 3px; border-radius: 15px;" rows="3" cols="30" required></textarea></td>
					<td width="20%" height="45px" valign="top">
						<label for="toge">
							Proposal (.pdf) <small><font color="red">*</font></small><br>
							<small>**) Besar File Maksimal 5 MB,</small><br>
							<small> Jika file lebih dari 5 MB silahkan upload ke Cloud(Dropbox, Google Drive ) isi url proposal dengan menchecklist checkbox berikut
							<input type="checkbox" name="" value="a" id="toggle">
							</small> 
						</label>
					</td>
					<td width="30%" height="45px" valign="top">
					<input id="if" name="proposal" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file" >
					<input id="iu" name="url_proposal" class="form-control" placeholder="http://..." style="padding: 3px 3px; border-radius: 15px; display: none;" type="text">
					</td> 		
				</tr>
	          	<tr>
	          			<td colspan="4" align="center">
						  <div class="captcha">
							<span>{!! captcha_img('math') !!}</span>
							<button type="button" class="btn btn-common btn-effect" id="refresh">
								<i class="fa fa-sync-alt" id="refresh"></i>
							</button>
						</div>
							<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
					        
			                <button name="simpan" type="submit" class="btn btn-common btn-effect">Simpan</button>
			                <!-- <button type="reset" class="btn btn-default btn-effect">Reset</button> -->
	          			</td>
	          	</tr>
	          	</table>
	          </form>	          	
	        </div>
          </div>
      	</div>
  	  </div>
  	</section>
@endsection
@section('custom_scripts')
<script type="text/javascript">
document.getElementById('toggle').addEventListener('change', function() {
	// toge nya disini, sesuaikan aja mana yg mau
  // di tampilin duluan input (file / url)
  if (this.checked == true) {
    document.getElementById('iu').style.display = 'block'
    document.getElementById('if').style.display = 'none'
  } else {
    document.getElementById('iu').style.display = 'none'
    document.getElementById('if').style.display = 'block'
  }
})

$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'{{url("sipeena/refreshcaptcha")}}',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});
</script>
@endsection