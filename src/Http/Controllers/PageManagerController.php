<?php

namespace LifeSat\PageManager\Http\Controllers;

use Orchestra\Routing\Controller;

class PageManagerController extends Controller
{
    /**
     * Control dashboard.
     *
     * @return mixed
     */
    public function index()
    {
        set_meta('title', 'PageManager');

        return view('lifesat/pagemanager::home');
    }
}
