<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('page-title') | Blurbes Dashboard</title>

        @include('layouts.blurbby-merchant-css')

        @yield('custom-css')

    </head>

    <body>
    <?php $camps = Merchant\Notification::select('campaign.id as cid', 'campaign.campaign_name', 'campaign.merchant_id as cmid', 'notification.*')
            ->leftJoin('campaign', 'notification.campaign_id', '=', 'campaign.id')
            ->where('notification.merchant_id', Auth::user()->id)
            ->orderBy('notification.updated_at', 'DESC')
            ->get()
            ->toArray(); ?>
        @include('layouts.nav-merchant', ['camps'=> $camps])
        
        @yield('body-contents')

        @include('layouts.blurbby-merchant-js')

        @yield('custom-js')
    </body>
</html>
