<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/home/ubuntu/workspace/blog/user/config/site.yaml',
    'modified' => 1514913545,
    'data' => [
        'title' => 'thierry rene web dev blog',
        'default_lang' => 'en',
        'author' => [
            'name' => 'Thierry Rene Matos',
            'email' => 'td_matos@terra.com.br'
        ],
        'taxonomies' => [
            0 => 'webdev',
            1 => 'frontend',
            2 => 'backend',
            3 => 'php',
            4 => 'js',
            5 => 'html',
            6 => 'css',
            7 => 'jquery'
        ],
        'metadata' => [
            'site-author' => '@thierryrenemts',
            'description' => 'compartilhar é aprender'
        ],
        'summary' => [
            'enabled' => true,
            'format' => 'short',
            'size' => 300,
            'delimiter' => '==='
        ],
        'blog' => [
            'route' => '/blog'
        ]
    ]
];
