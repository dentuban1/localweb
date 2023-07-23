<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Blog</span>
    </h1>
    <span class="mb-3">List of all Blog Posts on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="d-flex justify-content-end">
        <a href="<?php echo admin_base_url('blog/add') ?>" class="btn btn-primary"><i data-feather="plus"></i> Add New Post</a>
    </div>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>Thumb</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Permalink</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                <?php if(count($posts)) {
                    foreach($posts as $post) { ?>
                <tr>
                    <td><img style="max-width: 120px; height: auto; border-radius: 5px" src="<?php echo base_url("/uploads/default/blog/".$post['post_image']); ?>"/></td>
                    <td><a target="_blank" href="<?php echo base_url('blog/post/' . $post['permalink']); ?>"><?php echo $post['title']; ?></a></td>
                    <td><?php echo $post['post_description']; ?></td>
                    <td><a target="_blank" href="<?php echo base_url('blog/post/' . $post['permalink']); ?>"><?php echo $post['permalink']; ?></a></td>
                    <td>
                        <?php if($keywords = explode(',',$post['post_keywords'])) {
                        foreach($keywords as $keyword) { ?>
                            <span class="badge bg-primary"><?php echo($keyword); ?></span>
                        <?php }
                        }
                        ?>
                    </td>
                    <td>     
                    <?php echo ($post['status']) ? "<span class='badge bg-success'>Published</span>" : "<span class='badge bg-primary'>Saved</span>"; ?>
                    </td>
                    <td>
                        <a href="<?php echo admin_base_url('blog/edit/' . $post['id']) ?>" class="btn btn-primary btn-sm"><i data-feather="edit-2"></i> Edit</a>
                        <a data-confirm="<?php echo admin_base_url('blog/delete/' . $post['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton"><i data-feather="x"></i></a>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="6">No Blog Posts Found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>