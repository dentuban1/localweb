<?php defined('BASEPATH') || exit('Access Denied.');

class Dashboard extends AdminController {
    public function index() {
        $this->load->model('Modules/TldsModel');
        $this->load->model('Modules/PagesModel');

        $this->load->admin_page( 'dashboard', [
            'title' => 'Dashboard',

            'tlds'   => $this->TldsModel->getAll(),
            'active_tlds'   => $this->TldsModel->getActive(),
            'pages' => $this->PagesModel->get(),
            'theme'  => array(
                'name'    => $this->theme->meta()['name'],
                'version' => $this->theme->meta()['version'],
                'author'  => $this->theme->meta()['author']['name']
            )
        ]);
	}

    public function cache_clean() {
        $this->load->driver('cache', [ 'adapter' => 'file' ]);
        $this->cache->clean();

        $this->session->set_flashdata('alert', [
            'type' => 'success',
            'message' => 'Cache destroyed successfully.'
        ]);

        redirect(admin_base_url('dashboard'));
    }

    public function generate_sitemap() {
        $this->load->model('Modules/PagesModel');
        $this->load->model('Modules/BlogModel');
        $date = date('Y-m-d');
        $pages = $this->PagesModel->get();
        $posts = $this->BlogModel->getAllActive();
        ob_start(); ?>
        <url>
            <loc><?php echo base_url() ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
        <?php if($this->options->get('search-status')) { ?>
        <url>
            <loc><?php echo base_url('search') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('generator-status')) { ?>
        <url>
            <loc><?php echo base_url('domain-generator') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('whois-status')) { ?>
        <url>
            <loc><?php echo base_url('whois') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('ip-status')) { ?>
        <url>
            <loc><?php echo base_url('ip-lookup') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('location-status')) { ?>
        <url>
            <loc><?php echo base_url('location') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('dns-status')) { ?>
        <url>
            <loc><?php echo base_url('dns-lookup') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php
        $page_status = $this->options->get('recent-page-status');
        if($this->options->get('whois-status') && $page_status && ($page_status == 'header' || $page_status == 'footer' || $page_status == 'both') && $this->options->get('recent-whois-index-status')) { ?>
        <url>
            <loc><?php echo base_url('whois/recent') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <?php } ?>
        <?php if($this->options->get('contact-page-status')) { ?>
        <url>
            <loc><?php echo base_url('contact/') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
        <?php } ?>

        <?php foreach($pages as $page) { ?>
        <url>
            <loc><?php echo base_url('page/' . $page['permalink']) ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
        <?php } ?>

        <?php
        if($this->options->get('blog-status')) { ?>
        <url>
            <loc><?php echo base_url('blog') ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.4</priority>
        </url>
        <?php
        foreach($posts as $post) { ?>
        <url>
            <loc><?php echo base_url('blog/post/' . $post['permalink']) ?></loc>
            <lastmod><?php echo $date ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.4</priority>
        </url>
        <?php } }
        $contents = ob_get_clean();
        $sitemap = file_get_contents(APPPATH . 'views/admin/sitemap-placeholder.xml');
        $sitemap = str_replace('{{insert}}', $contents, $sitemap);
        if(file_put_contents(FCPATH . 'sitemap.xml', $sitemap) !== false) {
            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'Successfully Generated Latest Sitemap check here <a href="' . base_url('sitemap.xml') . '">' . base_url('sitemap.xml') . '</a>' 
            ]);
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'There was an error generating the site-map. Please make sure that the root directory of the application is writable.' 
            ]);
        }
        redirect(admin_base_url('dashboard'));
    }
}