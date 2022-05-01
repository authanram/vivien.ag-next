<?php

namespace App\View\Components\Menu;

class MenuItemMain extends MenuItem
{
    protected static string $alias = 'components.menu.item';

    protected static function classList(): array
    {
        return [
            'duration-150',
            'focus:bg-COLOR-500',
            'focus:bg-opacity-25',
            'focus:border-COLOR-500',
            'hover:bg-COLOR-500',
            'hover:bg-opacity-10',
            'hover:border-COLOR-500',
            'hover:z-20',
            'inline-flex',
            'items-center',
            'items-center',
            'leading-none',
            'lg:px-3',
            'lg:text-base',
            'md:border-b-4',
            'pt-1',
            'px-2',
            'self-stretch',
            'text-COLOR-600',
            'text-sm',
            'transition-none',
            'xl:px-4',
            'z-0',
        ];
    }

    protected static function classListActive(): array
    {
        return [
            'bg-COLOR-400',
            'bg-opacity-25',
            'border-COLOR-500',
        ];
    }

    protected static function classListNotActive(): array
    {
        return [
            'border-gray-200',
        ];
    }
}
