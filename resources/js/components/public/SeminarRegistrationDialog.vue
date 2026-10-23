<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { computed, onMounted, watch } from 'vue';
import * as SeminarController from '@/actions/App/Http/Controllers/Public/SeminarController';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { RadioGroup, RadioGroupItem } from '@/components/ui/radio-group';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Textarea } from '@/components/ui/textarea';
import { useAttendeeStorage } from '@/composables/useAttendeeStorage';
import { sectionStyle } from '@/composables/usePageColor';
import { formatEventDate } from '@/lib/event-dates';
import type { EventResource } from '@/types/public';

const props = defineProps<{
    event: EventResource;
}>();

const open = defineModel<boolean>('open', { required: true });

const color = computed(() => props.event.event_type.color);

// Portaled content renders outside .public-layout, so it needs the class and section colors itself.
const style = computed(() => sectionStyle(color.value));

const { load, save, clear } = useAttendeeStorage();

const form = useForm({
    salutation: '',
    firstname: '',
    surname: '',
    phone: '',
    email: '',
    attendance: 1,
    message: '',
    save_data: false,
});

onMounted(() => {
    const saved = load();

    if (saved) {
        form.salutation = saved.salutation;
        form.firstname = saved.firstname;
        form.surname = saved.surname;
        form.phone = saved.phone;
        form.email = saved.email;
        form.save_data = true;
    }
});

watch(
    () => form.save_data,
    (should) => {
        if (!should) {
            clear();
        }
    },
);

watch(
    () => props.event.uuid,
    () => form.reset('attendance'),
);

watch(open, (isOpen) => {
    if (!isOpen) {
        form.clearErrors();
    }
});

function submit(): void {
    if (form.save_data) {
        save({
            salutation: form.salutation,
            firstname: form.firstname,
            surname: form.surname,
            phone: form.phone,
            email: form.email,
        });
    }

    form.post(SeminarController.register.url(props.event.uuid), {
        // Scroll to the top on success so the flash message is visible.
        preserveScroll: 'errors',
        onSuccess: () => {
            if (form.save_data) {
                form.reset('attendance', 'message');
            } else {
                form.reset();
            }

            open.value = false;
        },
    });
}

const startsAt = computed(() =>
    formatEventDate(props.event.date_from, {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }),
);

const total = computed(() =>
    props.event.price === null
        ? null
        : (props.event.price / 100) * form.attendance,
);

const labelClass =
    'mb-1 self-start text-base leading-6 font-normal text-gray-700 sm:mt-2 sm:mb-0';
</script>

