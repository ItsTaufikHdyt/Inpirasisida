@extends('homepage::layouts.app')

@section('htmlheader_title')
	eLitbang
@endsection

@section('main-content')
<section id="contact" class="section">      
      <div class="contact-form">
        <div class="container">
          <div class="section-header">          
            <h2 class="section-title">Form Pendaftaran</h2>
            <span>Penelitian</span>
            <br><br>
            <select class="form-control" id="kriteria" style="padding: 0px 15px; border-radius: 150px" onchange="TampilMhs(this.value)">
              <option value="">*Pilih Kriteria Peserta</option>
              <option value="ind">Individu</option>
              <option value="klp">Kelompok</option>
              <option value="lmb">Lembaga/Instansi</option>
            </select>
            <hr>
          </div>

          <div id="MhsData"></div>

          <div class="row">
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-mb-12">
			  <form action="sv-individu-research.php" name="form1" method="post" enctype="multipart/form-data">
	<table width="100%">
		<tr>
			<td width="20%" height="45px" valign="top">Nama Lengkap <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="nama" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
			<td width="20%" height="45px" valign="top">Tempat/Tanggal Lahir <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="ttl" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">Agama <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top">
				<select name="agama" class="form-control" style=" padding: 0px 3px; border-radius: 10px;" required>
		          <option>-Pilih Agama-</option>
		          <option value="Islam">Islam</option>
		          <option value="Kristen">Kristen</option>
		          <option value="Katolik">Katolik</option>
		          <option value="Hindu">Hindu</option>
		          <option value="Budha">Budha</option>
		          <option value="Lainnya">Lainnya</option>
		        </select>
			</td>
			<td width="20%" height="45px" valign="top">Pekerjaan <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="pekerjaan" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">Email <small><font color="red">*</font></small><br><small>*) Pastikan email Anda benar</small></td>
			<td width="30%" height="45px" valign="top"><input name="email" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
			<td width="20%" height="45px" valign="top">Pendidikan <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="pendidikan" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">Warga Negara <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="nation" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
			<td width="20%" height="45px" valign="top">KTP/Kartu Pelajar (.jpg) <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="picture" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file" required></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">No. Telepon <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="telp" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
			<td width="20%" height="45px" valign="top">Surat Persetujuan Orang Tua<br><small>**) Diisii khusus pelajar (Format .jpg)</small></td>
			<td width="30%" height="45px" valign="top"><input name="picture3" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file"></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">Surat Persetujuan Sekolah<br><small>**) Diisii khusus pelajar (Format .jpg)</small></td>
			<td width="30%" height="45px" valign="top"><input name="picture4" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file"></td>
			<td width="20%" height="45px" valign="top">Surat Pernyataan (.jpg) <small><font color="red">*</font></small></td>
  			<td width="30%" height="45px" valign="top"><input name="pernyataan" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file" required></td>
			
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">Alamat <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><textarea name="alamat" class="form-control" style="padding: 3px 3px; border-radius: 15px;" rows="3" cols="30" required></textarea></td>
			<td width="20%" height="45px" valign="top"> File Proposal (.pdf) <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="picture2" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="file" required></td>
		</tr>
		<tr>
			<td width="20%" height="45px" valign="top">&nbsp;</td>
			<td width="30%" height="45px" valign="top">&nbsp;</td>
			<td width="20%" height="45px" valign="top">Alamat URL Proposal <small><font color="red">*</font></small></td>
			<td width="30%" height="45px" valign="top"><input name="url" class="form-control" style="padding: 3px 3px; border-radius: 15px;" type="text" required></td>
		</tr>
		<tr>
			<td colspan="4" align="center">
				<img src="../captcha/captcha.php"><br>
	        <input class="form-control" name="captcha" type="text" value="Hasilnya Adalah: " onBlur="if(this.value=='') this.value='Hasilnya Adalah: '" onFocus="if(this.value =='Hasilnya Adalah: ' ) this.value=''" required/>
	        
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
<script>
     function TampilMhs(str) {
          if (str == "") {
              document.getElementById("MhsData").innerHTML = "--- Form Pendaftaran ---";
              return;
          } else if (str == "ind") {
            $("#kriteria").click(function(){              
              window.location.href = "{{url('sipeena/penelitian/form-ind-research')}}" ;
            });
            return;
          } else if (str == "klp") {
            $("#kriteria").click(function(){
                window.location.href = "{{url('sipeena/penelitian/form-klp-research')}}" ;
            });
            return;
          } else if (str == "lmb") {
            $("#kriteria").click(function(){
              window.location.href = "{{url('sipeena/penelitian/form-lmb-research')}}" ;
            });
            return;
          }

      }
</script>
@endsection

