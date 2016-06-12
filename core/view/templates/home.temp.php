<div class="row">
    <?php if(count($posts) > 0) : foreach($posts as $post) : ?>
        <div class="col-sm-6 col-md-4" >
            <div class="thumbnail">
                <img src="/img/<?=$post->images[0]->name;?>" alt="...">
                <div class="caption">
                    <h3><?=$post->title;?></h3>
                    <p><a href="/index/show/<?=$post->id;?>" class="btn btn-primary" role="button">Show</a></p>
                </div>
            </div>
        </div>
    <?php endforeach; endif; ?>
</div>