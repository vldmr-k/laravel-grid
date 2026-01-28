<?php 

namespace Boduch\Grid;

use Boduch\Grid\Decorators\Html;
use Symfony\Component\HttpFoundation\ParameterBag;

class Footer 
{

    use AttributesTrait;

    public function __construct() {
        $this->attributes = new ParameterBag();
    }

    /**
     * @var Column
     */
    protected $column;

    /**
     * @var \Closure
     */
    protected $render;

    /**
     * @param Column $column
     */
    public function setColumn(Column $column)
    {
        $this->column = $column;
    }

    public function getColumn()
    {
        return $this->column;
    }
        
    public function setRender(\Closure $render): self
    {
        $this->render = $render;
        return $this;
    }

    public function render()
    {
        $rows = $this->getColumn()->getGrid()->getRows();
        $cells = array_map(fn($row) => $row->get($this->getColumn()->getName()), $rows->toArray());
        return $this->render->call($this, $this->column, $rows, $cells);
    }
}