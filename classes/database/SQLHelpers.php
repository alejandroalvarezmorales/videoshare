<?php


class SQLHelpers
{


    public static function get_conditions(array $post)
    {
        $str = "";

        if ($post["__c"] && sizeof($post["__c"]) > 0) {
            foreach ($post["__c"] as $key => $value) {
                $col = explode(":", $value);
                if (sizeof($col) > 1) {
                    $str .= " $col[0] $col[1] :$col[0] ";
                } else {
                    $str .= " $value ";
                }
            }
            $str = " WHERE " . $str;
        }
        return $str;
    }

    public static function get_fields(array $post)
    {
        $str = "*";
        if ($post["__f"] && sizeof($post["__f"]) > 0) {
            $str = join(", ", $post["__f"]);
        }
        return "SELECT " . $str;
    }

    public static function get_tables(array $get, array $post)
    {
        $str = $get["__p"];
        if ($post["__t"] && sizeof($post["__t"]) > 0) {
            $str = join(", ", $post["__t"]);
        }
        return "FROM " . $str;
    }


    public static function get_groupby(array $post)
    {
        $str = "";
        if ($post["__g"] && sizeof($post["__g"]) > 0) {
            $str = join(", ", $post["__g"]);
            $str = " GROUP BY " . $str;
        }
        return $str;
    }

    public static function get_orderby(array $post)
    {
        $str = "";
        if ($post["__o"] && sizeof($post["__o"]) > 0) {
            $arr = [];
            foreach ($post["__o"] as $key => $value) {
                $arr[] = str_replace(":", " ", $value);
            }
            $str = join(", ", $arr);
            $str = " ORDER BY " . $str;
        }
        return $str;
    }

    public static function get_limit(array $post)
    {
        $str = "";
        if ($post["__l"]) {
            $str = " LIMIT " . $post["__l"];
        }
        return $str;
    }



    public static function get_select($get, $post)
    {
        $t = self::get_tables($get, $post);
        $f = self::get_fields($post);
        $c = self::get_conditions($post);
        $o = self::get_orderby($post);
        $g = self::get_groupby($post);
        $l = self::get_limit($post);

        return "$f $t $c $g $o $l";
    }

    public static function get_insert($get, $post)
    {
        $cols = array_diff_key($post, SPECIAL_FIELDS);
        $fields = "(" . join(", ", array_keys($cols)) . ")";
        $values = "(:" . join(", :", array_keys($cols)) . ")";
        $table = $get["__p"];

        return "INSERT INTO $table $fields values $values";
    }

    public static function get_delete($get, $post)
    {
        $t = $get["__p"];
        $id = $post["__id"];
        return "DELETE FROM $t WHERE $id = :$id";
    }

    public static function get_update($get, $post)
    {
        $cols = array_diff_key($post, SPECIAL_FIELDS);
        $fields = [];
        foreach ($cols as $key => $value) {
            $fields[] = "$key = :$key";
        }
        $sets = join(", ", $fields);

        $t = $get["__p"];
        $id = $post["__id"];

        return "UPDATE $t SET $sets WHERE $id = :$id";
    }
}
