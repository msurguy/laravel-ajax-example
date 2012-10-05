
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{ Asset::container('bootstrapper')->styles(); }}
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <div id="hero-content">
	        <h1>Hello, Laravel world!</h1>
	        <h2 class="text-warning">This is an example page of calling AJAX in Laravel using Bootsraper bundle and <a href="https://github.com/eldarion/bootstrap-ajax">Bootstrap AJAX by Github user Eldarion</a> , very simple way to implement ajax calls in your application</h2>
        </div>
      </div>

      <!-- Example row of columns -->
      <div class="row">
      	<div class="span4">
          <h2>Refresh data after submission</h2>
          <p>Pull in content when some action is done (for example new vote count after submitting a vote)</p>

          <p class="votecount lead" data-refresh-url="votes">12 Votes</p>
          
          <p>
          	<a href="vote" class="btn ajax votebtn" data-method="post" data-refresh=".votecount" data-replace=".votebtn">
			  	<i class="icon icon-heart"></i> Submit Vote &raquo;
			</a>
		  </p>
        </div>
        <div class="span4">
          	<h2>Replace content DEMO</h2>
          	<p>Click the button to replace the content in the hero unit with AJAX loaded content </p>
			<a href="replace" class="btn ajax" data-method="post" data-replace="#hero-content">
		  		<i class="icon icon-refresh"></i> Replace Content in HERO unit &raquo;
			</a>
        </div>
        <div class="span4">
          <h2>Append content DEMO</h2>
            <p>Click the button to append the content in the hero unit with AJAX loaded content </p>
          	<p>
				<a href="replace" class="btn ajax" data-method="post" data-append="#hero-content">
			  		<i class="icon icon-plus"></i> Append Content to HERO unit &raquo;
				</a>
			</p>
       	</div>
      </div>

      <hr>

      <div class="row">
        <div class="span4">
	        <h2>AJAX Form Example</h2>
			<form class="form ajax" action="submit" data-replace="#submit-status" method="post">
			{{ Form::label('name', 'Name');}}
			{{ Form::text('name', null, array('class' => 'span3', 'placeholder' => 'Type your name...'));}}
			{{ Form::block_help('Example block-level help text here.');}}
			{{ Form::labelled_checkbox('checker', 'Check me out');}}
			{{ Form::submit('Submit');}}
			</form>
			<p id="submit-status"></p>
		</div>
        <div class="span4">
          <h2>Redirect DEMO</h2>
            <p>Click the button to redirect your user instead via AJAX. The route "redirect" sends over a variable called "location" with the location where to redirect the user</p>
          	<p>
				<a href="redirect" class="btn ajax" data-method="post">
			  		<i class="icon icon-share"></i> Redirect the user &raquo;
				</a>
			</p>
       	</div>
       	<div class="span4">
          <h2>Content Filler</h2>
            <p>This space has been purposefully filled so that the FORM results on the left are visible without scrolling</p>
          	{{ HTML::image('img/maks.jpg', 'author', array('class' => 'thumbnail')); }}
       	</div>

      </div>

      <hr>

      <footer>
        <p>Made by <a href="http://maxoffsky.com"> Maks</a> 2012, open source.</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ Asset::container('bootstrapper')->scripts(); }}
    {{ HTML::script('js/bootstrap-ajax.js');}}

  </body>
</html>
