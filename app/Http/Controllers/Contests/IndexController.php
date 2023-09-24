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
    public function poetry()
    {
        return view('contests.poetry');
    }

    /**
     * Show detail contest.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function music()
    {
        return view('contests.music');
    }

    /**
     * Show detail contest.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function send(SendRequest $request)
    {
        $data = $request->validated();

        if (!is_null($data['video_link'])) {
            $mail_body = "ФИО конкурсанта: <b>{$data['initials']}</b>
                <br/>Место проживания: <b>{$data['address']}</b>
                <br/>Телефон: <b>{$data['phone']}</b>
                <br/>Электронная почта: (email): <b>{$data['email']}</b>
                <br/>Раздел: <b>{$data['section']}</b>
                <br/>Возрастная категория: <b>{$data['age_category']}</b>
                <br/>Номинация «{$data['contest_type']}»: <b>{$data['nomination']}</b>
                <br/>Видео: <a href=\"{$data['video_link']}\">{$data['video_link']}</a>";
        } else {
            $mail_body = "ФИО конкурсанта: <b>{$data['initials']}</b>
                <br/>Место проживания: <b>{$data['address']}</b>
                <br/>Телефон: <b>{$data['phone']}</b>
                <br/>Электронная почта: (email): <b>{$data['email']}</b>
                <br/>Раздел: <b>{$data['section']}</b>
                <br/>Возрастная категория: <b>{$data['age_category']}</b>
                <br/>Номинация «{$data['contest_type']}»: <b>{$data['nomination']}</b>";
        }

        $mail = SendMail::send(
            "Заявка на конкурс - {$data['contest_type']}",
            $mail_body,
            $_FILES['files'],
            $_FILES['docs'] ?? null
        );

        return view($mail ? 'contests.success' : 'contests.wrong');
    }
}
