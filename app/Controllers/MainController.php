<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MainController extends Controller {
    public function index() {
        return view('main');
    }
}
