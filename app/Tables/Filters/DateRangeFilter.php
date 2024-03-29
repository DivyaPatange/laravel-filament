<?php

namespace App\Tables\Filters;

use Closure;
use DateTimeInterface;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;

class DateRangeFilter extends Filter
{
    protected string | DateTimeInterface | Closure | null $maxDate = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->form(fn () => [
            Fieldset::make($this->getLabel())
                ->schema([
                    DatePicker::make('from')
                        ->native(false)
                        ->maxDate($this->getMaxDate()),
                    DatePicker::make('to')
                        ->native(false)
                        ->maxDate($this->getMaxDate())
                ])
                ->columns(1)
        ])
        ->query(function (Builder $query, array $data) {
            $query->when(
                $data['from'] ?? null,
                fn (Builder $query) => $query->whereDate($this->getName(), '>=', $data['from'])
            )
            ->when(
                $data['to'] ?? null,
                fn (Builder $query) => $query->whereDate($this->getName(), '<=', $data['to'])
            );
        });
    }

    public function maxDate(string | DateTimeInterface | Closure | null $date): static
    {
        $this->maxDate = $date;

        return $this;
    }

    public function getMaxDate(): string | DateTimeInterface | null
    {
        return $this->evaluate($this->maxDate);
    }
}
