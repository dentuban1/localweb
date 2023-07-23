<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">TLDs</span>
    </h1>
    <span class="mb-3">List of all TLDs on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="tld-search-area">
    <div class="input-group tld-search-sec">
    <form class="row g-1" method="POST" action="<?php echo(admin_base_url('tlds/page')); ?>">
        <div class="col-auto">
            <input type="text" name="query" class="form-control" value="<?php echo($query); ?>" placeholder="Search TLD's"/>
        </div>
        <div class="col-auto">
        <select name="type" class="form-select">
            <option value="all"<?php echo($type=='all' ? ' selected' : ''); ?>>All</option>
            <option value="tld"<?php echo($type=='tld' ? ' selected' : ''); ?>>TLD</option>
            <option value="whois"<?php echo($type=='whois' ? ' selected' : ''); ?>>Whois</option>
            <option value="price"<?php echo($type=='price' ? ' selected' : ''); ?>>Price</option>
        </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
    </div>
        <a href="<?php echo admin_base_url('tlds/add') ?>" class="mr-2 btn btn-primary"><i data-feather="plus"></i> Add TLD</a>
    </div>

    <div id="scrollArea" x-data="window.bitflan.components.tlds_component()" class="mt-3 card flex-fill">
        <div class="table-responsive">
            <table class="table my-0 table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Extension</th>
                        <th>WHOIS Server</th>
                        <th>Price</th>
                        <th>Is Main</th>
                        <th>Status</th>
                        <th>Suggested</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($tlds)) { foreach($tlds as $tld) { ?>
                    <tr data-id="<?php echo $tld['id'] ?>" class="tld-sortable">
                        <td><?php echo $tld['id'] ?></td>
                        <td><?php echo $tld['tld']; ?></td>
                        <td><?php echo $tld['whois_server']; ?></td>
                        <td>
                            <span><?php echo $tld['price'] ?> USD</span>
                        </td>
                        <td>
                            <div class="form-check form-switch form-switch-sm">
                                <input class="form-check-input" type="radio" @change="updateMainStatus('<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['is_main']) { echo 'checked'; } ?> name="main_tld">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-switch-sm">
                                <input class="form-check-input" type="checkbox" @change="updateStatus('<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['status']) { echo 'checked'; } ?> name="tld_status">
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch form-switch-sm">
                                <input class="form-check-input" type="checkbox" @change="updateSuggested('<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['is_suggested']) { echo 'checked'; } ?> name="tld_suggested">
                            </div>
                        </td>
                        <td>
                            <a href="<?php echo admin_base_url('tlds/edit/' . $tld['id']) ?>" class="btn btn-primary btn-sm"><i data-feather="edit-2"></i> Edit</a>
                            <a data-confirm="<?php echo admin_base_url('tlds/delete/' . $tld['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton">Delete</a>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if($total_pages>1) { ?>
	<nav class="row" aria-label="Page navigation">
        <div class="col">
            <?php if(count($tlds)) { 
            echo "Showing $offset to " . end($tlds)['id'] . " out of $total_rows TLD's";
            ?>
        </div>
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                <?php if($page != 1) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo admin_base_url('tlds/page/1' . $qs) ?>" tabindex="-1" aria-label="Previous">
                            <span aria-hidden="true">1 ..</span>			
                        </a>
                    </li>
                <?php } if($page > 3) { ?>
                    <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/' . ($page-2) . $qs) ?>"><?php echo ($page-2) ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/' . ($page-1) . $qs) ?>"><?php echo ($page-1) ?></a></li>
                <?php } else if($page > 2) { ?>
                   <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/' . ($page-1) . $qs) ?>"><?php echo ($page-1) ?></a></li>
                <?php } ?>
                    <li class="page-item active"><a class="page-link" href="<?php echo admin_base_url('tlds/page/'. $page . $qs) ?>"><?php echo $page ?></a></li>
                <?php if($page+3 < $total_pages) {  ?>    
                    <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/'. ($page + 1) . $qs) ?>"><?php echo $page + 1 ?></a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/'. ($page + 2) . $qs) ?>"><?php echo $page + 2 ?></a></li>
                <?php } else if($page+2 < $total_pages) { ?>
                    <li class="page-item"><a class="page-link" href="<?php echo admin_base_url('tlds/page/'. ($page + 1) . $qs) ?>"><?php echo $page + 1 ?></a></li>
                <?php } if($page != $total_pages) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo admin_base_url('tlds/page/'.$total_pages . $qs) ?>" aria-label="Next">
                            <span aria-hidden="true">.. <?php echo($total_pages); ?></span>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </nav>
        </div>
	</nav>
    <?php } ?>
	<?php } ?>
</div>