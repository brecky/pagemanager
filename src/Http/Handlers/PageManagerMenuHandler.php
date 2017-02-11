<?php

namespace LifeSat\PageManager\Http\Handlers;

use Orchestra\Foundation\Support\MenuHandler;

class PageManagerMenuHandler extends MenuHandler
{
    /**
     * Menu configuration.
     *
     * @var array
     */
    protected $menu = [
        'id'    => 'pagemanager',
        'title' => 'PageManager',
        'link'  => '#!',
        'icon'  => 'puzzle-piece',
        'with'  => [

        ],
    ];

    /**
     * Get position.
     *
     * @return string
     */
    public function getPositionAttribute()
    {
        return $this->handler->has('extensions') ? '>:extensions' : '>:home';
    }

    /**
     * Determine if the request passes the authorization check.
     *
     * @return bool
     */
    protected function passesAuthorization()
    {
        return $this->hasNestedMenu();
    }
}
