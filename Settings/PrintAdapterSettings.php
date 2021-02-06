<?php
namespace Modules\NsPrintAdapter\Settings;

use App\Services\SettingsPage;
use App\Services\Helper;
use App\Services\Options;

class PrintAdapterSettings extends SettingsPage
{
    protected $form        =   [];
    protected $identifier  =   'ns.pa-settings';
    protected $labels      =   [];

    public function __construct()
    {
        $options            =   app()->make( Options::class );

        $this->labels       =    [
            'title'         =>  __( 'Print Adapter Settings' ),
            'description'   =>  __( 'Provides settings for print adapter.' ),
        ];

        $this->form         =   [
            'tabs'      =>  [
                'general'   =>  [
                    'label'     =>  __( 'General' ),
                    'fields'    =>  [
                        [
                            'type'          =>  'switch',
                            'label'         =>  __( 'Print Enabled' ),
                            'value'         =>  $options->get( 'ns_pa_enabled' ),
                            'description'   =>  __( 'Printer ' ),
                            'options'       =>  Helper::kvToJsOptions([
                                'yes'       =>  __( 'Yes' ),
                                'no'        =>  __( 'No' ),
                            ]),
                            'name'          =>  'ns_pa_enabled',
                        ], [
                            'type'          =>  'text',
                            'label'         =>  __( 'NPS Address' ),
                            'value'         =>  $options->get( 'ns_pa_server_address' ),
                            'description'   =>  __( 'Provide the local Nexo Print Server 3.x address' ),
                            'name'          =>  'ns_pa_server_address',
                        ], [
                            'type'          =>  'text',
                            'label'         =>  __( 'Character Limit' ),
                            'value'         =>  $options->get( 'ns_pa_characters_limit' ),
                            'description'   =>  __( 'Define the maximum allowed characters. Default (48)' ),
                            'name'          =>  'ns_pa_characters_limit',
                        ], [
                            'type'          =>  'select',
                            'label'         =>  __( 'Default Printer' ),
                            'value'         =>  $options->get( 'ns_pa_printer' ),
                            'description'   =>  __( 'Printer ' ),
                            'options'       =>  [],
                            'name'          =>  'ns_pa_printer',
                        ], [
                            'type'          =>  'textarea',
                            'label'         =>  __( 'Left Column' ),
                            'value'         =>  $options->get( 'ns_pa_left_column' ),
                            'description'   =>  __( 'Define the header for the left column' ),
                            'name'          =>  'ns_pa_left_column',
                        ], [
                            'type'          =>  'textarea',
                            'label'         =>  __( 'Right Column' ),
                            'value'         =>  $options->get( 'ns_pa_right_column' ),
                            'description'   =>  __( 'Define the header for the right column' ),
                            'name'          =>  'ns_pa_right_column',
                        ],
                    ]
                ]
            ]
        ];
    }
}