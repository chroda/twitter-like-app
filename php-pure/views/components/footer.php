      </div>
    <nav class='navbar navbar-collapse collapse navbar-default navbar-fixed-bottom'>
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?=__PATH__;?>">
            <img alt="<?=__APP_TITLE__?>" src="<?=CDN_DIR;?>/img/icons/twitter_square_angry_32x32.png" height="20"/>
          </a>
        </div>
        <ul class="nav navbar-nav">
          <li <?php $t='post';    echo rewrite(1)===$t?'class="active"':null;?>><a href="./<?=$t;?>"><?=ucfirst($t);?></a></li>
          <li <?php $t='timeline';echo rewrite(1)===$t?'class="active"':null;?>><a href="./<?=$t;?>"><?=ucfirst($t);?></a></li>
        </ul>

        <span class='navbar-text pull-right'>
          Made by
          <a href="http://chroda.com.br" target='_blank' style="text-decoration:none">
              <img src="<?=CDN_DIR;?>/img/chroda.png" height="20"/>
          </a>
          <a href="http://chroda.com.br" target='_blank' class="text-danger">
              chroda
          </a>
          <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
        </span>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?=$_SESSION['social']['github'];?>"><i class="fa fa-github" aria-hidden="true"></i></a></li>
          <li><a href="<?=$_SESSION['social']['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="<?=$_SESSION['social']['facebook'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><span class='navbar-text'>&mdash;</span></li>
        </ul>
      </div>
    </nav>
  </body>
  <script src="./vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
  <script src="./vendor/components/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo CDN_DIR;?>js/events.js" type="text/javascript"></script>
</html>
