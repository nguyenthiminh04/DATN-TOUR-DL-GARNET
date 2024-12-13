@extends('client.layouts.app')
@section('content')
<div class="container article-wraper">
	<div class="row">		
		<section class="right-content col-md-9 col-md-push-3">
			<article class="article-main" itemscope itemtype="http://schema.org/Article">
				
				
				
				<meta itemprop="mainEntityOfPage" content="/ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro">
				<meta itemprop="description" content="">
				<meta itemprop="author" content="Nguyễn Chánh Bảo Trung">
				<meta itemprop="headline" content="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!">
				<meta itemprop="image" content="{{ asset('storage/' . $showArticle->img_thumb) }}">				<meta itemprop="datePublished" content="10-03-2018">
				<meta itemprop="dateModified" content="10-03-2018">
				<div class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
					<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<img src="client/bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo6d1d.png?1705894518705" alt="Ant Du lịch"/>
						<meta itemprop="url" content="https://bizweb.dktcdn.net/100/299/077/themes/642224/assets/logo.png?1705894518705">
						<meta itemprop="width" content="200">
						<meta itemprop="height" content="49">
					</div>
					<meta itemprop="name" content="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!">
				</div>
				<div class="row">
					<div class="col-md-12">
						<h1 class="title-head">{{$showArticle->title}}</h1>
						
						<div class="postby">
							<span>Đăng bởi <b>{{$showArticle->user->name}}</b> vào lúc {{$showArticle->created_at->format('d-m-Y')}}</span>
						</div>
						<div class="article-details">						
							<div class="article-content">
								<div class="rte">
									{{-- @if($showArticle->img_thumb)
									<img src="{{ asset('storage/' . $showArticle->img_thumb) }}" alt="{{ $showArticle->title }}" class="img-fluid">
								@endif --}}
									<div class="caption">
										<h2>{{$showArticle->description}}</h2>
										<p>{!! $showArticle->content !!}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-12">
						<script type="text/javascript" src="../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a099baca270babc"></script>
<div class="addthis_inline_share_toolbox_uu9r"></div>
					</div>
					
					<div class="col-md-12">
						<div class="blog_related">
							<h2>Bài viết liên quan</h2>
							
							
							
							<article class="blog_entry clearfix">
								<h3 class="blog_entry-title"><a rel="bookmark" href="xieu-long-voi-nhung-canh-dep-nen-tho-o-chua-huong.html" title="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương"><i class="fa fa-angle-right" aria-hidden="true"></i> Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương</a></h3>
							</article>
							
						</div>
					</div>
					 
					<div class="col-md-12">
						
						 
						<div id="article-comments" class="clearfix">
							<h5 class="title-form-coment">Bình luận (1 bình luận)</h5>
														
							<div class="article-comment clearfix">
								<figure class="article-comment-user-image">
									<img src="https://www.gravatar.com/avatar/3979576bcdcbd166d005a5b225e1bc52?s=55&amp;d=identicon" alt="binh-luan" class="block">
								</figure>
								<div class="article-comment-user-comment">
									<p class="user-name-comment"><strong>a</strong>
										<a href="#article_comments" class="btn-link pull-xs-right hidden">Trả lời</a></p>
									<span class="article-comment-date-bull">20/09/2020</span>
									<p>a</p>
								</div>
							</div> 
							   
						</div>
						
						
						

						
						<div class="col-lg-12">
							<div class="form-coment margin-bottom-30">
								<div class="row">
									<div class="">
										<h5 class="title-form-coment">VIẾT BÌNH LUẬN CỦA BẠN:</h5>
									</div>
									<fieldset class="form-group col-xs-12 col-sm-12 col-md-12">										
										<input placeholder="Họ tên" type="text" class="form-control form-control-lg" value="" id="full-name" name="Author" Required data-validation-error-msg= "Không được để trống" data-validation="required" />
									</fieldset>
									<fieldset class="form-group col-xs-12 col-sm-12 col-md-12">										
										<input placeholder="Email" type="email" class="form-control form-control-lg" value="" id="email" name="Email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg= "Email sai định dạng" required />
									</fieldset>
									<fieldset class="form-group col-xs-12 col-sm-12 col-md-12">										
										<textarea placeholder="Nội dung" class="form-control form-control-lg" id="comment" name="Body" rows="6" Required data-validation-error-msg= "Không được để trống" data-validation="required"></textarea>
									</fieldset>
									<div>
										<button type="submit" class="btn btn-blues"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Gửi bình luận</button>
									</div>
								</div>
							</div> <!-- End form mail -->
						</div>
					</div>
					
				</div>				
			</article>
		</section>		
		
		<aside class="left left-content col-md-3 col-md-pull-9">
			
