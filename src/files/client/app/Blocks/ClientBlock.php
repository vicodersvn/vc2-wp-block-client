<?php

namespace App\Blocks;

use App\Blocks\GutenburgBlock;

class ClientBlock extends GutenburgBlock
{
    public $name = 'vc_client';
    public $title = 'VC Client';
    public $description = 'VC Client Gutenburg Block';
    public $category = 'formatting';
    public $icon = 'images-alt2';
    public $align = 'full';

    public function __construct()
    {
        add_action('acf/init', [$this, 'register_block']);
    }

    public function register_block()
    {
        if (function_exists('acf_register_block_type')) {
            acf_register_block_type([
                'name' => $this->name,
                'title' => $this->title,
                'description' => $this->description,
                'render_callback' => [$this,'render'],
                'category' => $this->category,
                'icon' => $this->icon,
                'align' => $this->align,
            ]);
        }
    }

    public function render($block)
    {
        return view('blocks/_vc2_client_block',['block'=>$block]);
    }
}

