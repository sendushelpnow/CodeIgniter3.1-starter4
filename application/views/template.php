<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
	</head>
	<body>
        <div id="container">
        <div id="topnav">
          <ul>
            <li><a href="/Welcome">Home</a></li>
            <li><a href="/Catalog">Catalog</a></li>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="/roles/actor/Guest">Guest</a></li>
                        <li><a href="/roles/actor/User">User</a></li>
                        <li><a href="/roles/actor/Admin">Admin</a></li>
            </ul>
          </ul>
        </div>
			{content}
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. 
				{ci_version}</p>
        </div>
	</body>
</html>
