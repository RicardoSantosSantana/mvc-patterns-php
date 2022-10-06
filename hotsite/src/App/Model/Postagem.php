<?php

namespace Tlv\Hotsite\App\Model;

class Postagem extends ModelBase
{

    public function ListAll()
    {
        $conn = self::DB();
        $sql = "SELECT * FROM postagem ORDER BY id DESC";

        $rs = $conn->prepare($sql);
        $rs->execute();

        return self::Result($rs);
    }
}
