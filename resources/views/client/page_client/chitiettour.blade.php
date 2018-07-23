@extends('client.layout_client.master_client')

@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="postcontent nobottommargin clearfix">
                @if($cttour)
                    @if($cttour->trangthaitour != 0)
                        <div class="single-post nobottommargin">
                            <div class="entry clearfix">
                                <div class="entry-title">
                                    <h1>{{$cttour->tentour}}</h1>
                                </div>

                                <ul class="entry-meta clearfix">
                                    <li><a><i class="icon-calendar3"></i> {{date('d M Y', strtotime($cttour->created_at))}}</a></li>
                                    <li><a><i class="icon-user"></i> {{$cttour->users->email}}</a></li>
                                    <li><a><i class="icon-folder-open"></i> {{$cttour->place->tendiadiem}}</a></li>
                                    <li><a><i class="icon-comments"></i> {{$cttour->comment->count()}} Comments</a></li>		
                                </ul>
                                <ul class="entry-meta clearfix">
                                    <li><a>Số ngày tham quan: {{$cttour->songaydi}} ngày</a></li>
                                    <li><a>Số khách tối đa: {{$cttour->sokhachtoida}} người</a></li>
                                </ul>

                                <div class="entry-image">
                                    <a><img src="upload/{{$cttour->hinhanh}}" alt="Blog Single"></a>
                                </div>

                                <div class="entry-content notopmargin">
                                    {!! $cttour->mota !!}
                                </div>			
                            </div>

                            <div class="post-navigation clearfix text-center">
                                @if(Auth::check())
                                    @if(Auth::user()->quyen == 1)
                                        <em>{{number_format($cttour->giatour)}} VNĐ</em><a data-toggle="modal" data-target="#DatTour"><i class="icon-shopping-cart"></i></a>
                                    @endif
                                @else
                                    <em>{{number_format($cttour->giatour)}} VNĐ</em><a data-toggle="modal" data-target="#DangNhap"><i class="icon-shopping-cart"></i></a>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-sm-12">			
                                    <ul class="nav nav-tabs">		
                                        <li><a href="#thongtinhdv" data-toggle="tab" id="tthdv">Hướng dẫn viên</a></li>
                                        <li><a href="#comments" data-toggle="tab" id="bl">Bình luận</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div id="thongtinhdv" class="text-center">
                                <img src="upload/{{$cttour->users->anhdaidien}}" height="200" width="200">
                                <div class="clear"></div>
                                <span>Họ tên: {{$cttour->users->hoten}}</span>
                                <span>Email: {{$cttour->users->email}}</span>
                                <span>Địa chỉ: 
                                    @if($cttour->users->gioitinh != "") 
                                        {{$cttour->users->diachi}} 
                                    @else 
                                        Chưa cập nhật
                                    @endif
                                </span>
                                <span>Số điện thoại: {{$cttour->users->sodienthoai}}</span>
                                <span>Giới tính: 
                                    @if($cttour->users->gioitinh == 1) 
                                        Nam
                                    @elseif($cttour->users->gioitinh === 0)
                                        Nữ
                                    @else
                                        Chưa cập nhật
                                    @endif
                                </span>
                                <span><a href="{{route('tour_hdv', $cttour->users->id)}}">Xem các tour khác của hướng dẫn viên</a></span>
                            </div>

                            @include('client.page_client.binhluan')
                        </div>
                    @else
                        <h1 class="text-center title">Tour đã bị xóa</h1><br><br>
                    @endif
                @else
                    <h1 class="text-center title">Không tồn tại tour này</h1>
                @endif
            </div>		
            @include('client.page_client.tourlienquan')
        </div>
    </div>
</section>
@endsection
