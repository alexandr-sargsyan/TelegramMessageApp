<?php

namespace App\Enums;

enum MessageParseMode: string
{
    use EnumHelper;

    case MarkdownV2 = 'MarkdownV2';
    case HTML = 'HTML';
    case Markdown = 'Markdown';
}
