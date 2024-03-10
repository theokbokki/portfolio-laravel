<?php

namespace App\Enums;

enum PostType: string
{
    case Work = 'work';
    case Article = 'article';

    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }

        return $options;
    }

    public static function values()
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::Work => __('post_type.work'),
            self::Article => __('post_type.article'),
        };
    }

    public static function icon(string $type): string
    {
        return match ($type) {
            self::Work->value => '/images/work.svg',
            self::Article->value => '/images/article.svg',
        };
    }
}
