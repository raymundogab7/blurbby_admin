<div class="leftpanel">
    <div class="media profile-left">

       <!--  <a class="pull-left profile-thumb-rounded" href="{{url('merchant-profile')}}">
            @if(!is_null($restaurant->res_logo))
            <img class="img-rounded circle profile-pic" src="{{( is_null($restaurant->res_logo)) ? asset('images/nopp.jpg') : asset('uploads/'.$restaurant->merchant_id.'/profile_picture.jpg')}}" alt="">
            @else
            <img class="img-rounded circle profile-pic" src="{{asset('images/nopp.jpg')}}" alt="">
            @endif
        </a> -->
        <a class="pull-left profile-thumb" href="{{url('merchant-profile')}}">
            
            @if(!is_null($restaurant->res_logo))
            <img class="img-roundedcircle" src="{{ asset('uploads/'.$restaurant->merchant_id.'/profile_picture.jpg') }}" alt="">
            @else
            <img class="img-rounded circle" src="{{asset('images/photos/profile.png')}}" alt="">
            @endif
        </a>

        <div class="media-body">
            <h4 class="media-heading">{{($restaurant->res_name)}}</h4>
            <small class="text-muted">Credits: S$0.00</small>
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">Navigation</h5>
    <ul class="nav nav-pills nav-stacked">
        <li class="@if(strpos(url()->current(), 'dashboard')) active @endif"><a href="{{url('dashboard')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
		<li class="@if(strpos(url()->current(), 'merchant-profile') || strpos(url()->current(), 'outlets')) active @endif"><a href="{{url('merchant-profile')}}"><i class="fa fa-cutlery"></i> <span>Profile</span></a></li>
        <li class="@if(strpos(url()->current(), 'notifications')) active @endif"><a href="{{url('notifications')}}">
        <?php $notif_count = Merchant\Notification::where(['merchant_id' => Auth::user()->id, 'seen' => 0])->limit(10)->get(); ?>
        @if( count($notif_count) > 0)
        <span class="pull-right badge badge-danger">{{ count($notif_count) }}</span>
        @endif
        <i class="fa fa-envelope-o"></i> 
        <span>Notifications</span></a></li>
        <li class="@if(strpos(url()->current(), 'campaign')) active @endif parent"><a href=""><i class="fa fa-tags"></i> <span>Campaigns</span></a>
            <ul class="children">
                <li class="@if(strpos(url()->current(), 'campaign/create')) active @endif"><a href="{{url('campaign/create')}}">Create New Campaign</a></li>
                <li class="@if(!strpos(url()->current(), 'campaign/create') && strpos(url()->current(), 'campaign')) active @endif"><a href="{{url('campaign')}}">View All Campaigns</a></li>
            </ul>
        </li>
		<li class="@if(strpos(url()->current(), 'tutorials')) active @endif"><a href="{{url('tutorials')}}"><i class="fa fa-file-text"></i> <span>Tutorial</span></a></li>
		<li class="@if(strpos(url()->current(), 'faqs')) active @endif"><a href="{{url('faqs')}}"><i class="fa fa-question-circle"></i> <span>FAQs</span></a></li>
		<li class="@if(strpos(url()->current(), 'terms-of-use')) active @endif"><a href="{{url('terms-of-use')}}"><i class="fa fa-list-ol"></i> <span>Terms Of Use</span></a></li>
        <li class="@if(strpos(url()->current(), 'privacy-policy')) active @endif"><a href="{{url('privacy-policy')}}"><i class="fa fa-list-ul"></i> <span>Privacy Policy</span></a></li>
		<li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
    </ul>
</div><!-- leftpanel -->
