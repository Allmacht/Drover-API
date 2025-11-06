<?php

namespace Src\Contexts\Country\Infrastructure\Persistence\Repositories\Eloquent;

use App\Models\Country as EloquentModel;
use Src\Contexts\Country\Domain\Contracts\CountryRepositoryContract;
use Src\Contexts\Country\Domain\Entities\Country;
use Src\Contexts\Country\Domain\ValueObjects\CountryCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrency;
use Src\Contexts\Country\Domain\ValueObjects\CountryCurrencySymbol;
use Src\Contexts\Country\Domain\ValueObjects\CountryFlag;
use Src\Contexts\Country\Domain\ValueObjects\CountryId;
use Src\Contexts\Country\Domain\ValueObjects\CountryName;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhoneCode;
use Src\Contexts\Country\Domain\ValueObjects\CountryPhonePattern;

class CountryRepository implements CountryRepositoryContract
{
    public function getAllAvailableCountries(): array
    {
        return EloquentModel::whereActive(true)->get()
            ->map(fn (EloquentModel $model) => $this->mapEloquentModelToEntity($model))->toArray();
    }

    private function mapEloquentModelToEntity(EloquentModel $model): Country
    {
        return Country::create(
            id: new CountryId(value: $model->id),
            name: new CountryName(value: $model->name),
            code: new CountryCode(value: $model->code),
            currency: new CountryCurrency(value: $model->currency),
            currency_symbol: new CountryCurrencySymbol(value: $model->currency_symbol),
            phone_code: new CountryPhoneCode(value: $model->phone_code),
            phone_pattern: new CountryPhonePattern(value: $model->phone_pattern),
            flag: new CountryFlag(value: $model->flag)
        );
    }
}
