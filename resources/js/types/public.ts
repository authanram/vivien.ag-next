export type EventTypeResource = {
    uuid: string;
    name: string;
    color: string;
    description: string | null;
};

export type EventResource = {
    uuid: string;
    event_type: EventTypeResource;
    event_location: string | null;
    event_location_label: string | null;
    custom_event_location: string | null;
    event_day: string | null;
    event_day_label: string | null;
    date_from: string;
    date_to: string;
    maximum_attendees: number;
    reserved_seats: number;
    available_seats: number;
    duration_hours: number | null;
    duration_days: number | null;
    is_multi_day: boolean;
    price: number | null;
    price_note: string | null;
    catering: string[];
    lead: string | null;
    description: string | null;
    created_at: string;
};

export type ImageStripItem = {
    top: number;
    left: number;
    height: number;
    rotate: number;
    rotate_x: number;
    rotate_y: number;
    perspective: number;
    zindex: number;
    position: string;
    url: string;
    thumb_url: string;
};
