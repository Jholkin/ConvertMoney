<?php

namespace Modules\ConvertMoney\Entities;

use Illuminate\Database\Eloquent\Model;

class Convert extends Model
{
    protected $fillable = [];

    public function convert($price)
    {
        $price_converted = $price * $this->valueEuro();
        echo "aqui";
        dd($price_converted);

        return $price_converted;
    }

    public function valueEuro()
    {
        $res = json_decode(file_get_contents("https://api.cambio.today/v1/quotes/EUR/PEN/json?quantity=2&key=5235|zA4mrWtCr*f33HFpdF7b~cHLv^*3rrsW"));
        $value_euro = $res->result->value;
        return $value_euro;
    }
}
