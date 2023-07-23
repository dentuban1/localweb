<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">TLDs Order</span>
    </h1>
    <span class="mb-3">List of all Active TLDs on your website.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="tld-search-area">
    <div class="input-group tld-search-sec">
    </div>
        <a href="<?php echo admin_base_url('tlds') ?>" class="mr-2 btn btn-primary"><i data-feather="plus"></i> Manage TLD's</a>
    </div>
    <div id="scrollArea" x-data="window.bitflan.components.tlds_component()" x-init="new Clusterize({ scrollId: 'scrollArea', contentId: 'sortable-list' })" class="mt-3 card flex-fill">
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
                    </tr>
                </thead>
                <tbody id="sortable-list">
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
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>