<aside class="aside-item collection-category blog-category">	
	<div class="heading">
		<h2 class="title-head margin-bottom-0"><span>Danh mục</span></h2>
	</div>	
	<div class="aside-content">
		<nav class="nav-category  navbar-toggleable-md" >
			<ul class="nav navbar-pills">
				
				
				<li class="nav-item "><a class="nav-link" href="index.html">Trang chủ</a></li>
				
				
				
				<li class="nav-item "><a class="nav-link" href="gioi-thieu.html">Giới thiệu</a></li>
				
				
				
				<li class="nav-item ">
					<a href="tour-trong-nuoc.html" class="nav-link">Tour trong nước</a>
					<i class="fa fa-angle-down" ></i>
					<ul class="dropdown-menu">
						
						
						<li class="dropdown-submenu nav-item">
							<a class="nav-link" href="mien-trung.html">Miền Trung</a>
							<i class="fa fa-angle-down" ></i>
							<ul class="dropdown-menu">
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-quang-binh.html">Du lịch Quảng Bình</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-hue.html">Du lịch Huế</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-da-nang.html">Du lịch Đà Nẵng</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-hoi-an.html">Du lịch Hội An</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-nha-trang.html">Du lịch Nha Trang</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-phan-thiet.html">Du lịch Phan Thiết</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-da-lat.html">Du lịch Đà Lạt</a>
								</li>
								
							</ul>                      
						</li>
						
						
						
						<li class="dropdown-submenu nav-item">
							<a class="nav-link" href="mien-bac.html">Miền Bắc</a>
							<i class="fa fa-angle-down" ></i>
							<ul class="dropdown-menu">
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-ha-noi.html">Du lịch Hà Nội</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-ha-long.html">Du lịch Hạ Long</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-sapa.html">Du lịch Sapa</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-ninh-binh.html">Du lịch Ninh Bình</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-hai-phong.html">Du lịch Hải Phòng</a>
								</li>
								
							</ul>                      
						</li>
						
						
						
						<li class="dropdown-submenu nav-item">
							<a class="nav-link" href="mien-nam.html">Miền Nam</a>
							<i class="fa fa-angle-down" ></i>
							<ul class="dropdown-menu">
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-phu-quoc.html">Du lịch Phú Quốc</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-con-dao.html">Du lịch Côn Đảo</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-can-tho.html">Du lịch Cần Thơ</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-vung-tau.html">Du lịch Vũng Tàu</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-ben-tre.html">Du lịch Bến Tre</a>
								</li>
								
								<li class="dropdown-submenu nav-item">
									<a class="nav-link" href="du-lich-dao-nam-du.html">Du lịch Đảo Nam Du</a>
								</li>
								
							</ul>                      
						</li>
						
						
					</ul>
				</li>
				
				
				
				<li class="nav-item ">
					<a href="tour-nuoc-ngoai.html" class="nav-link">Tour nước ngoài</a>
					<i class="fa fa-angle-down" ></i>
					<ul class="dropdown-menu">
						
						
						<li class="nav-item">
							<a class="nav-link" href="du-lich-chau-a.html">Du lịch Châu Á</a>
						</li>
						
						
						
						<li class="nav-item">
							<a class="nav-link" href="du-lich-chau-au.html">Du lịch Châu Âu</a>
						</li>
						
						
						
						<li class="nav-item">
							<a class="nav-link" href="du-lich-chau-uc.html">Du lịch Châu Úc</a>
						</li>
						
						
						
						<li class="nav-item">
							<a class="nav-link" href="du-lich-chau-my.html">Du lịch Châu Mỹ</a>
						</li>
						
						
					</ul>
				</li>
				
				
				
				<li class="nav-item "><a class="nav-link" href="dich-vu-tour.html">Dịch vụ tour</a></li>
				
				
				
				<li class="nav-item "><a class="nav-link" href="cam-nang-du-lich.html">Cẩm nang du lịch</a></li>
				
				
				
				<li class="nav-item "><a class="nav-link" href="lien-he.html">Liên hệ</a></li>
				
				
			</ul>
		</nav>
	</div>
