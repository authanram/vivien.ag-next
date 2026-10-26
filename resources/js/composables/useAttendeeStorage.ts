const STORAGE_KEY = 'vivien_attendee_data';

export type AttendeeData = {
    salutation: string;
    firstname: string;
    surname: string;
    phone: string;
    email: string;
};

export function useAttendeeStorage() {
    function load(): AttendeeData | null {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            return raw ? (JSON.parse(raw) as AttendeeData) : null;
        } catch {
            return null;
        }
    }

    function save(data: AttendeeData): void {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
        } catch {
            // Silently fail if localStorage is not available
        }
    }

    function clear(): void {
        try {
            localStorage.removeItem(STORAGE_KEY);
        } catch {
            // Silently fail
        }
    }

    function has(): boolean {
        return load() !== null;
    }

    return { load, save, clear, has };
}
