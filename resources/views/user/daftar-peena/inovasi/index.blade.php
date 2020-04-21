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
            <span>Inovasi Masyarakat</span>
            <br><br>
            <select class="form-control" id="kriteria" style="padding: 0px 15px; border-radius: 150px" onchange="TampilMhs(this.value)">
              <option value="">*Pilih Kriteria Peserta</option>
              <option value="ind">Individu</option>
              <option value="klp">Kelompok</option>
              <option value="lmb">Lembaga/Instansi</option>
            </select>
          <hr></div>

          <div id="MhsData"></div>
          <div class="row">
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-mb-12">
          	  <!-- <center>--- Form Pendaftaran ---</center> -->
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
                window.location.href = "{{url('sipeena/inovasi/form-ind-inovasi')}}" ;
            });
            return;
          } else if (str == "klp") {
            $("#kriteria").click(function(){
                window.location.href = "{{url('sipeena/inovasi/form-klp-inovasi')}}" ;
            });
            return;
          } else if (str == "lmb") {
            $("#kriteria").click(function(){
              window.location.href = "{{url('sipeena/inovasi/form-lmb-inovasi')}}" ;
            });
            return;
          }

      }
</script>
@endsection

