<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    final public function run(): void
    {
        $this->call(UsersTableSeeder::class);

        $this->call(AttachmentsTableSeeder::class);
        $this->call(StaticAttributesTableSeeder::class);

        $this->call(ColorsTableSeeder::class);

        $this->call(ImagesTableSeeder::class);
        $this->call(ImageCoordsTableSeeder::class);

        $this->call(MenusTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);

        $this->call(EventTypesTableSeeder::class);
        $this->call(EventLocationsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(AttendeesTableSeeder::class);

        $this->call(PostsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(QuotesTableSeeder::class);

        $this->call(TagsTableSeeder::class);
        $this->call(TaggablesTableSeeder::class);
        $this->call(ActionEventsTableSeeder::class);

        $this->call(CookieConsentProvidersTableSeeder::class);
        $this->call(CookieConsentCookiesTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(RouteContentTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);

        $this->call(StaffsTableSeeder::class);
        $this->call(EventCateringsSeeder::class);
    }
}
