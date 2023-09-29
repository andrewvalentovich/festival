<?php


namespace App\Http\Controllers;


class MasterClassesController extends Controller
{
    public function index()
    {
        return view('master_classes.index');
    }

    public function participants()
    {
        return view('master_classes.participants');
    }

    public function schedule()
    {
        return view('master_classes.schedule');
    }

    public function booking()
    {
        return view('master_classes.booking');
    }
}
