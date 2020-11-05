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
        //$res = json_decode(file_get_contents("https://api.cambio.today/v1/quotes/EUR/PEN/json?quantity=2&key=5235|zA4mrWtCr*f33HFpdF7b~cHLv^*3rrsW"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cambio.today/v1/quotes/EUR/PEN/json?quantity=2&key=5235|zA4mrWtCr*f33HFpdF7b~cHLv^*3rrsW");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($ch));
        curl_close($ch);
        $value_euro = $res->result->value;
        return $value_euro;
    }
}
