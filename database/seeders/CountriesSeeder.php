<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'name' => 'United States',
            'code' => 'US',
            'currency' => 'USD',
            'currency_symbol' => '$',
            'phone_code' => '+1',
            'phone_pattern' => '(###) ###-####',
            'timezone' => 'America/New_York',
            'locale' => 'en',
            'flag' => 'https://countryflagsapi.netlify.app/flag/us.svg',
            'active' => true,
        ]);

        Country::create([
            'name' => 'Canada',
            'code' => 'CA',
            'currency' => 'CAD',
            'currency_symbol' => '$',
            'phone_code' => '+1',
            'phone_pattern' => '(###) ###-####',
            'timezone' => 'America/New_York',
            'locale' => 'en',
            'flag' => 'https://countryflagsapi.netlify.app/flag/ca.svg',
            'active' => true,
        ]);

        Country::create([
            'name' => 'United Kingdom',
            'code' => 'GB',
            'currency' => 'GBP',
            'currency_symbol' => '£',
            'phone_code' => '+44',
            'phone_pattern' => '#### ### ####',
            'timezone' => 'Europe/London',
            'locale' => 'en',
            'flag' => 'https://countryflagsapi.netlify.app/flag/gb.svg',
            'active' => true,
        ]);

        Country::create([
            'name' => 'Australia',
            'code' => 'AU',
            'currency' => 'AUD',
            'currency_symbol' => '$',
            'phone_code' => '+61',
            'phone_pattern' => '#### ### ###',
            'timezone' => 'Australia/Sydney',
            'locale' => 'en',
            'flag' => 'https://countryflagsapi.netlify.app/flag/au.svg',
            'active' => true,
        ]);

        Country::create([
            'name' => 'Germany',
            'code' => 'DE',
            'currency' => 'EUR',
            'currency_symbol' => '€',
            'phone_code' => '+49',
            'phone_pattern' => '#### ########',
            'timezone' => 'Europe/Berlin',
            'locale' => 'de',
            'flag' => 'https://countryflagsapi.netlify.app/flag/de.svg',
            'active' => true,
        ]);

        Country::create([
            'name' => 'Mexico',
            'code' => 'MX',
            'currency' => 'MXN',
            'currency_symbol' => '$',
            'phone_code' => '+52',
            'phone_pattern' => '(###) ###-####',
            'timezone' => 'America/Mexico_City',
            'locale' => 'es',
            'flag' => 'https://countryflagsapi.netlify.app/flag/mx.svg',
            'active' => true,
        ]);
    }
}
