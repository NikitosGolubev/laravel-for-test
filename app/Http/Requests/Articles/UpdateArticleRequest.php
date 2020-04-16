<?php

namespace App\Http\Requests\Articles;

use App\Http\Requests\GeneralRequest;

class UpdateArticleRequest extends GeneralRequest
{
    private $titleParam = 'title';
    private $contentParam = 'content';

    function getData(): array
    {
        return [
            'title' => request($this->titleParam),
            'content' => request($this->contentParam)
        ];
    }

    public function rules()
    {
        return [
            $this->titleParam => ['bail', 'nullable', 'min:10', 'max:255'],
            $this->contentParam => ['bail', 'nullable', 'min:150', 'max:30000']
        ];
    }
}
