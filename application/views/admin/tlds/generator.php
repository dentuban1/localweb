<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">Domain Generator TLDs</span>
    </h1>
    <span class="mb-3">Add / Remove / Update TLDs for the Domain Generator.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>Extension</th>
                    <th>Default Status</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                <?php if(count($tlds_generate)) { foreach($tlds_generate as $tld) { ?>
                <tr data-id="<?php echo $tld['id'] ?>" class="tld-sortable">
                    <td><?php echo $tld['tld']; ?></td>
                    <td>
                        <div class="form-check form-switch form-switch-sm">
                            <input class="form-check-input" type="checkbox" @change="fetch(admin_base_url + 'domain_generator/default_status/<?php echo $tld['id'] ?>')" value="<?php echo $tld['id'] ?>" <?php if($tld['default']) { echo 'checked'; } ?>>
                        </div>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</div>