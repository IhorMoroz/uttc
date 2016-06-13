<h1>Add Post</h1>
<form method="POST" action="/admin/main" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Title Post</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Title Post">
    </div>
    <div class="form-group">
        <label for="">Text Post</label>
        <textarea name="content" class="form-control" id="" placeholder="Text Post" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Status Post</label>
        <select name="status" id="">
            <?php if(count($status) > 0) : foreach($status as $item) : ?>
                <option value="<?=$item->id;?>"><?=$item->status;?></option>
            <?php endforeach; endif;?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tags Post</label>
        <input type="text" name="tags" class="form-control" id="" placeholder="Tags Post">
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Add Image (Индикатор загрузки я к сожалению не реализовал) </label>
        <input type="file" id="" name="images[]">
        <input type="file" id="" name="images[]">
        <input type="file" id="" name="images[]">
    </div>

    <button type="submit" id="addPost" class="btn btn-default">Submit</button>
</form>