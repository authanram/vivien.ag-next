// Port of the vivien.ag menu classes; %s is replaced by the item's color name.
const menuClasses = {
    border: {
        default: [
            'border-gray-200',
            'focus:border-%s-500',
            'hover:border-%s-500',
            'md:border-b-4',
        ],
        active: ['border-%s-500!'],
    },
    default: {
        default: [
            'duration-150',
            'focus:bg-%s-500/25',
            'hover:bg-%s-500/10',
            'hover:z-20',
            'items-center',
            'leading-none',
            'lg:px-3',
            'lg:text-base',
            'pt-1',
            'px-2',
            'text-%s-600',
            'text-sm',
            'xl:px-4',
            'z-0',
        ],
        active: ['bg-%s-400/25', 'text-%s-600'],
    },
    dropdown: {
        default: [
            'block',
            'duration-150',
            'focus:bg-%s-500/25',
            'focus:outline-hidden',
            'hover:bg-%s-500/10',
            'md:text-base',
            'px-4',
            'py-3',
            'text-%s-600',
            'text-sm',
        ],
        active: ['bg-%s-100', 'text-%s-600'],
    },
};

export function menuClassAttribute(
    color: string,
    type: 'default' | 'dropdown',
    active: boolean,
    border: boolean,
): string {
    const classes = [...menuClasses[type].default];

    if (active) {
        classes.push(...menuClasses[type].active);
    }

    if (border && type !== 'dropdown') {
        classes.push(...menuClasses.border.default);

        if (active) {
            classes.push(...menuClasses.border.active);
        }
    }

    return classes.join(' ').replaceAll('%s', color);
}
