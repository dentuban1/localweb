<?php defined('BASEPATH') || exit('Access Denied.');

$config['options'] = array(
    'table' => 'options',
    'cache' => 'options',

    'sections' => array(
        'general' => array(
            'name' => 'General',
            'icon' => 'settings',
            'title' => 'General Settings',
            'description' => 'Configure the General Settings for your Website',
            'fields' => array(
                'logo' => [
                    'label' => 'Logo',
                    'description' => 'The logo for the website.',
                    'type' => 'image',
                    'default' => '/uploads/default/logo.png',
                    'escape_html' => false,
                    'xss_clean' => false
                ],
                'favicon' => [
                    'label' => 'Favicon',
                    'description' => 'The favicon for the website.',
                    'type' => 'image',
                    'default' => '/uploads/default/favicon.png',
                    'escape_html' => false,
                    'xss_clean' => false
                ],
                'website-title' => [
                    'label' => 'Website Name',
                    'description' => 'This is the name of the website, shown to end-users.',
                    'type' => 'text',
                    'default' => 'DomainsKit',
                    'placeholder' => 'DomainsKit Script',
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ]
                ],

                'footer-attribution' => [
                    'label' => 'Footer Attribution',
                    'description' => 'Change the Footer Attribution on your Website.',
                    'type' => 'textarea',
                    'default' => 'Copyright © 2022 <a href="https://codecanyon.net/user/bitflan/portfolio" target="_blank">Bitflan</a>. All Rights Reserved.',
                    'placeholder' => 'Copyright © 2022 Company LLC',
                    'xss_clean' => false,
                    'escape_html' => false
                ],

                'custom-tags' => [
                    'label' => 'Custom Code Inside &#x3C;head&#x3E; Section',
                    'description' => 'Insert some custom HTML to your <code><head></code> tag.',
                    'type' => 'textarea',
                    'default' => '',
                    'placeholder' => 'Enter some content to be inserted in the head tag.',
                    'escape_html' => false,
                    'xss_clean' => false
                ]
            )
        ),
        'seo' => array(
            'name' => 'SEO Settings',
            'icon' => 'globe',
            'title' => 'SEO Settings',
            'description' => 'Configure the SEO Settings for your Website',
            'fields' => array(
                'seo-search-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the Domain Search page.',
                    'type' => 'text',
                    'default' => 'Domain Search',
                    'placeholder' => 'Title of this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<section class="row"><div class="col-6"><h3>Domain Search</h3><hr>'
                ),
                'seo-search-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Domain Search, Domain Name Search, Instant Domain Search, DomainsKit, Domain Whois',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-search-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the Search Page.',
                    'type' => 'textarea',
                    'default' => 'Find, Search and Purchase the Domain Name you always wanted with ease. Type in your keywords into the search bar and let us do the rest.',
                    'placeholder' => 'Meta Description for this Page...',
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'seo-whois-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the WHOIS page.',
                    'type' => 'text',
                    'default' => 'WHOIS Information',
                    'placeholder' => 'Title of this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>WHOIS Information</h3><hr>'
                ),
                'seo-whois-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Domain Whois, Domain Name Whois, Instant Domain Whois, DomainsKit, Whois Search',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-whois-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the WHOIS Page.',
                    'type' => 'textarea',
                    'default' => 'Find out the WHOIS information of a domain name immediately. Simply enter the domain name into the text-field and press the button.',
                    'placeholder' => 'Meta Description for this Page...',
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'seo-generator-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the Domain Generator page.',
                    'type' => 'text',
                    'default' => 'Domain Generator',
                    'placeholder' => 'Title of this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>Domain Generator</h3><hr>'
                ),
                'seo-generator-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Domain Name Generator, Domains Generator, Instant Domain Generator, DomainsKit, Generate Domain Names',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-generator-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the Generator Page.',
                    'type' => 'textarea',
                    'default' => 'Generate unique domain names based on a keyword. Enter your keyword in the text-field and press the button.',
                    'placeholder' => 'Meta Description for this Page...',

                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'seo-ip-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the IP Lookup page.',
                    'type' => 'text',
                    'default' => 'Reverse IP Lookup',
                    'placeholder' => 'Title of this Page',
    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>Reverse IP Lookup</h3><hr>'
                ),
                'seo-ip-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Reverse IP Lookup, IP Information, IP Lookup, DomainsKit, IP Info',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-ip-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the IP Lookup Page.',
                    'type' => 'textarea',
                    'default' => 'Find out information about any IP Address on the internet. Enter the IP Address in the text-field and press the button.',
                    'placeholder' => 'Meta Description for this Page...',
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],

                'seo-location-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the Domain Location page.',
                    'type' => 'text',
                    'default' => 'Domain Location',
                    'placeholder' => 'Title of this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>Domain Location</h3><hr>'
                ),
				'seo-location-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'IP Location Info, IP Location, IP Information, DomainsKit, IP Info',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-location-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the Location Page.',
                    'type' => 'textarea',
                    'default' => 'Find out the location of any domain name on the internet. Enter the domain name in the text-field and press the button.',
                    'placeholder' => 'Meta Description for this Page...',

                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'seo-dns-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the DNS Lookup page.',
                    'type' => 'text',
                    'default' => 'DNS Lookup',
                    'placeholder' => 'Title of this Page',
    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>DNS Lookup</h3><hr>'
                ),
				'seo-dns-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'DNS Lookup, Domains DNS, DNS Query, DomainsKit, Find DNS Records',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-dns-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the DNS Lookup Page.',
                    'type' => 'textarea',
                    'default' => 'Look up the DNS Records of any domain name. Enter the domain name into the text-field and press the button.',
                    'placeholder' => 'Meta Description for this Page...',

                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'seo-recent-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the Recent Searches page.',
                    'type' => 'text',
                    'default' => 'Recent WHOIS Searches',
                    'placeholder' => 'Title of this Page',
    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>Recent Searches</h3><hr>'
                ),
				'seo-recent-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Recent Whois Results, Recent Whois, Whois Results, DomainsKit, Whois Search Results',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'seo-recent-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the Recent Searches Page.',
                    'type' => 'textarea',
                    'default' => 'List of all the WHOIS Searches made by users. Sorted by Most Recent to Oldest.',
                    'placeholder' => 'Meta Description for this Page...',

                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div>'
                ],
                'blog-title' => array(
                    'label' => 'Title',
                    'description' => 'The title for the blog page.',
                    'type' => 'text',
                    'default' => 'Recent Blog Posts',
                    'placeholder' => 'Title of this Page',
    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'before_html' => '<div class="col-6"><h3>Blog Page</h3><hr>'
                ),
				'seo-blog-keywords' => array(
                    'label' => 'Keywords',
                    'description' => 'Keywords separated by , (comma).',
                    'type' => 'text',
                    'default' => 'Recent Blog Posts, Blog Posts, Recent Posts, DomainsKit, Latest Blog Posts',
                    'placeholder' => 'SEO Keywords for this Page',    
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true
                ),
                'blog-description' => [
                    'label' => 'Description',
                    'description' => 'Change the Description of the Blog.',
                    'type' => 'textarea',
                    'default' => 'Discover all the latest about our products, technology, and services on our official blog.',
                    'placeholder' => 'Meta Description for this Page...',
                    'validation' => [
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'You must provide a %s.'
                        ]
                    ],
                    'escape_html' => true,
                    'xss_clean' => true,
                    'after_html' => '</div></section>'
                ],
                'seo-image' => [
                    'label' => 'Open Graph SEO Image',
                    'description' => 'Upload an image that appears on Embeds on Social Media and other places.',
                    'type' => 'image',
                    'default' => '/uploads/default/og-image.png',
                    'escape_html' => false,
                    'xss_clean' => false
                ]
            )
        ),
        'tools' => array(
            'name' => 'Tools Settings',
            'icon' => 'tool',
            'title' => 'Tools Settings',
            'description' => 'Enable / Disable different Tools & Features on your Website.',

            'fields' => array(
                'search-status' => [
                    'label' => 'Enable Domain Search Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true
                ],
                'generator-status' => [
                    'label' => 'Enable Domain Generator Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true
                ],
                'whois-status' => [
                    'label' => 'Enable WHOIS Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true
                ],
                'ip-status' => [
                    'label' => 'Enable Reverse IP Lookup Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true
                ],
                'location-status' => [
                    'label' => 'Enable Domain Location Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true
                ],
                'dns-status' => [
                    'label' => 'Enable DNS Lookup Tool',
                    'description' => 'Enable / Disable this Tool.',
                    'type' => 'switch',
                    'default' => true,
                    'after_html' => '<hr>',
                ],
                'tld-price-status' => [
                    'label' => 'Show TLD Price',
                    'description' => 'Enable / Disable the appearance of Prices on Domain Search.',
                    'type' => 'switch',
                    'default' => true
                ],
                'enable-buy-button' => [
                    'label' => 'Enable or Disable Buy Button on TLDs',
                    'description' => 'Enable / Disable Buy Button on TLDs.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'enable-whois-button' => [
                    'label' => 'Enable or Disable Whois Button on TLDs',
                    'description' => 'Enable / Disable Whois Button on TLDs.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'search-tld-selection' => [
                    'label' => 'Enable TLD Selection on Domain Search Page',
                    'description' => 'Enable / Disable TLD Selection on Domain Search Page.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'generator-tld-selection' => [
                    'label' => 'Enable TLD Selection on Domain Generator Page',
                    'description' => 'Enable / Disable TLD Selection on Domain Generator Page.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'whois-tld-related' => [
                    'label' => 'Enable Related TLDs on Whois Page',
                    'description' => 'Enable / Disable Related TLDs on Whois Page.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'color-mode-status' => [
                    'label' => 'Enable Disble Color Mode',
                    'description' => 'Dark Mode / Light Mode Selection.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '<hr>'
                ],
                'blog-status' => [
                    'label' => 'Enable Blog',
                    'description' => 'Enable / Disable Blog.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => ''
                ],
                'blog-page-status' => [
                    'label' => 'Show / Hide Blog Link',
                    'description' => 'Show / Hide the blog link on the header or footer.',
                    'type' => 'select',
                    'choices' => [
                        'header' => 'Show in Header',
                        'footer' => 'Show in Footer',
                        'both' => 'Shown in Both'
                    ],
                    'default' => 'footer'
                ],
                'recent-status' => [
                    'label' => 'Enable Recent Whois Searches',
                    'description' => 'Enable / Disable Recent Whois Searches.',
                    'type' => 'switch',
                    'default' => true,
                ],
                'recent-page-status' => [
                    'label' => 'Show / Hide Recent Searches page',
                    'description' => 'Enable / Disable the recent searches page on the header or footer.',
                    'type' => 'select',
                    'choices' => [
                        'header' => 'Show in Header',
                        'footer' => 'Show in Footer',
                        'both' => 'Shown in Both'
                    ],
                    'default' => 'footer'
                ],
                'recent-whois-index-status' => [
                    'label' => 'Enable Whois Search Indexing',
                    'description' => 'Enable / Disable Whois Search Indexing.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],
                'color-mode-status' => [
                    'label' => 'Enable Disble Color Mode',
                    'description' => 'Dark Mode / Light Mode Selection.',
                    'type' => 'switch',
                    'default' => true,
                    'before_html' => '',
                ],

                'ip-resolver-status' => [
                    'label' => 'Use Custom IP Resolver?',
                    'description' => 'If you want to use a Custom IP Resolving service, enable this option.',
                    'type' => 'switch',
                    'default' => false,

                    'before_html' => '<hr>',

                    'attributes' => [
                        'x-init' => 'options_data.resolver_status = $el.checked',
                        'x-model' => 'options_data.resolver_status'
                    ]
                ],

                'ip-resolver-url' => [
                    'label' => 'IP Resolver API URL',
                    'description' => 'Must be a JSON API that Accepts a Domain Name. You can use the <strong>{{domain}}</strong> wild-card to insert the dynamic domain. This URL is requested by the <strong>Client</strong> and must be a CORS Non-Blocking Endpoint.',
                    'type' => 'text',
                    'default' => '',

                    'before_html' => '<section x-show="options_data.resolver_status">'
                ],

                'ip-resolver-mode' => [
                    'label' => 'IP Resolver Mode',
                    'description' => 'Whether the API accepts a URI Parameter, GET Parameter or POST Parameter.',
                    'type' => 'select',
                    'choices' => [
                        'uri' => 'URI',
                        'get' => 'GET',
                        'post' => 'POST'
                    ],
                    'default' => 'uri',
                
                    'attributes' => [
                        'x-init' => 'options_data.resolver_mode = $el.value',
                        'x-model' => 'options_data.resolver_mode'
                    ]
                ],

                'ip-resolver-param' => [
                    'label' => 'API Parameter Name',
                    'description' => 'The parameter under which the domain-name will be sent.',
                    'type' => 'text',
                    'default' => 'domain',

                    'before_html' => '<section x-show="options_data.resolver_mode == `get` || options_data.resolver_mode == `post`">',
                    'after_html' => '</section>'
                ],

                'ip-resolver-field' => [
                    'label' => 'API Response IP Field Name',
                    'description' => 'The Field Name that includes the IP Address in the JSON Response.',
                    'type' => 'text',
                    'default' => 'ip'
                ],

                'ip-resolver-success-pattern' => [
                    'label' => 'Pattern to Match for a Successful Response',
                    'description' => 'If this pattern is found in the response, It will assume that it\'s a successful response',
                    'type' => 'text',
                    'default' => '"success":true',

                    'xss_clean' => false,
                    'escape_html' => false,
                ],

                'ip-resolver-ignore' => [
                    'label' => 'Fields to Ignore in the Result',
                    'description' => 'Comma Separated List of Fields to Ignore in the Data shown to Users.',
                    'type' => 'text',
                    'default' => '',

                    'after_html' => '</section>'
                ]
            )
        ),
        'ads' => array(
            'name' => 'Ad Spots',
            'icon' => 'monitor',
            'title' => 'Ad Spots',
            'description' => 'Configure the Ads for the Pre-defined Ad Spots on your Website.',
            'fields' => array(
                'header-ad-status' => array(
                    'label' => 'Enable Header Ad Spot',
                    'description' => 'Enable / Disable the Header Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    'before_html' => '<div class="alert alert-info">Ad-blocker Software may prevent you from using this page properly or viewing the ads on your website. Make sure to disable ad-blockers when working with this page.</div><div class="row"><div class="col-4">',
                ),
                'header-ad-code' => array(
                    'label' => 'Header Ad Code',
                    'description' => 'The Ad Code to insert in the Header Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    'after_html' => "</div>",					
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'middle-ad-status' => array(
                    'label' => 'Enable Middle Ad Spot',
                    'description' => 'Enable / Disable the Middle Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    "before_html" => '<div class="col-4">'
                ),
                'middle-ad-code' => array(
                    'label' => 'Middle Ad Code',
                    'description' => 'The Ad Code to insert in the Middle Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    "after_html" => '</div>',					
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'footer-ad-status' => array(
                    'label' => 'Enable Footer Ad Spot',
                    'description' => 'Enable / Disable the Footer Advertisement Spot',
                    'type' => 'switch',
                    'default' => false,
                    "before_html" => '<div class="col-4">'
                ),
                'footer-ad-code' => array(
                    'label' => 'Footer Ad Code',
                    'description' => 'The Ad Code to insert in the Footer Ad Spot.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
                    "after_html" => '</div></div>',
					'escape_html' => false,
                    'xss_clean' => false
                ),
                'pop-ad-status' => array(
                    'label' => 'Enable Pop Ad',
                    'description' => 'Enable / Disable the Pop Ad',
                    'type' => 'switch',
                    'default' => false
                ),
                'pop-ad-code' => array(
                    'label' => 'Pop Ad Code',
                    'description' => 'The Ad Code to insert as a Pop Ad.',
                    'placeholder' => 'Ad Code Here',
                    'type' => 'textarea',
                    'default' => '',
					'escape_html' => false,
                    'xss_clean' => false
                ),
            )
        ),
        'assets' => array(
            'name' => 'Additional Assets',
            'icon' => 'code',
            'title' => 'Additional Assets',
            'description' => 'Add Additional CSS / JS in your website.',
            'fields' => array(
                'additional-css' => array(
                    'label' => 'CSS',
                    'description' => 'Add additional stylesheets to your website.',
                    'type' => 'repeater',
                    'title' => 'name',
                    'default' => [],
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'description' => 'The name of this stylesheet for reference.',
                            'type' => 'text',
                            'placeholder' => 'Custom Styles',
                            'default' => 'Custom Stylesheet',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Stylesheet name is Required'
                                ]
                            ]
                        ],
                        'href' => [
                            'label' => 'Link',
                            'description' => 'The link to the stylesheet. You may need to create & upload this stylesheet.',
                            'type' => 'text',
                            'placeholder' => 'https://website.com/assets/style.css',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Stylesheet link is Required'
                                ]
                            ]
                        ],
                        'status' => [
                            'label' => 'Status',
                            'description' => 'Enable or Disable this Stylesheet',
                            'type' => 'switch',
                            'default' => true
                        ]
                    ]
                ),
                'additional-js' => array(
                    'label' => 'JS',
                    'description' => 'Add additional scripts to your website.',
                    'type' => 'repeater',
                    'title' => 'name',
                    'default' => [],
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'description' => 'The name of this script for reference.',
                            'type' => 'text',
                            'placeholder' => 'Custom Script',
                            'default' => 'Custom Script',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Script name is Required'
                                ]
                            ]
                        ],
                        'src' => [
                            'label' => 'Link',
                            'description' => 'The link to the script. You may need to create & upload this script.',
                            'type' => 'text',
                            'placeholder' => 'https://website.com/assets/script.js',

                            'validation' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Script link is Required'
                                ]
                            ]
                        ],
                        'position' => [
                            'label' => 'Position',
                            'description' => 'Configure the placement for this Script.',
                            'type' => 'select',
                            'choices' => [
                                'header' => 'Header',
                                'Footer' => 'Footer',
                            ],

                            'validation' => [
                                'rules' => 'required|in_list[header,footer]',
                                'errors' => [
                                    'required' => 'Position is Required',
                                    'in_list' => 'Invalid Script Placement'
                                ]
                            ]
                        ],
                        'status' => [
                            'label' => 'Status',
                            'description' => 'Enable or Disable this Script',
                            'type' => 'switch',
                            'default' => true
                        ]
                    ]
                ),
                'custom-css' => [
                    'label' => 'Custom Inline CSS',
                    'description' => 'This CSS will be printed as-is in the header of your website.',
                    'type' => 'textarea',
                    'placeholder' => 'CSS Code Here',
                    'escape_html' => false,
                    'xss_clean' => false
                ],
                'google-analytics-id' => [
                    'label' => 'Google Analytics ID',
                    'description' => 'Specify your ID to Enable analytics on your website.',
                    'type' => 'text',
                    'placeholder' => 'Your Analytics ID',
                    'escape_html' => false,
                    'xss_clean' => false
                ]
            )
        ),

        'contact' => array(
            'name' => 'Contact Settings',
            'icon' => 'mail',
            'title' => 'Contact Settings',
            'description' => 'Modify the Contact Page Settings of your Website.',
            'fields' => array(
                'contact-page-status' => [
                    'label' => 'Enable Contact Page',
                    'description' => 'Set the status of the Contact Page',
                    'type' => 'switch',
                    'default' => true
                ],
                'contact-page-image' => [
                    'label' => 'Contact Page Graphic',
                    'description' => 'Add an Illustration to the Contact Page.',
                    'type' => 'image',
                    'default' => 'uploads/default/contact.svg',

                    'escape_html' => false,
                    'xss_clean' => false
                ],

                'contact-email' => [
                    'label' => 'Contact E-Mail',
                    'description' => 'Contact Form Messages will be sent to this E-Mail',
                    'type' => 'text',
                    'default' => 'admin@flanwork.com',
                    'placeholder' => 'Your Contact E-Mail',

                    'validation' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Contact E-Mail is Required.'
                        ]
                    ]
                ],

                'email-type' => [
                    'label' => 'E-Mail Sending Type',
                    'description' => 'Choose how you want E-Mails to be sent from your website.',
                    'type' => 'select',
                    'default' => 'default',
                    'choices' => [
                        'default' => 'Default PHP Mail',
                        'smtp' => 'SMTP',
                        'sendgrid' => 'SendGrid API'
                    ],
                    'attributes' => [
                        'x-init' => 'options_data.email_type = $el.value',
                        'x-model' => 'options_data.email_type'
                    ]
                ],

                'smtp-host' => [
                    'label' => 'SMTP Host',
                    'description' => 'The Host for the SMTP to use.',
                    'type' => 'text',
                    'placeholder' => 'smtp.myhost.com',
                    'before_html' => '<section x-cloak x-show="options_data.email_type == `smtp`">',
                ],
                'smtp-port' => [
                    'label' => 'SMTP Port',
                    'description' => 'The Port for the SMTP.',
                    'type' => 'number',
                    'placeholder' => 'Your SMTP Port',
                    'default' => 25
                ],
                'smtp-username' => [
                    'label' => 'SMTP Username',
                    'description' => 'The SMTP Login Username',
                    'type' => 'text',
                    'placeholder' => 'Your SMTP Username',

                    'before_html' => '<div class="row"><div class="col-6">'
                ],
                'smtp-password' => [
                    'label' => 'SMTP Password',
                    'description' => 'The SMTP Login Password',
                    'type' => 'text',
                    'placeholder' => 'Your SMTP Password',
                    
                    'before_html' => '</div><div class="col-6">',
                    'after_html' => '</div></div></section>',
                ],

                'sendgrid-api-key' => [
                    'label' => 'SendGrid API Key',
                    'description' => 'Specify your API Key provided by SendGrid.',
                    'type' => 'text',
                    'placeholder' => 'Your API Key Here',
                    'before_html' => '<section x-cloak x-show="options_data.email_type == `sendgrid`">',
                    'after_html' => '</section>'
                ]
            )
        ),
        'api' => array(
            'name' => 'API Settings',
            'icon' => 'key',
            'title' => 'API Settings',
            'description' => 'Edit the API Keys for Google Recaptcha & ExchangeRate-API.',

            'fields' => array(
                'recaptcha-status' => [
                    'label' => 'Enable Captcha',
                    'description' => 'Set the status of the Captcha',
                    'type' => 'switch',
                    'default' => false,
                    'after_html' => '<div class="mt-2 alert alert-info">You can get Recaptcha v2 Checkbox API Keys from the <a target="_blank" href="https://www.google.com/recaptcha/admin/">Google API Console</a>.</div>'
                ],

                'recaptcha-site-key' => [
                    'label' => 'Recaptcha Site Key',
                    'description' => 'Your Recaptcha Site Key provided by Google',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your Recaptcha Site Key',
                ],
                'recaptcha-secret-key' => [
                    'label' => 'Recaptcha Secret Key',
                    'description' => 'Your Recaptcha Secret Key provided by Google',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your Recaptcha Secret Key',
                ],

                'exchangerate-api-status' => [
                    'label' => 'Enable ExchangeRate-API',
                    'description' => 'Actiate or Deactivate ExchangeRate-API for Price Conversions',
                    'type' => 'switch',
                    'default' => false,

                    'before_html' => '<div class="mt-2 alert alert-info">The ExchangeRate API is used to update Currency Rates on your website. Get a Free API Key from <a target="_blank" href="https://www.exchangerate-api.com/">Here</a>.</div>'
                ],
                'exchangerate-api-key' => [
                    'label' => 'ExchangeRate-API  Key',
                    'description' => 'Your ExchangeRate API Key for Currency Rates.',
                    'type' => 'text',
                    'default' => '',
                    'placeholder' => 'Your API Key',
                ]
            )
        ),
        'currencies' => array(
            'name' => 'Currency Settings',
            'title' => 'Currency Settings',
            'description' => 'Change the currency settings on your website.',
            'icon' => 'dollar-sign',

            'fields' => [
                'enable-currency-selection' => [
                    'label' => 'Enable Currency Selection',
                    'description' => 'Actiate or Deactivate Currency Selection',
                    'type' => 'switch',
                    'default' => true,
                    
                    'before_html' => '<div class="alert alert-info">For these settings to function, <strong>ExchangeRate-API</strong> must be enabled in <a href="' . base_url('admin/options/api') . '"' . '>API Settings.</a></div>'
                ]
            ]
        ),
        'links' => array(
            'name' => 'Header / Footer Links',
            'icon' => 'external-link',
            'title' => 'Header / Footer Links',
            'description' => 'Add or Remove Links from the Header or Footer of your website.',

            'fields' => array(
                'hf-links' => [
                    'label' => 'Items',
                    'description' => 'Add / Remove Links',
                    'type' => 'repeater',
                    'default' => [],
                    'title' => 'title',
                    'fields' => [
                        'title' => [
                            'label' => 'Title',
                            'description' => 'Name of the Link to be displayed.',
                            'type' => 'text',
                            'default' => 'My New Link',
                            'placeholder' => 'Enter the link name to be displayed to the users.'
                        ],
                        'href' => [
                            'label' => 'Location',
                            'description' => 'User will go to this link after clicking your link.',
                            'type' => 'text',
                            'default' => '',
                            'placeholder' => 'https://somewhere.com/page'
                        ],
                        'placement' => [
                            'label' => 'Placement',
                            'description' => 'Where to place this link.',
                            'type' => 'select',
                            'default' => 'both',
                            'choices' => [
                                'both' => 'Both',
                                'header' => 'Header',
                                'footer' => 'Footer'
                            ]
                        ],
                        'new-tab' => [
                            'label' => 'New Tab',
                            'description' => 'Should this link open in a new Tab or Not.',
                            'default' => true,
                            'type' => 'switch'
                        ]
                    ]
                ]
            )
        ),
        'tld_settings' => array(
            'name' => 'TLD Settings / Tools',
            'icon' => 'tool',
            'title' => 'TLD Settings & Tools',
            'description' => 'Configure how TLDs behave on your Website.',

            'fields' => array(
                'homepage-tlds' => [
                    'label' => 'Maximum number of TLDs to show on Homepage on Search',
                    'description' => 'Load More will be showed if activated TLDs exceed this number',
                    'type' => 'number',
                    'default' => '15',
                    'placeholder' => 'If the activated TLDs exceed this amount, they will be paginated.'
                ]
            )
        )
    )
);