<template>
    <Dialog v-model:open="open">
        <DialogContent
            class="public-layout max-h-[calc(100dvh-2rem)] overflow-y-auto px-4 pt-5 pb-4 sm:max-w-2xl md:p-6 md:pt-5"
            :style="style"
            :show-close-button="false"
        >
            <form class="grid gap-5" @submit.prevent="submit">
                <DialogHeader class="gap-1 text-left">
                    <DialogTitle
                        class="text-lg leading-6 font-medium"
                        :class="`text-${color}-600`"
                    >
                        {{ event.event_type.name }}
                    </DialogTitle>
                    <DialogDescription
                        v-if="event.description"
                        class="leading-5 text-gray-500"
                    >
                        {{ event.description }}
                    </DialogDescription>
                    <p class="text-sm leading-5 font-medium text-gray-500">
                        {{ startsAt }}
                    </p>
                </DialogHeader>

                <div
                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-6"
                >
                    <Label id="salutation" as="span" :class="labelClass">
                        Anrede
                    </Label>
                    <div class="sm:col-span-2">
                        <RadioGroup
                            v-model="form.salutation"
                            class="mt-2 flex gap-4 md:mt-3"
                            aria-labelledby="salutation"
                            :aria-invalid="!!form.errors.salutation"
                        >
                            <div
                                v-for="option in [
                                    { value: 'Mrs', label: 'Frau' },
                                    { value: 'mr', label: 'Herr' },
                                ]"
                                :key="option.value"
                                class="flex items-center gap-2"
                            >
                                <RadioGroupItem
                                    :id="`salutation-${option.value}`"
                                    :value="option.value"
                                />
                                <Label
                                    :for="`salutation-${option.value}`"
                                    class="cursor-pointer text-base font-normal text-gray-700"
                                >
                                    {{ option.label }}
                                </Label>
                            </div>
                        </RadioGroup>
                        <InputError
                            class="pt-2"
                            :message="form.errors.salutation"
                        />
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <Label for="firstname" :class="labelClass">Name</Label>
                    <div
                        class="flex max-w-lg items-start gap-4 sm:col-span-2 sm:max-w-xs"
                    >
                        <div class="w-full">
                            <Input
                                id="firstname"
                                v-model="form.firstname"
                                placeholder="Vorname"
                                autocomplete="given-name"
                                class="h-10"
                                :aria-invalid="!!form.errors.firstname"
                            />
                            <InputError
                                class="pt-2"
                                :message="form.errors.firstname"
                            />
                        </div>
                        <div class="w-full">
                            <Input
                                v-model="form.surname"
                                placeholder="Nachname"
                                aria-label="Nachname"
                                autocomplete="family-name"
                                class="h-10"
                                :aria-invalid="!!form.errors.surname"
                            />
                            <InputError
                                class="pt-2"
                                :message="form.errors.surname"
                            />
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <Label for="phone" :class="labelClass">Telefon</Label>
                    <div class="max-w-lg sm:col-span-2 sm:max-w-xs">
                        <Input
                            id="phone"
                            v-model="form.phone"
                            type="tel"
                            autocomplete="tel"
                            class="h-10"
                            :aria-invalid="!!form.errors.phone"
                        />
                        <InputError class="pt-2" :message="form.errors.phone" />
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <Label for="email" :class="labelClass">E-Mailadresse</Label>
                    <div class="max-w-lg sm:col-span-2 sm:max-w-xs">
                        <Input
                            id="email"
                            v-model="form.email"
                            type="email"
                            autocomplete="email"
                            class="h-10"
                            :aria-invalid="!!form.errors.email"
                        />
                        <InputError class="pt-2" :message="form.errors.email" />
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <Label for="attendance" :class="labelClass">
                        Teilnehmer
                    </Label>
                    <div class="sm:col-span-2">
                        <div class="flex items-center gap-3">
                            <Select v-model="form.attendance">
                                <SelectTrigger
                                    id="attendance"
                                    class="h-10 min-w-20"
                                    :aria-invalid="!!form.errors.attendance"
                                >
                                    <SelectValue />
                                </SelectTrigger>
                                <SelectContent
                                    class="public-layout"
                                    :style="style"
                                >
                                    <SelectItem
                                        v-for="n in event.available_seats"
                                        :key="n"
                                        :value="n"
                                    >
                                        {{ n }}
                                    </SelectItem>
                                </SelectContent>
                            </Select>
                            <div v-if="total !== null">
                                {{ total }} &euro;
                                <span
                                    v-if="form.attendance > 1"
                                    class="ml-1 inline-block text-xs text-gray-500 italic"
                                >
                                    gesamt
                                </span>
                            </div>
                        </div>
                        <InputError
                            class="pt-2"
                            :message="form.errors.attendance"
                        />
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <Label for="message" :class="labelClass">Nachricht</Label>
                    <div class="max-w-lg sm:col-span-2 sm:max-w-xs">
                        <Textarea
                            id="message"
                            v-model="form.message"
                            :aria-invalid="!!form.errors.message"
                        />
                        <InputError
                            class="pt-2"
                            :message="form.errors.message"
                        />
                        <div class="pt-2 text-xs leading-tight text-gray-500">
                            Solltest du mehrere Personen zu einem Seminar
                            anmelden, sei doch bitte so nett und hinerlasse mir
                            Vor- und Nachnamen dieser Personen.
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                    <div class="hidden sm:block" />
                    <div class="flex items-center gap-2 sm:col-span-2">
                        <Checkbox id="save_data" v-model="form.save_data" />
                        <Label
                            for="save_data"
                            class="cursor-pointer text-base leading-5 font-normal text-gray-700"
                        >
                            Meine Daten für künftige Anmeldungen speichern
                        </Label>
                    </div>
                </div>

                <DialogFooter
                    class="mt-1 flex-row-reverse justify-start sm:flex-row-reverse sm:justify-start sm:border-t sm:border-gray-200 sm:pt-6 md:flex-row"
                >
                    <Button
                        type="submit"
                        size="lg"
                        class="text-base"
                        :disabled="form.processing"
                    >
                        Anmelden
                    </Button>
                    <DialogClose as-child>
                        <Button
                            type="button"
                            variant="outline"
                            size="lg"
                            class="text-base font-normal"
                        >
                            Verwerfen
                        </Button>
                    </DialogClose>
                </DialogFooter>
            </form>
        </DialogContent>
    </Dialog>
</template>
