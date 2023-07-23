<div class="p-0 container-fluid">
    <h1 class="h3">
        <span class="ml-2">WHOIS TLD Suggestions</span>
    </h1>
    <span class="mb-3">Add / Remove / Update Suggestions for the WHOIS Information Tool.</span>

    <?php $this->load->admin_view('widgets/alert'); ?>

    <div class="d-flex justify-content-end">
        <form class="row align-items-end" method="POST">
            <div class="col-auto">
                <input class="form-control" name="tld" type="text" list="data-list" placeholder="Enter TLD" autocomplete="off"/>
                <datalist id="data-list">
                    <?php foreach($tlds as $tld) { 
                    if(!in_array($tld['tld'], array_column($tlds_whois, 'tld'))) { ?>
                        <option value="<?php echo $tld['tld'] ?>"></option>
                    <?php } } ?>
                </datalist>
            </div>
            <div class="col-auto">
                <input type="hidden" name="submit" value="true">
                <button type="submit" class="btn btn-primary"><i data-feather="plus"></i> Add</button>
            </div>
        </form>
    </div>

    <div class="mt-3 card flex-fill">
        <table class="table my-0 table-hover">
            <thead>
                <tr>
                    <th>Extension</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody id="sortable-list">
                <?php if(count($tlds_whois)) { foreach($tlds_whois as $tld) { ?>
                <tr data-id="<?php echo $tld['id'] ?>" class="tld-sortable">
                    <td><?php echo $tld['tld']; ?></td>
                    <td>
                        <a data-confirm="<?php echo admin_base_url('domain_whois/delete/' . $tld['id']); ?>" href="#" class="btn btn-danger btn-sm deleteButton">Delete</a>
                    </td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="6">No TLDs Found...</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>