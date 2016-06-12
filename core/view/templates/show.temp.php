<h2><?=$post[0]->title;?></h2>
<div class="show-box-img">
    <?php if(count($post[0]->images) > 0) : foreach($post[0]->images as $image) : ?>
        <img src="/img/<?=$image->name;?>" alt="">
    <?php endforeach; endif; ?>
</div>
<div class="box-text-blog">
    <p><?=$post[0]->content;?></p>
</div>
<div class="box-comments">
    <h3>Comments</h3>
    <?php foreach($post[0]->comments as $comment) : ?>
        <div class="comment">
            <p class="email"><?=$comment->email;?></p>
            <p class="text"><?=$comment->content;?></p>
            <hr/>
        </div>
    <?php endforeach; ?>
</div>
<form action="index/" class="form-comment" method="POST">
    <h3>Add Comment</h3>
    <input type="hidden" name="id" value="<?=$post[0]->id;?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Text</label>
        <textarea name="text" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>