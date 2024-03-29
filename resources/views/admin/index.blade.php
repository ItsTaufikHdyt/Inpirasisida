@extends('admin::layouts.app')

@section('htmlheader_title')
    Inspirasi Sida | Admin
@endsection
@section('main-content')
<h4>Rekap Pendaftaran siPeena Tahun @php echo date('Y'); @endphp</h4>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="hpanel widget-int-shape responsive-mg-b-30">
            <div class="panel-body">
                <div class="stats-title pull-left">
                    <h4>Inovasi Masyarakat</h4>
                </div>

                <div class="m-t-xl widget-cl-1">
                    <h3 class="text-success">{{$inovasi ?? '0'}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="hpanel widget-int-shape responsive-mg-b-30">
            <div class="panel-body">
                <div class="stats-title pull-left">
                    <h4>Penelitian Masyarakat</h4>
                </div>
    
                <div class="m-t-xl widget-cl-1">
                    <h3 class="text-success">{{$penelitian ?? '0'}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="hpanel widget-int-shape responsive-mg-b-30">
            <div class="panel-body">
                <div class="stats-title pull-left">
                    <h4>Inovasi Perangkat Daerah</h4>
                </div>
                
                <div class="m-t-xl widget-cl-1">
                    <h3 class="text-success">{{$penaopd ?? '0'}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

