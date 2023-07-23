<?php
$controller = $this->router->fetch_class(); ?>

<div class="headerBottom mainPadding">
    <?php if($this->options->get('search-status')) { ?>
    <a href="<?php echo base_url(); ?>" class="headerBottomBlocks <?php echo $controller == '' || $controller == 'search' ? 'active' : '' ?>" title="<?php echo lang('domain_search_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="58.138" height="52.004" viewBox="0 0 58.138 52.004"><g transform="translate(0 -0.5)"><path d="M232,168.5a9.992,9.992,0,1,0,9.992,9.992A10,10,0,0,0,232,168.5Zm0,17.714a7.721,7.721,0,1,1,7.721-7.721A7.73,7.73,0,0,1,232,186.214Zm0,0" transform="translate(-196.796 -148.924)"/><path d="M301.139,211.5a1.135,1.135,0,0,0,0,2.271,2.842,2.842,0,0,1,2.838,2.838,1.135,1.135,0,1,0,2.271,0A5.115,5.115,0,0,0,301.139,211.5Zm0,0" transform="translate(-265.939 -187.044)"/><path d="M44.906,71.11a1.136,1.136,0,1,0-2.017,1.044l3.057,5.9a1.135,1.135,0,0,0,2.032-.031l1.851-3.853,2.01,3.883a1.136,1.136,0,0,0,1.009.613h.017a1.137,1.137,0,0,0,1.007-.644l2.836-5.9a1.135,1.135,0,1,0-2.047-.983l-1.851,3.853L50.8,71.11a1.135,1.135,0,0,0-2.032.031l-1.85,3.853Zm0,0" transform="translate(-37.906 -62.048)"/><path d="M117.123,2.771a1.135,1.135,0,0,0,.8-1.938,1.135,1.135,0,1,0-.8,1.938Zm0,0" transform="translate(-102.818)"/><path d="M58.137,20.031V5.042A4.547,4.547,0,0,0,53.6.5H19.075a1.136,1.136,0,0,0,0,2.271H53.6a2.274,2.274,0,0,1,2.271,2.271V20.031A2.274,2.274,0,0,1,53.6,22.3h-5.45c-.033,0-.065,0-.1,0a14.84,14.84,0,0,0-7.982-6.674l1.683-3.5,2.01,3.883a1.134,1.134,0,0,0,1.008.613h.017a1.136,1.136,0,0,0,1.006-.644l2.836-5.9a1.135,1.135,0,0,0-2.047-.983l-1.85,3.853L42.72,9.062a1.136,1.136,0,0,0-2.032.031l-1.851,3.853-2.01-3.883a1.136,1.136,0,0,0-2.017,1.044l2.513,4.855a14.784,14.784,0,0,0-6.151.405l2.541-5.291a1.135,1.135,0,0,0-2.047-.983l-1.851,3.853-2.01-3.883a1.136,1.136,0,0,0-2.032.031l-1.85,3.853-2.01-3.883A1.136,1.136,0,0,0,19.9,10.106l3.057,5.9a1.135,1.135,0,0,0,2.032-.031l1.851-3.852,2.01,3.883a1.109,1.109,0,0,0,.12.181,14.86,14.86,0,0,0-6.609,6.11H4.542a2.274,2.274,0,0,1-2.271-2.271V5.042A2.274,2.274,0,0,1,4.542,2.771H9.2A1.135,1.135,0,0,0,9.2.5H4.542A4.547,4.547,0,0,0,0,5.042V20.031a4.547,4.547,0,0,0,4.542,4.542H21.31A14.758,14.758,0,0,0,42.552,42.366l9.012,9.012a3.85,3.85,0,0,0,5.445-5.446l-3.541-3.541A1.135,1.135,0,1,0,51.863,44L55.4,47.539a1.579,1.579,0,0,1-2.233,2.234l-8.714-8.714a14.748,14.748,0,0,0,4.634-16.486h4.5a4.547,4.547,0,0,0,4.542-4.542ZM35.2,42.059A12.491,12.491,0,1,1,47.691,29.569,12.5,12.5,0,0,1,35.2,42.059Zm0,0" /><path d="M430.423,343.114a1.135,1.135,0,1,0,.8-.333A1.144,1.144,0,0,0,430.423,343.114Zm0,0" transform="translate(-381.254 -303.415)"/></g></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('domain_search_name') ?></div>
    </a>
    <?php } ?>
    
    <?php if($this->options->get('generator-status')) { ?>
    <a href="<?php echo base_url('domain-generator'); ?>" class="headerBottomBlocks <?php echo $controller == 'domain_generator' ? 'active' : '' ?>" title="<?php echo lang('domain_generator_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="51.761" height="51.761" viewBox="0 0 51.761 51.761"><g transform="translate(0)"><path d="M236.8,35.566A2.433,2.433,0,1,0,234.367,38,2.436,2.436,0,0,0,236.8,35.566Zm-3.349,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,233.45,35.566Z" transform="translate(-208.486 -29.783)" /><path d="M45.978,20.1a5.77,5.77,0,0,0-1.927.329.758.758,0,0,0,.505,1.43,4.268,4.268,0,1,1-2.086,1.6.758.758,0,1,0-1.246-.864,5.781,5.781,0,0,0-.492.86H38.124a12.412,12.412,0,0,0-1.869-4.5L38.1,17.1a5.783,5.783,0,1,0-3.441-3.441l-1.85,1.85a12.414,12.414,0,0,0-4.5-1.869v-2.61a5.783,5.783,0,1,0-4.866,0v2.61a12.414,12.414,0,0,0-4.5,1.869l-1.85-1.85a5.782,5.782,0,0,0-8.128-7.1.758.758,0,1,0,.708,1.341,4.266,4.266,0,1,1-1.823,1.86A.758.758,0,1,0,6.5,9.074,5.784,5.784,0,0,0,13.657,17.1l1.85,1.85a12.413,12.413,0,0,0-1.869,4.5h-2.61a5.783,5.783,0,1,0,0,4.866h2.61a12.414,12.414,0,0,0,1.869,4.5l-1.85,1.85A5.783,5.783,0,1,0,17.1,38.1l1.85-1.85a12.414,12.414,0,0,0,4.5,1.869v2.61a5.783,5.783,0,1,0,4.866,0v-2.61a12.414,12.414,0,0,0,4.5-1.869l1.85,1.85A5.783,5.783,0,1,0,38.1,34.663l-1.85-1.85a12.413,12.413,0,0,0,1.869-4.5h2.61A5.782,5.782,0,1,0,45.978,20.1Zm-16.3,16.071a11.619,11.619,0,0,0,1.6-2.981,14.511,14.511,0,0,1,2.061.721A10.984,10.984,0,0,1,29.676,36.169Zm-7.59-20.576a11.621,11.621,0,0,0-1.6,2.981,14.509,14.509,0,0,1-2.061-.721A10.985,10.985,0,0,1,22.085,15.592Zm10.4,9.53a21.765,21.765,0,0,0-.739-5.105,15.448,15.448,0,0,0,2.679-1,10.912,10.912,0,0,1,2.392,6.1H32.488ZM26.639,15.049a5.454,5.454,0,0,1,2.709,2.88c.156.312.3.641.435.983a21.466,21.466,0,0,1-3.144.334Zm-1.516,4.2a21.467,21.467,0,0,1-3.144-.334c.135-.342.279-.671.435-.983a5.454,5.454,0,0,1,2.709-2.88Zm0,1.518v4.358H20.791a20.19,20.19,0,0,1,.7-4.759,22.9,22.9,0,0,0,3.63.4Zm0,5.874V31a22.9,22.9,0,0,0-3.63.4,20.185,20.185,0,0,1-.7-4.759Zm0,5.876v4.2a5.454,5.454,0,0,1-2.709-2.88c-.156-.312-.3-.641-.435-.983A21.452,21.452,0,0,1,25.122,32.515Zm1.516,0a21.469,21.469,0,0,1,3.144.334c-.135.342-.279.671-.435.983a5.454,5.454,0,0,1-2.709,2.88Zm0-1.518V26.639H30.97a20.191,20.191,0,0,1-.7,4.759A22.887,22.887,0,0,0,26.639,31Zm0-5.874V20.764a22.9,22.9,0,0,0,3.63-.4,20.185,20.185,0,0,1,.7,4.759Zm6.7-7.27a14.509,14.509,0,0,1-2.061.721,11.617,11.617,0,0,0-1.6-2.981,10.983,10.983,0,0,1,3.666,2.26ZM17.333,19.019a15.437,15.437,0,0,0,2.679,1,21.76,21.76,0,0,0-.739,5.105H14.942A10.911,10.911,0,0,1,17.333,19.019Zm1.94,7.619a21.759,21.759,0,0,0,.739,5.105,15.447,15.447,0,0,0-2.679,1,10.912,10.912,0,0,1-2.392-6.1Zm-.854,7.27a14.514,14.514,0,0,1,2.061-.721,11.615,11.615,0,0,0,1.606,2.982,10.985,10.985,0,0,1-3.667-2.261Zm16.008-1.167a15.441,15.441,0,0,0-2.678-1,21.768,21.768,0,0,0,.738-5.106h4.331A10.912,10.912,0,0,1,34.428,32.742ZM37.075,8.653a4.266,4.266,0,1,1,0,6.033A4.253,4.253,0,0,1,37.075,8.653Zm-1.669,6.406a5.759,5.759,0,0,0,1.3,1.3L35.327,17.73a12.593,12.593,0,0,0-1.3-1.3ZM21.614,5.783a4.266,4.266,0,1,1,4.266,4.266,4.271,4.271,0,0,1-4.266-4.266Zm3.35,5.709a5.759,5.759,0,0,0,1.833,0v1.94q-.454-.033-.917-.034t-.917.034Zm-9.906,4.862a5.759,5.759,0,0,0,1.3-1.3l1.376,1.376a12.6,12.6,0,0,0-1.3,1.3ZM5.783,30.147a4.266,4.266,0,1,1,4.266-4.266,4.271,4.271,0,0,1-4.266,4.266Zm5.709-3.35a5.759,5.759,0,0,0,0-1.833h1.94q-.033.454-.034.917t.034.917Zm3.194,16.311a4.264,4.264,0,1,1,0-6.033A4.271,4.271,0,0,1,14.686,43.108ZM16.354,36.7a5.76,5.76,0,0,0-1.3-1.3l1.376-1.376a12.583,12.583,0,0,0,1.3,1.3Zm13.792,9.275a4.266,4.266,0,1,1-4.266-4.266A4.271,4.271,0,0,1,30.147,45.978ZM26.8,40.269a5.759,5.759,0,0,0-1.833,0v-1.94q.454.033.917.034t.917-.034Zm13.295-4.441a4.264,4.264,0,1,1-3.017,1.248A4.252,4.252,0,0,1,40.092,35.828ZM36.7,35.407a5.76,5.76,0,0,0-1.3,1.3l-1.376-1.376a12.6,12.6,0,0,0,1.3-1.3Zm1.626-8.61q.033-.454.034-.917t-.034-.917h1.94a5.783,5.783,0,0,0,0,1.833Z" /><path d="M435.6,234.367a2.433,2.433,0,1,0-2.433,2.433A2.436,2.436,0,0,0,435.6,234.367Zm-3.35,0a.917.917,0,1,1,.917.917A.918.918,0,0,1,432.249,234.367Z" transform="translate(-387.188 -208.486)" /><path d="M35.566,231.934A2.433,2.433,0,1,0,38,234.367,2.436,2.436,0,0,0,35.566,231.934Zm0,3.35a.917.917,0,1,1,.917-.917A.918.918,0,0,1,35.566,235.284Z" transform="translate(-29.783 -208.486)" /><path d="M231.934,433.166a2.433,2.433,0,1,0,2.433-2.433A2.436,2.436,0,0,0,231.934,433.166Zm3.35,0a.917.917,0,1,1-.917-.917A.918.918,0,0,1,235.284,433.166Z" transform="translate(-208.486 -387.188)" /><path d="M374.949,377.383a2.433,2.433,0,1,0-1.72-.713A2.417,2.417,0,0,0,374.949,377.383ZM374.3,374.3a.917.917,0,1,1,0,1.3A.913.913,0,0,1,374.3,374.3Z" transform="translate(-334.857 -334.858)" /><path d="M95.514,95.514a2.436,2.436,0,1,0-1.72.711A2.436,2.436,0,0,0,95.514,95.514Zm-2.368-2.368a.917.917,0,1,1,0,1.3A.913.913,0,0,1,93.145,93.145Z" transform="translate(-82.124 -82.124)" /><path d="M374.95,96.225a2.432,2.432,0,1,0-1.72-.711A2.426,2.426,0,0,0,374.95,96.225Zm-.648-3.08a.917.917,0,1,1,0,1.3A.914.914,0,0,1,374.3,93.145Z" transform="translate(-334.858 -82.124)" /><path d="M92.073,373.229a2.433,2.433,0,1,0,3.441,0A2.418,2.418,0,0,0,92.073,373.229Zm2.369,2.368a.916.916,0,1,1,0-1.3A.917.917,0,0,1,94.441,375.6Z" transform="translate(-82.124 -334.858)" /></g></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('domain_generator_name') ?></div>
    </a>
    <?php } ?>

    <?php if($this->options->get('whois-status')) { ?>
    <a href="<?php echo base_url('whois'); ?>" class="headerBottomBlocks <?php echo $controller == 'whois' ? 'active' : '' ?>" title="<?php echo lang('domain_whois_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="16.67" height="30.652" viewBox="0 0 16.67 28.652"><g transform="translate(-18.337 -13.388)"><circle cx="2.605" cy="2.605" r="2.605" transform="translate(24.068 36.831)" /><path d="M184.335,128.5A8.345,8.345,0,0,0,176,136.835a2.084,2.084,0,1,0,4.168,0A4.168,4.168,0,1,1,184.335,141a2.084,2.084,0,0,0-2.084,2.084V148.3a2.084,2.084,0,0,0,4.168,0v-3.389a8.336,8.336,0,0,0-2.084-16.407Z" transform="translate(-157.663 -115.112)" /></g></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('domain_whois_name') ?></div>
    </a>
    <?php } ?>

    <?php if($this->options->get('ip-status')) { ?>
    <a href="<?php echo base_url('ip-lookup'); ?>" class="headerBottomBlocks <?php echo $controller == 'ip_lookup' ? 'active' : '' ?>" title="<?php echo lang('ip_lookup_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="53.494" height="53.494" viewBox="0 0 53.494 53.494"><path d="M249.284,98.666a.784.784,0,0,0,.784-.784v-1.15a.784.784,0,1,0-1.567,0v1.15A.784.784,0,0,0,249.284,98.666Z" transform="translate(-222.536 -85.924)" /><path d="M350.33,141.028a.783.783,0,0,0-1.108,0l-.813.813a.784.784,0,0,0,1.108,1.108l.813-.813A.784.784,0,0,0,350.33,141.028Z" transform="translate(-311.801 -126.088)" /><path d="M390.012,248.5a.784.784,0,0,0,0,1.567h1.15a.784.784,0,1,0,0-1.567Z" transform="translate(-348.561 -222.537)" /><path d="M348.939,348.409a.784.784,0,1,0-1.108,1.108l.813.813a.784.784,0,0,0,1.108-1.108Z" transform="translate(-311.284 -311.802)" /><path d="M247.683,390.013v1.15a.784.784,0,0,0,1.567,0v-1.15a.784.784,0,0,0-1.567,0Z" transform="translate(-221.805 -348.562)" /><path d="M141.263,347.832l-.813.813a.784.784,0,0,0,1.108,1.108l.813-.813a.784.784,0,0,0-1.108-1.108Z" transform="translate(-125.57 -311.285)" /><path d="M96.732,247.684a.784.784,0,0,0,0,1.567h1.15a.784.784,0,0,0,0-1.567Z" transform="translate(-85.923 -221.806)" /><path d="M142.95,141.264l-.813-.813a.784.784,0,0,0-1.108,1.108l.813.813a.784.784,0,0,0,1.108-1.108Z" transform="translate(-126.088 -125.571)" /><path d="M194.342,159.079l5.582,2.87a.784.784,0,1,0,.717-1.394l-5.58-2.869a2.875,2.875,0,0,0-2.035-3.334v-7.987a.784.784,0,0,0-1.567,0v7.987a2.886,2.886,0,0,0-1.982,1.982h-3.889a.784.784,0,1,0,0,1.567h3.889a2.872,2.872,0,0,0,4.865,1.177Zm-2.1-.653a1.308,1.308,0,1,1,1.308-1.308A1.309,1.309,0,0,1,192.243,158.426Z" transform="translate(-165.495 -130.371)" /><path d="M96.1,75.088a.784.784,0,0,0,.722-.841,21.016,21.016,0,1,0,0,3.253.784.784,0,1,0-1.563-.12,19.447,19.447,0,1,1,0-3.013A.782.782,0,0,0,96.1,75.088Z" transform="translate(-49.125 -49.125)" /><path d="M148.187,7.834a26.755,26.755,0,0,0-33.338-3.615.784.784,0,1,0,.846,1.319,25.176,25.176,0,1,1,6.268,45.309.784.784,0,0,0-.454,1.5A26.75,26.75,0,0,0,148.187,7.834Z" transform="translate(-102.527)" /><path d="M16.587,100.73a25.185,25.185,0,0,1-5.872-42.461.784.784,0,0,0-1-1.208,26.752,26.752,0,0,0,6.238,45.1.784.784,0,0,0,.633-1.434Z" transform="translate(0 -50.938)" /></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('ip_lookup_name') ?></div>
    </a>
    <?php } ?>
    
    <?php if($this->options->get('location-status')) { ?>
    <a href="<?php echo base_url('location'); ?>" class="headerBottomBlocks <?php echo $controller == 'location' ? 'active' : '' ?>" title="<?php echo lang('domain_location_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="33.859" height="48.155" viewBox="0 0 33.859 48.155"><g transform="translate(-76)"><g transform="translate(76)"><path d="M92.929,0a16.933,16.933,0,0,0-14.4,25.832L91.966,47.488a1.411,1.411,0,0,0,1.2.667h.011a1.41,1.41,0,0,0,1.2-.686l13.1-21.866A16.933,16.933,0,0,0,92.929,0Zm12.12,24.154L93.143,44.034,80.925,24.345a14.117,14.117,0,1,1,24.124-.191Z" transform="translate(-76)" /></g><g transform="translate(84.465 8.465)"><path d="M174.465,90a8.465,8.465,0,1,0,8.465,8.465A8.474,8.474,0,0,0,174.465,90Zm0,14.127a5.662,5.662,0,1,1,5.653-5.662A5.666,5.666,0,0,1,174.465,104.127Z" transform="translate(-166 -90)" /></g></g></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('domain_location_name') ?></div>
    </a>
    <?php } ?>
    
    <?php if($this->options->get('dns-status')) { ?>
    <a href="<?php echo base_url('dns-lookup'); ?>" class="headerBottomBlocks <?php echo $controller == 'dns_lookup' ? 'active' : '' ?>" title="<?php echo lang('dns_lookup_name') ?>">
        <div class="blockGrad"></div>
        <div class="headerBottomBlockIcon"><svg xmlns="http://www.w3.org/2000/svg" width="54.194" height="54.194" viewBox="0 0 54.194 54.194"><g transform="translate(-1 -1)"><path d="M33.622,5H31v8.741h2.622a4.371,4.371,0,1,0,0-8.741Zm0,6.993h-.874V6.748h.874a2.622,2.622,0,1,1,0,5.245Z" transform="translate(-3.777 -0.504)" /><path d="M53.622,6.748H55.37a.875.875,0,0,1,.874.874h1.748A2.625,2.625,0,0,0,55.37,5H53.622a2.622,2.622,0,0,0,0,5.245H55.37a.874.874,0,0,1,0,1.748H53.622a.875.875,0,0,1-.874-.874H51a2.626,2.626,0,0,0,2.622,2.622H55.37a2.622,2.622,0,0,0,0-5.245H53.622a.874.874,0,0,1,0-1.748Z" transform="translate(-6.295 -0.504)" /><path d="M46.245,10.912,43.288,5H41v8.741h1.748V7.829L45.7,13.741h2.288V5H46.245Z" transform="translate(-5.036 -0.504)" /><path d="M52.572,1H26.349a2.626,2.626,0,0,0-2.622,2.622V7.993H21.339l-.67,2.1a21.892,21.892,0,0,0-8.487,3.52L10.218,12.6,5.607,17.21l1.016,1.965A21.856,21.856,0,0,0,3.1,27.662l-2.1.67v6.523l2.1.669a21.877,21.877,0,0,0,3.519,8.487L5.607,45.976l4.611,4.612,1.965-1.017a21.879,21.879,0,0,0,8.487,3.52l.67,2.1h6.523l.67-2.1a21.892,21.892,0,0,0,8.487-3.52l1.965,1.017,4.611-4.612-1.016-1.965A21.856,21.856,0,0,0,46.1,35.525l2.1-.67V28.331l-2.1-.669a21.877,21.877,0,0,0-3.519-8.487l1.016-1.965-.478-.477h9.455a2.626,2.626,0,0,0,2.622-2.622V3.622A2.626,2.626,0,0,0,52.572,1ZM28.225,19.908c.215.653.413,1.341.587,2.071H20.376c.885-3.741,2.23-6.2,3.57-6.821a2.626,2.626,0,0,0,2.4,1.577h.874V18.12A2.1,2.1,0,0,0,28.225,19.908ZM33.1,17.335a16.618,16.618,0,0,1,5.034,4.644H30.6q-.223-.99-.49-1.9a2.1,2.1,0,0,0,.712-.465ZM9.98,23.727h8.279a46.635,46.635,0,0,0-.642,6.993H8.037A16.492,16.492,0,0,1,9.98,23.727Zm1.1-1.748a16.631,16.631,0,0,1,10.137-6.646A18.638,18.638,0,0,0,18.6,21.978Zm8.287,8.741a44.08,44.08,0,0,1,.648-6.993h9.159a43.951,43.951,0,0,1,.653,6.993ZM29.83,32.468a44.079,44.079,0,0,1-.648,6.993H20.019a44.08,44.08,0,0,1-.648-6.993Zm-12.214,0a46.75,46.75,0,0,0,.642,6.993H9.979a16.492,16.492,0,0,1-1.942-6.993Zm.985,8.741a18.638,18.638,0,0,0,2.621,6.646,16.631,16.631,0,0,1-10.137-6.646Zm1.776,0h8.448C27.8,45.56,26.144,48.2,24.6,48.2S21.406,45.56,20.377,41.209Zm10.223,0h7.516A16.631,16.631,0,0,1,27.98,47.854,18.638,18.638,0,0,0,30.6,41.209Zm8.621-1.748H30.943a46.635,46.635,0,0,0,.642-6.993h9.579A16.492,16.492,0,0,1,39.222,39.46Zm-7.643-8.741a46.054,46.054,0,0,0-.631-6.993h8.272a16.591,16.591,0,0,1,1.96,6.993Zm9.876-13.176-.922,1.783.318.437a20.1,20.1,0,0,1,3.61,8.706l.084.534,1.908.607v3.966l-1.908.607-.084.534a20.094,20.094,0,0,1-3.61,8.706l-.318.437.922,1.783-2.8,2.8-1.782-.922-.436.318a20.1,20.1,0,0,1-8.707,3.611l-.534.084-.607,1.908H22.618l-.607-1.907-.534-.084a20.1,20.1,0,0,1-8.707-3.611l-.436-.318-1.782.922-2.8-2.8.922-1.783-.318-.437a20.1,20.1,0,0,1-3.61-8.706l-.084-.534-1.909-.607V29.611L4.656,29l.084-.534a20.094,20.094,0,0,1,3.61-8.706l.318-.437-.922-1.783,2.8-2.8,1.782.922.436-.318a20.1,20.1,0,0,1,8.707-3.611l.534-.084.607-1.908h1.109v3.541a18.314,18.314,0,1,0,11.649,3.452h5.27Zm11.991-3.432a.875.875,0,0,1-.874.874H32.98l-3.392,3.391a.376.376,0,0,1-.617-.256V14.986H26.349a.875.875,0,0,1-.874-.874V3.622a.875.875,0,0,1,.874-.874H52.572a.875.875,0,0,1,.874.874Z" /><path d="M51,49h8.741v1.748H51Z" transform="translate(-6.295 -6.043)" /><path d="M51,53h8.741v1.748H51Z" transform="translate(-6.295 -6.547)" /><path d="M55,57h1.748v1.748H55Z" transform="translate(-6.799 -7.05)" /><path d="M51,57h1.748v1.748H51Z" transform="translate(-6.295 -7.05)" /><path d="M59,57h1.748v1.748H59Z" transform="translate(-7.302 -7.05)" /><path d="M3,3h8.741V4.748H3Z" transform="translate(-0.252 -0.252)" /><path d="M3,7h8.741V8.748H3Z" transform="translate(-0.252 -0.755)" /><path d="M3,11H4.748v1.748H3Z" transform="translate(-0.252 -1.259)" /><path d="M11,11h1.748v1.748H11Z" transform="translate(-1.259 -1.259)" /><path d="M7,11H8.748v1.748H7Z" transform="translate(-0.755 -1.259)" /></g></svg></div>
        <div class="headerBottomBlocks-title"><?php echo lang('dns_lookup_name') ?></div>
    </a>
    <?php } ?>
</div>