</aside>





<div class="aside-item">
	<div class="heading">
		<h2 class="title-head">Bài viết khác</h2>
	</div>
	<div class="list-blogs">
		<div class="row">
												
			<article class="blog-item blog-item-list col-md-12">
				<a href="xieu-long-voi-nhung-canh-dep-nen-tho-o-chua-huong.html" class="panel-box-media">
					<img src="client/bizweb.dktcdn.net/thumb/small/100/299/077/articles/chua-huong9e3f.jpg?v=1520693664270" width="70" height="70" alt="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương" /></a>
				<div class="blogs-rights">
					<h3 class="blog-item-name"><a href="xieu-long-voi-nhung-canh-dep-nen-tho-o-chua-huong.html" title="Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương">Xiêu lòng với những cảnh đẹp nên thơ ở chùa Hương</a></h3>
					<div class="post-time">10/10/2024</div>
				</div>
			</article>			
												
			<article class="blog-item blog-item-list col-md-12">
				<a href="trang-an-co-diem-den-dang-hot-o-ninh-binh.html" class="panel-box-media">
					<img src="client/bizweb.dktcdn.net/thumb/small/100/299/077/articles/trang-an-2-5-15a15.jpg?v=1606138224437" width="70" height="70" alt="Tràng An cổ – điểm đến đang hot ở Ninh Bình" /></a>
				<div class="blogs-rights">
					<h3 class="blog-item-name"><a href="trang-an-co-diem-den-dang-hot-o-ninh-binh.html" title="Tràng An cổ – điểm đến đang hot ở Ninh Bình">Tràng An cổ – điểm đến đang hot ở Ninh Bình</a></h3>
					<div class="post-time">10/10/2024</div>
				</div>
			</article>			
												
			<article class="blog-item blog-item-list col-md-12">
				<a href="mua-hoa-phan-phu-hong-troi-bao-loc.html" class="panel-box-media"><img src="client/bizweb.dktcdn.net/thumb/small/100/299/077/articles/7mai-anh-dao-dalat-zing8ff9.jpg?v=1520693432973" width="70" height="70" alt="Mùa hoa phấn phủ hồng trời Bảo Lộc" /></a>
				<div class="blogs-rights">
					<h3 class="blog-item-name"><a href="mua-hoa-phan-phu-hong-troi-bao-loc.html" title="Mùa hoa phấn phủ hồng trời Bảo Lộc">Mùa hoa phấn phủ hồng trời Bảo Lộc</a></h3>
					<div class="post-time">10/10/2024</div>
				</div>
			</article>			
												
			<article class="blog-item blog-item-list col-md-12">
				<a href="ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro.html" class="panel-box-media"><img src="client/bizweb.dktcdn.net/thumb/small/100/299/077/articles/dalat-158d7.jpg?v=1520693176427" width="70" height="70" alt="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!" /></a>
				<div class="blogs-rights">
					<h3 class="blog-item-name"><a href="ai-bao-da-lat-chi-hop-style-mo-mong-cool-ngau-nhu-doi-ban-than-nay-van-co-ca-ro.html" title="Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ ảnh thần thái!">Ai bảo Đà Lạt chỉ hợp style mơ mộng? Cool ngầu như đôi bạn thân này vẫn có cả rổ...</a></h3>
					<div class="post-time">10/10/2024</div>
				</div>
			</article>			
			
		</div>
	</div>
</div>

		</aside>
		
	</div>
</div>
@endsection