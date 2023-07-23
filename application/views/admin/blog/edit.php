<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Edit Post</span>
    </h1>
    <span class="mb-3">Edit your blog Post</span>
    <?php $this->load->admin_view('widgets/alert'); ?>
    <div class="mt-3 card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo($post['id']); ?>"/>
                            <label class="form-label <?php echo_if('text-danger', form_error('title')); ?>" for="title">Post Title <span class="text-danger">*</span></label>
                            <?php echo form_error( 'title', '<small class="text-danger float-end">', '</small>' ) ?>
                            <input class="form-control <?php echo_if('is-invalid', form_error('title')); ?>" type="text" name="title" id="title" value="<?php echo set_value('title', $post['title']); ?>" placeholder="Enter Post Title"/>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label class="form-label <?php echo_if('text-danger', form_error('permalink')); ?>" for="permalink">Permalink (Leave Empty to Auto Generate)</label>
                            <?php echo form_error( 'permalink', '<small class="text-danger float-end">', '</small>' ) ?>
                            <input class="form-control <?php echo_if('is-invalid', form_error('permalink')); ?>" type="text" name="permalink" id="permalink" value="<?php echo set_value('permalink', $post['permalink']); ?>" placeholder="Enter Post Permalink"/>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('post_description')); ?>" for="post_description">SEO Post Description <span class="text-danger">*</span></label>
                        <?php echo form_error( 'post_description', '<small class="text-danger float-end">', '</small>' ) ?>
                        <textarea rows="3" class="form-control <?php echo_if('is-invalid', form_error('post_description')); ?>" name="post_description" id="post_description" placeholder="Enter SEO Post Description"><?php echo set_value('post_description', $post['post_description']); ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                    <label class="form-label <?php echo_if('text-danger', form_error('post_keywords')); ?>" for="post_keywords">SEO Post Tags (Comma Separated)<span class="text-danger">*</span></label>
                        <?php echo form_error( 'post_keywords', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control <?php echo_if('is-invalid', form_error('post_keywords')); ?>" type="text" name="post_keywords" id="post_keywords" value="<?php echo set_value('post_keywords', $post['post_keywords']); ?>" placeholder="Enter Post Tags Comma Separated"/>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('post_thumb')); ?>" for="post_thumb">Post Thumbnail <span class="text-danger">*</span></label>
                        <div><img style="max-width: 120px; height: auto; border-radius: 5px" src="<?php echo base_url("/uploads/default/blog/".$post['post_image']); ?>"/></div>
                        <input type="hidden" name="old_image" value="<?php echo($post['post_image']); ?>"/>
                        <label class="form-label">Select Post Image (698 x 465 Recommended)</label>
                        <?php echo form_error( 'post_thumb', '<small class="text-danger float-end">', '</small>' ) ?>
                        <input class="form-control form-control-lg" name="post_thumb" id="post_thumb" type="file" accept=".png, .jpg, .jpeg">
                        <label class="form-label"><small>Allowed File Types: PNG, JPG, JPEG Only</small></label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('body')); ?>" for="body">Post Content <span class="text-danger">*</span></label>
                        <?php echo form_error( 'body', '<small class="text-danger float-end">', '</small>' ) ?>
                        <textarea rows="50" class="form-control editor <?php echo_if('is-invalid', form_error('body')); ?>" name="body" id="body" placeholder="Enter the Post Content"><?php echo set_value('body', $post['body']); ?></textarea>
                        <small class="mt-2 text-muted d-block">Use the Editor to compose your post, or you may use HTML.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label <?php echo_if('text-danger', form_error('publish')); ?>" for="publish">Publish</label>
                        <?php echo form_error( 'publish', '<small class="text-danger float-end">', '</small>' ) ?>
                        <div class="form-check form-switch form-switch-md float-end">
                        <?php if($this->input->post('submit')) { ?>
                            <input id="publish" class="form-check-input" <?php echo_if('checked', $this->input->post('publish')) ?> name="publish" type="checkbox">
                       <?php } else { ?>
                            <input id="publish" class="form-check-input" <?php echo_if('checked', $post['status']) ?> name="publish" type="checkbox">
                        <?php } ?>
                        </div>
                        <small class="text-muted d-block">Only Published Posts Are Displayed on Front-End. You can just Save it & Publish it Later</small>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="submit" value="true" />
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    <a href="<?php echo admin_base_url('blog') ?>" class="btn btn-danger btn-lg">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>