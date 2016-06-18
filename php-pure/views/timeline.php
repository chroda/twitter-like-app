<?php $posts = $firebase->get('/posts/');?>
<div class="page-header">
  <h1>Timeline <small>See all the complains</small></h1>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <ul class="list-group">
      <?php if($posts !== 'null'): // firebase uses a string "null";
        $c=0;
        foreach (json_decode($posts) as $microtime => $post):
          $date = date('d-m-Y H:i:s l',substr($microtime,0,10));
          $classBlockquote = $c++%2?null:'class="blockquote-reverse"';
        ?>
        <li class="list-group-item">
          <blockquote <?=$classBlockquote;?>>
            <p><?=$post->text;?></p>
            <footer>
              <a href="maito:<?=$post->email;?>" target="_blank"><?=$post->email;?></a>
              in <strong><?=$date;?></strong>
            </footer>
          </blockquote>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li class="list-group-item well text-center lead">Chill Out!! No complaints yet</li>
    <?php endif; ?>
    </ul>
  </div>
</div>
