<?php

if (function_exists('essb_dashboard_notification')) {
	essb_dashboard_notification('stumbleupon', 'StumbleUpon officially close at June 30th, 2018 - they are moving in with Mix. We are excited to announce that all versions since 5.6 support Mix.com as social sharing network. For now Mix.com does not have a share counter API - the button will use internal share counter (previous Stumble values cannot be moved).');
	
	if (essb_option_value('twitter_counters') == 'newsc') {
		$buttons = essb_dashboard_notification_dismiss_button();
		$buttons[] = array('text' => 'Visit share counter settings', 'url' => admin_url('admin.php?page=essb_options&tab=social&section=sharecnt&subsection'));
		essb_dashboard_notification('newsharecounts', 'The current Twitter share counter provider you are using NewShareCounts.com has closed its work. It is highly recommended to make a change inside your share counter options.', $buttons, 'error');
	}
}