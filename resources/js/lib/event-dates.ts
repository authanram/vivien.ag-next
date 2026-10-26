// Event times are stored as wall-clock values in the UTC app timezone.
export function formatEventDate(
    iso: string,
    options: Intl.DateTimeFormatOptions,
): string {
    return new Date(iso).toLocaleString('de-DE', {
        ...options,
        timeZone: 'UTC',
    });
}

export function eventTime(iso: string): string {
    return formatEventDate(iso, { hour: '2-digit', minute: '2-digit' });
}

export function eventDateTime(iso: string): string {
    return formatEventDate(iso, {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
}
