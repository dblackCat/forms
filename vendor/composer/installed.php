<?php return array(
    'root' => array(
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'type' => 'october-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => 'b9b1a5c80bd03879706dc69e24494a6eb86e6e39',
        'name' => 'catdesign/forms-plugin',
        'dev' => true,
    ),
    'versions' => array(
        'catdesign/forms-plugin' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'type' => 'october-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => 'b9b1a5c80bd03879706dc69e24494a6eb86e6e39',
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'sendpulse/rest-api' => array(
            'pretty_version' => '1.0.25',
            'version' => '1.0.25.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../sendpulse/rest-api',
            'aliases' => array(),
            'reference' => '3be7aefcb78ac37d0f747c751e25c869c2086555',
            'dev_requirement' => false,
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
    ),
);
