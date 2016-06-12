<h1>Edit Post</h1>
<form method="POST" action="/admin/main" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$post[0]->id;?>">
    <input type="hidden" name="keyImg" value="<?=$post[0]->key_img;?>">
    <div class="form-group">
        <label for="">Title Post</label>
        <input type="text" class="form-control" value="<?=$post[0]->title;?>" name="title" id="" placeholder="Title Post">
    </div>
    <div class="form-group">
        <label for="">Text Post</label>
        <textarea name="content" class="form-control" id="" placeholder="Text Post" cols="30" rows="10"><?=$post[0]->content;?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Status Post</label>
        <select name="status" id="">
            <?php if(count($status) > 0) : foreach($status as $item) : ?>
                <?php if($post[0]->status == $item->id) { ?>
                    <option selected value="<?=$item->id;?>"><?=$item->status;?></option>
                <?php }else{ ?>
                    <option value="<?=$item->id;?>"><?=$item->status;?></option>
                <? } ?>
            <?php endforeach; endif;?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tags Post</label>
        <input type="text" name="tags" value="<?=$post[0]->tags;?>" class="form-control" id="" placeholder="Tags Post">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Add Image</label>
        <input type="file" id="" name="images[]">
        <input type="file" id="" name="images[]">
        <input type="file" id="" name="images[]">
        <?php if($post[0]->images) : foreach($post[0]->images as $image) : ?>
            <div class="boxImg">
                <img src="/img/<?=$image->name;?>" alt="">
            </div>
        <?php endforeach; endif;?>
    </div>

    <button type="submit" id="addPost" class="btn btn-default">Submit</button>
</form>