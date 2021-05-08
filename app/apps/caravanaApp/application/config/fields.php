<?php

$config['types'] = [
	1 => 'Titlu',
	2 => 'Subtitlu',
	3 => 'Input',
	4 => 'Input de text',
	5 => 'Checkbox',
	6 => 'Checkbox cu inputuri',
	7 => 'Lista radio buttons',
	8 => 'Checkbox cu 1 input de text',
	9 => 'Checkbox cu 2 inputuri de text',
  10 => 'Subtitlu bold',

];

$config['properties'] = [

	1 => [ // Title type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Te rog sa introduci un titlu',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/title',
		       'editable'   => FALSE,
	       ]
	],

	2 => [ // Subtitle type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Te rog sa introduci un subtitlu',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/subtitle',
		       'editable'   => FALSE,
	       ]
	],

	10 => [ // Bold subtitle type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Te rog sa introduci un subtitlu',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/subtitleBold',
		       'editable'   => FALSE,
	       ]
	],

	3 => [ // Input type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'validations'     => [
		       'showToAdmin' => TRUE,
		       'value'       => '',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'input',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/input',
		       'editable'   => FALSE,
	       ]
	],

	4 => [ // Textarea type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'textarea',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/textarea',
		       'editable'   => FALSE,
	       ]
	],

	5 => [ // Checkbox type
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'input',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/label',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/checkbox',
		       'editable'   => FALSE,
	       ]
	],

	6 => [ // Checkbox with inputs
	       'label'      => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'checkboxwithinputs',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'adminView'  => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/checkboxWithInputs',
		       'editable'   => FALSE,
	       ],
	       'view'       => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/checkBoxWithInputs',
		       'editable'   => FALSE,
	       ],
	       'count' => [
		       'showToAdmin' => FALSE,
		       'value'       => 1,
	       ],
	       'inputLabel11' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel12' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel21' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel22' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	],

	7 => [ // Radio list
	       'label'      => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'radiolist',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'adminView'  => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/radioButtons',
		       'editable'   => FALSE,
	       ],
	       'view'       => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/radios',
	           'editable'   => FALSE,
	       ],
	       'count' => [
		       'showToAdmin' => FALSE,
		       'value'       => 2,
	       ],
	       'inputLabel1' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel2' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel3' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel4' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'inputLabel5' => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	],

	8 => [ // Checkbox with textarea
	       'label'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'Input label',
	       ],
	       'validations'     => [
		       'showToAdmin' => TRUE,
		       'value'       => '',
	       ],
	       'value'     => [
		       'showToAdmin' => FALSE,
		       'value'       => '',
	       ],
	       'name'     => [
		       'showToAdmin' => TRUE,
		       'value'       => 'input',
	       ],
	       'adminView' => [
		       'showToAdmin' => FALSE,
		       'value'       => 'admin/fields/checkBoxWithTextArea',
		       'editable'   => FALSE,
	       ],
	       'view'      => [
		       'showToAdmin' => FALSE,
		       'value'       => 'form/checkBoxWithTextArea',
		       'editable'   => FALSE,
	       ]
	],

	9 => [ // Checkbox with 2 textarea
				 'label'     => [
					 'showToAdmin' => TRUE,
					 'value'       => '',
				 ],
				 'label1'     => [
		       'showToAdmin' => TRUE,
		       'value'       => '',
	       ],
				 'label2'     => [
		       'showToAdmin' => TRUE,
		       'value'       => '',
	       ],
				 'validations'     => [
					 'showToAdmin' => TRUE,
					 'value'       => '',
				 ],
				 'value'     => [
					 'showToAdmin' => FALSE,
					 'value'       => '',
				 ],
				 'name'     => [
					 'showToAdmin' => TRUE,
					 'value'       => 'input',
				 ],
				 'adminView' => [
					 'showToAdmin' => FALSE,
					 'value'       => 'admin/fields/checkBoxWithTextAreas',
					 'editable'   => FALSE,
				 ],
				 'view'      => [
					 'showToAdmin' => FALSE,
					 'value'       => 'form/checkBoxWithTextAreas',
					 'editable'   => FALSE,
				 ]
	],

];


return $config;
