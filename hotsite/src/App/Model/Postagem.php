<?php

namespace Tlv\Hotsite\App\Model;

class Postagem extends Model
{
    public static function ListAll()
    {
        $conn = self::DB();
        $sql = "SELECT * FROM postagem ORDER BY id DESC";

        $rs = $conn->prepare($sql);
        $rs->execute();

        return self::Result($rs);
    }

    public static function getById(int $post_id)
    {
        $conn = self::DB();
        $sql = "SELECT * FROM postagem  WHERE id = :id";

        $rs = $conn->prepare($sql);
        $rs->bindValue(':id', $post_id);
        $rs->execute();

        return self::Result($rs);
    }
}
