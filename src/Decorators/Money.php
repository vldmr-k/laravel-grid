<?php

namespace Boduch\Grid\Decorators;

use Boduch\Grid\Cell;


class Money
{
    private \NumberFormatter $formatter;

    public function __construct(private string $currency = 'USD', private string $locale = 'en_US')
    {
        $this->formatter = new \NumberFormatter($locale, \NumberFormatter::CURRENCY);
    }

    /**
     * @param float $value
     * @return string
     */
    public function format(float $value) {
        return $this->formatter->formatCurrency($value, $this->currency);
    }

    /**
     * @param Cell $cell
     */
    public function decorate(Cell $cell)
    {
        $cell->setValue(
            $this->format((float) $cell->getValue())
        );
    }
}
