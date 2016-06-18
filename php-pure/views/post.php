<?php // Its ugly code here, but fast;P
if($_POST){
  // create vars
  extract($_POST);
  $email = strip_tags($email);
  $post = strip_tags($post);
  $postage = compact(['email','post']);
  // save on firebase
  $r = $firebase->set('/posts/'.str_replace('.','',microtime(true)), $postage);
  //usleep(1);$firebase->set('/posts/'.str_replace('.','',microtime(true)), $postage);//testing postage over time
}
?>
<div class="page-header">
  <h1>Post <small>Submit your complaint in 140 characters</small></h1>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if(isset($r) && !!$r): ?>
      <div class="alert alert-success alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="lead">
          <strong>Hey bird!</strong> Your post was cawed succesfully!!
        </p>
        <p>
          Now your can see all the complains in <a href="./timeline">timeline</a>,
          <br/>
          you also can continue your cawing here
        </p>
      </div>
    <?php  endif; ?>
    <form method="post" class="jumbotron">
      <div class="form-group">
        <input required class="form-control text-center" maxlength="40" type="email" name="email" placeholder="Please tell me your email, little bird" value="<?=isset($email)?$email:null;?>">
      </div>
      <div class="form-group">
        <textarea required class="form-control text-center" maxlength="140"  name="post" rows="1" placeholder="Start your grumpy commentary"></textarea>
      </div>
      <button type="submit" class="btn btn-lg btn-block btn-info">Do a Grumpy Submit!</button>
    </form>
  </div>
</div>
