<?php

namespace App\Http\Controllers\Contests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contests\SendRequest;
use App\Http\Services\Contests\SendMail;

class IndexController extends Controller
{
    /**
     * List contests.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('contests.index');
    }

    /**
     * Show detail contest.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function art()
    {
        return view('contests.art');
    }

    /**
     * Show detail contest.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send(SendRequest $request)
    {
        $data = $request->validated();

        $mail = SendMail::send(
            "Заявка на {$data['contest_type']}",
            "ФИО конкурсанта: <b>{$data['initials']}</b><br/>Место проживания: <b>{$data['address']}</b>
                <br/>Контакты (телефон, email): <b>{$data['contacts']}</b>
                <br/>Раздел: <b>{$data['section']}</b>
                <br/>Возрастная категория: <b>{$data['age_category']}</b>
                <br/>Номинация «Изобразительное искусство»: <b>{$data['nomination']}</b>"
        );

        return view($mail ? 'contests.success' : 'contests.wrong');
    }
}
