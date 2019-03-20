<?php

namespace nxtlvlsoftware\githubwebhooks\handler\fixtures;

class Request extends \Illuminate\Http\Request
{
    public function getContentType()
    {
        return 'application/json';
    }

    public function getContent($asResource = false)
    {
        return '';
    }
}