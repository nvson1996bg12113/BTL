<input type="button" name="" onclick="RequestLoginFB()" value="DANG NHAP" id="btn_login">
<span id="user_name" style="display: none;"></span>


<form method="post" action="https://graph.facebook.com/2026921940932886/feed">
	<input type="text" name="messsage">
	<input type="hidden" name="access_token" id="access_token">
	<button type="submit" id="submit">Send</button>
</form>