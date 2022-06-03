<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists, this
    | is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities this is cool
    | feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        'before' => function ($theme) {
            $theme->setTitle(resolve('CmsDomain')->name ?? 'Default title');
            $theme->setAuthor('Damian Białkowski');
        },

        'asset' => function ($asset) {
            $asset->add(
                [
                    [
                        'externalcss',
                        [
                            '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
                        ]
                    ],
                ]
            );
            $asset->themePath()->add(
                [
                    [
                        'style',
                        [
                            'css/nice-select.css',
                            'css/owl.carousel.min.css',
                            'css/owl.theme.default.min.css',
                            'css/core.css',
                            'css/style.css'
                        ]
                    ],
                    [
                        'script',
                        [
                            'js/jquery.min.js',
                            'js/jquery.nice-select.min.js',
                            'js/owl.carousel.js',
                            'js/bootstrap.bundle.min.js',
                            'js/script.js',
                        ]
                    ]
                ]
            );
        },


        'beforeRenderTheme' => function ($theme) {
            // To render partial composer
            /*
            $theme->partialComposer('header', function($view){
                $view->with('auth', Auth::user());
            });
            */
        },

        'beforeRenderLayout' => array(

            'mobile' => function ($theme) {
                // $theme->asset()->themePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);
