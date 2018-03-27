<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
  </head>
	<body>
        <div id="container">
        <div id="topnav">
          <ul>
            <li><a href="/Welcome">Home</a></li>
            <li><a href="/Catalog">Catalog</a></li>
            <li><a href="/Customization">Customization</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  <li><a href="/roles/actor/Guest">Guest</a></li>
                  <li><a href="/roles/actor/User">User</a></li>
                  <li><a href="/roles/actor/Admin">Admin</a></li>
              </ul>
            </li>
          </ul>
        </div>
			{content}
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
				{ci_version}</p>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="/assets/js/bootstrap.min.js"></script>
	</body>
</html>
