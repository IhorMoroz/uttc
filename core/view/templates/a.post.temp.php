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
        <td>
            <?php
                switch($post->status){
                    case 2 :
                        echo 'Open';
                        break;
                    case 3 :
                        echo 'Closed';
                        break;
                    default :
                        echo 'New';
                }
            ?>
        </td>
        <td><?=count($post->comments);?></td>
        <td><?=count($post->images);?></td>
        <td><a href="/admin/edit/<?=$post->id;?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
        <td><a href="/admin/drop/<?=$post->id;?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; endif; ?>
</table>