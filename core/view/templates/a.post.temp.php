<table class="table table-hover list-posts">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Images</th>
        <th>Edit</th>
        <th>Drop</th>
    </tr>
    <?php $i = 1;?>
    <?php if(count($posts) > 0) : foreach($posts as $post) : ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$post->title;?></td>
        <td><?=$post->status_word->status;?></td>
        <td><?=count($post->comments);?></td>
        <td><?=count($post->images);?></td>
        <td><a href="/admin/edit/<?=$post->id;?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td><a href="/admin/drop/<?=$post->id;?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; endif; ?>
</table>