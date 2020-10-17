<?php


namespace app\Http\Controllers;


class Pareto
{


    static function get_matrix($crit, $values, $weight) {
        $count = 0;
        foreach ($values as $v) {
            $count += in_array($v, $crit);
        }
       if ( count($values) > 0) {
       return ($weight * $count) / count($values);
} 
        return 0;
    }

    


    static function weight($set, $weights) {
        foreach ($set as &$item) {
            foreach ($weights as $crit=>$weight) {
                $item[$crit] *= (float)$weight;
            }
        }
        return $set;
    }

    static function additive_convolution($set) {
        return array_sum($set);
    }

    static function multiplicative_convolution($set) {
        array_shift($set);
        return array_product($set);
    }

    static function deleteElement($element, &$array){
        $index = array_search($element, $array);
        if($index !== false){
            unset($array[$index]);
        }
    }

    static function is_greater($x, $y) {
        $criteria = false;
        $keys = array_keys($x);
        self::deleteElement('name', $keys);
        foreach($keys as $key) {
            if ($x[$key] < $y[$key]) {return false;}
            else if ($x[$key] > $y[$key]) {$criteria = true;}
        }
        return $criteria;
    }

    static function set($set, $weights) {
        $pareto = collect($set)->map(function($x){ return (array) $x; })->toArray();
        // fix capital
        if (isset($weights['capital'])) $weights['capital'] = $weights['capital'] / 10000000;
        $pareto = self::weight($pareto, $weights);
        foreach($pareto as $e) {
            foreach($pareto as $k) {
                if (self::is_greater($k, $e)) {self::deleteElement($e, $pareto);}
            }
        }
        $multiplication = env('MULTIPLICATION') == '1';
        foreach($pareto as &$p) {
          $index =  ( $multiplication ? self::multiplicative_convolution($p) : self::additive_convolution($p) );

          $p["overall_index"] = $index;
        }
        usort($pareto, function($a, $b) {
            return $b['overall_index'] <=> $a['overall_index'];
        });
        return $pareto;
    }


}