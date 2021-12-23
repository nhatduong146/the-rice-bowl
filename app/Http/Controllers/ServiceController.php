<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getAllService()
    {
        $services = Service::all();
        return view('service', compact('services'));
    }
}
