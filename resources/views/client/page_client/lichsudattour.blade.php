@extends('client.layout_client.master_client')
	
@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="posts" class="small-thumbs">
                @if(Session::has('thanhcongTT'))
                    <div class="thanhcongTT"></div>
                @endif
                @foreach($lichsu as $ls)
                <div class="entry clearfix">
                    <div class="entry-image">
                        <img class="image_fade" src="upload/{{$ls->tour->hinhanh}}" alt="Standard Post with Image">
                    </div>
                    <div class="entry-c lichsutour">
                        <div class="entry-title">
                            <a href="{{route('chi-tiet', $ls->id)}}">{{$ls->tour->tentour}}</a>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><a><i class="icon-calendar3"></i> {{$ls->tour->created_at}}</a></li>
                            <li><a><i class="icon-user"></i> {{$ls->tour->users->hoten}}</a></li>
                            <li><a><i class="icon-folder-open"></i>{{$ls->tour->place->tendiadiem}}</a></li>
                            <li><a><i class="icon-comments"></i> {{$ls->tour->comment->count()}}</a></li>
                        </ul>
                        <div class="clear"></div>
                        <div class="entry-content">
                            <a>{{number_format($ls->tongtien)}} VNĐ</a>
                            <div class="status-bill">
                                @if($ls->tinhtrangdon == 0)
                                    <strong>Trạng thái đơn: Chưa xử lý</strong>
                                @elseif($ls->tinhtrangdon == 1)
                                    <strong style="float: left">Trạng thái đơn: Được chấp nhận </strong>
                                    <form action="{{url('payment')}}" method="POST" role="form">
                                        {{csrf_field()}}
                                        <input type="hidden" name="idbill" value="{{$ls->id}}">
                                        <input type="hidden" name="tentour" value="{{$ls->tour->tentour}}">
                                        <input type="hidden" name="tongtien" value="{{$ls->tongtien}}">
                                        <button type="submit" style="margin-left: 10px">Thanh toán</button>
                                    </form>
                                    <div class="clear"></div>
                                @elseif($ls->tinhtrangdon == 2)
                                    <strong>Trạng thái đơn: <i class="glyphicon glyphicon-remove"></i> Bị từ chối</strong>
                                @elseif($ls->tinhtrangdon == 3)
                                    <strong>Trạng thái đơn: Đã thanh toán</strong>
                                @elseif($ls->tinhtrangdon == 4)
                                    <strong>Trạng thái đơn: <i class="glyphicon glyphicon-ok"></i> Hoàn tất</strong>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
