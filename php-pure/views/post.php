<div class="page-header">
  <h1>Post <small>Submit your complaint in 140 characters</small></h1>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form method="post" action="">
      <div class="form-group">
        <input required class="form-control text-center" maxlength="40" type="email" name="email" placeholder="Please tell me your email, little bird">
      </div>
      <div class="form-group">
        <textarea required class="form-control text-center" maxlength="140"  name="post" rows="1" placeholder="Start your caw-caw commentary"></textarea>
      </div>
      <button type="submit" class="btn btn-lg btn-block btn-default">Submit</button>
    </form>
    <?php
    // Its ugly code here, but fast;P
    if($_POST){
      // create vars
      extract($_POST);
      $email = strip_tags($email);
      $post = strip_tags($post);

      $postage = compact(['email','post']);

      // save on firebase
      $firebase->set('/posts/'.time(), $postage);
      $firebase->set('/posts/'.time(), $postage);
      $firebase->set('/posts/'.time(), $postage);
      $firebase->set('/posts/'.time(), $postage);
      $firebase->set('/posts/'.time(), $postage);
      $firebase->set('/posts/'.time(), $postage);
      echo '<br/><div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Hey bird!</strong> Your post are done, check the
        <a href="./timeline">timeline</a>!
      </div>';
    }?>
  </div>
</div>
