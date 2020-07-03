export default {
    types: {

        border: {
            default: [
                'border-gray-200',
                'focus:border-%s-500',
                'hover:border-%s-500',
                'md:border-b-4',
            ],
            active: [
                'border-%s-500',
            ],
        },

        default: {
            default: [
                'duration-150',
                'focus:bg-%s-500',
                'focus:bg-opacity-25',
                'hover:bg-%s-500',
                'hover:bg-opacity-10',
                'items-center',
                'leading-none',
                'lg:px-4',
                'lg:text-base',
                'pt-1',
                'px-2',
                'text-%s-600',
                'text-sm',
                'hover:z-20',
                'z-0',
            ],
            active: [
                'bg-%s-400',
                'bg-opacity-25',
                'text-%s-600',
            ],
        },

        dropdown: {
            default: [
                'block',
                'duration-150',
                'focus:bg-%s-500',
                'focus:bg-opacity-25',
                'focus:outline-none',
                'hover:bg-%s-500',
                'hover:bg-opacity-10',
                'md:text-base',
                'px-4',
                'py-3',
                'text-%s-600',
                'text-sm',
            ],
            active: [
                'bg-%s-100',
                'text-%s-600',
            ],
        },

    }
}
