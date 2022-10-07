<?php

namespace Tlv\Hotsite\App\Model;

class Cliente extends Model
{
    public static function ListAll()
    {
        $conn = self::DB();
        $sql = "SELECT * FROM cliente ORDER BY id ASC";

        $rs = $conn->prepare($sql);
        $rs->execute();

        return self::Result($rs);
    }
}
