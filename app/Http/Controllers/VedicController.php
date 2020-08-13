<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class VedicController extends Controller
{
    private $arr = array();
    
    private function diagSum($i, $j, $a, $b) {
        $sum = 0;
        while($i <= $this->countDigits($a) * 2 - 1 && $j >= 0)
            $sum += $this->arr[$i++][$j--];
        return $sum;
    }
    private function countDigits($x) {
        return strlen((string)$x);
    }
    private function multiply($a, $b) {
        $t1 = $a;
        $t2 = $b;
        
        // $arr = [$this->countDigits($a*2)][$this->countDigits($b*2)];

        $no1 = array();
        for($i = $this->countDigits($a) - 1; $i >= 0; $i--) {
            $no1[$i] = $t1 % 10;
            $t1 /= 10;
        }
        for($i = $this->countDigits($b) - 1; $i >= 0; $i--) {
            $no2[$i] = $t2 % 10;
            $t2 /= 10;
        }
        $t1 = $a;
        $t2 = $b;

        $rsum = array();

        $i = $this->countDigits($a) - 1;
        $j = $this->countDigits($b) - 1;

        while($i >= 0) {
            $no1[$i--] = $t1 % 10;
            $t1 /= 10;
        }

        while($j >= 0) {
            $no2[$j--] = $t2 % 10;
            $t2 /= 10;
        }

        // initialize array
        for($i = 0; $i < $this->countDigits($a) * 2; $i++)
            for($j = 0; $j < $this->countDigits($b) * 2; $j++)
                $this->arr[$i][$j] = -1;
        // initialize rsum
        for($i = 0; $i < 100; $i++)
            $rsum[$i] = -1;

        // populate with real values
        for($i = 0; $i < $this->countDigits($a); $i++) {
            for($j = 0; $j < $this->countDigits($b); $j++) {

                $this->arr[$i*2+1][$j*2+1] = (int) ($no1[$i] * $no2[$j]);

                if($this->countDigits($this->arr[$i*2+1][$j*2+1]) == 1)
                    $this->arr[$i*2][$j*2] = 0;
                else if($this->countDigits($this->arr[$i*2+1][$j*2+1]) != 1) {
                    $this->arr[$i*2][$j*2] = (int) (($no1[$i] * $no2[$j]) / 10);
                    $this->arr[$i*2+1][$j*2+1] = (int) (($no1[$i] * $no2[$j]) % 10);
                }
            }
        }

        // dd($this->arr);

        $j = $this->countDigits($b) * 2 - 1;
        $ctr = sizeof($rsum) - 1;

        // now find the multiplication value

        $j = $this->countDigits($b) * 2 - 1;

        for($i = ($this->countDigits($a) * 2) - 1; $i >= 0; $i--) {
            if($this->arr[$i][$j] != -1)
                $rsum[$ctr--] = $this->diagSum($i, $j, $a, $b);
        }
        $i += 1;
        for($j = ($this->countDigits($b) * 2) - 1; $j >= 0; $j--) {
            if($this->arr[$i][$j] != -1)
                $rsum[$ctr--] = $this->diagSum($i, $j, $a, $b);
        }

        // dd($rsum);

        $ctr = sizeof($rsum) - 1;

        while($rsum[$ctr] != -1) {
            if($rsum[$ctr] == -1)
                break;
            else if($ctr != 99) {
                $rsum[$ctr] += (int) ($rsum[$ctr+1] / 10);
                $rsum[$ctr+1] = (int) ($rsum[$ctr+1] % 10);
            }
            $ctr--;
        }

        // dd($rsum);

        $flg = $sum = 0;

        for($i = 0; $i < sizeof($rsum); $i++)
            if($rsum[$i] != -1) {
                $flg++;
                if($flg == 1 && $rsum[$i] == 0) {
                    $flg++;
                    continue;
                }
                $sum = $sum * 10 + $rsum[$i];
            }
        return ['sum' => $sum, 'no1' => $no1, 'no2' => $no2, 'arr' => $this->arr];
    }

    public function multiplication(Request $req) {
        $a = (int)$req->num1;
        $b = (int)$req->num2;

        if($a == 0 || $b == 0)
        return Redirect::back()->withErrors([
            'The answer is 0.<br>Please enter non-zero numbers.'
        ]);

        $res = $this->multiply($a, $b);
        // dd($res);
        $no1 = array();
        $no2 = array();
        $sum = $res['sum'];
        $no1 = $res['no1'];
        $no2 = $res['no2'];
        $arr = $res['arr'];

        return view('pages.multiply2')->with([
            'a' => $a,
            'b' => $b,
            'no1' => $no1,
            'no2' => $no2,
            'aC' => $this->countDigits($a),
            'bC' => $this->countDigits($b),
            'arr' => $arr,
            'sum' => $sum
        ]);
    }

    public function square(Request $req) {
        $a = (int)$req->num1;

        if($a == 0)
            return Redirect::back()->withErrors([
                'The answer is 0.<br>Please enter non-zero numbers.'
            ]);
        
        $res = $this->multiply($a, $a);
        $sum = $res['sum'];
        $no1 = $res['no1'];
        $no2 = $res['no2'];
        $arr = $res['arr'];

        return view('pages.multiply2')->with([
            'a' => $a,
            'b' => $a,
            'no1' => $no1,
            'no2' => $no2,
            'aC' => $this->countDigits($a),
            'bC' => $this->countDigits($a),
            'arr' => $arr,
            'sum' => $sum
        ]);
    }
    public function cube(Request $req) {
        $a = (int)$req->num1;

        if($a == 0)
            return Redirect::back()->withErrors([
                'The answer is 0.<br>Please enter non-zero numbers.'
            ]);

        $res1 = $this->multiply($a, $a);
        $sum1 = $res1['sum'];
        $no11 = $res1['no1'];
        $no21 = $res1['no2'];
        $arr1 = $res1['arr'];

        $res2 = $this->multiply($sum1, $a);
        $sum2 = $res2['sum'];
        $no12 = $res2['no1'];
        $no22 = $res2['no2'];
        $arr2 = $res2['arr'];

        return view('pages.cube2')->with([
            'a' => $a,
            'b' => $a,
            'c' => $sum1,
            'no11' => $no11,
            'no21' => $no21,
            'aC' => $this->countDigits($a),
            'bC' => $this->countDigits($a),
            'cC' => $this->countDigits($sum1),
            'arr1' => $arr1,
            'sum1' => $sum1,
            'no12' => $no12,
            'no22' => $no22,
            'arr2' => $arr2,
            'sum2' => $sum2
        ]);
    }

    public function sqrt(Request $req) {
        $a = (int) $req->num1;
        $ctr = 0;
        $num = array();
        $t = (int) $a;
        $ld = (int) $t % 10;
        $num[0] = $num[1] = (int) 0;
        for($i = 0; $i < 10; $i++) {
            if($i*$i%10 == $ld) {
                $num[$ctr] = $num[$ctr++] * 10 + $i;
            }
        }
        $t /= 100;
        for($i = 0; $i*$i <= $t; $i++) {
        }
        $i--;
        $num[0] = $i * 10 + $num[0];
        $num[1] = $i * 10 + $num[1];
        if($num[0] * $num[0] == $a)
            return view('pages.sqrt2')->with('sqrt', $num[0]);
        else if($num[1] * $num[1] == $a)
        return view('pages.sqrt2')->with('sqrt', $num[1]);
        else
        return view('pages.sqrt2')->with('sqrt', -1);
    }

    public function cbrt(Request $req) {
        $num = (int) $req->num1;
        $a1 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $a2 = [0, 1, 8, 7, 4, 5, 6, 3, 2, 9];
        $cbrt = 0;
        $t = 0;
        $a = $num;
        for($i = 0; $i * $i * $i <= $num; $i++) {}
        $i--;
        if($i * $i * $i != $num)
            return view('pages.sqrt2')->with('sqrt', 'Cube Root does not exist.');
        while($a != 0) {
            $t++;
            $a /= 10;
        }
        $a = $num;
        for($i = 0; $i < 9; $i++) {
            if($a % 10 == $a1[$i])
                break;
        }
        $cbrt = $a2[$i];
        $a /= 1000;
        for($i = 0; $i < 100000000; $i++)
            if($a >= $i*$i*$i && $a < ($i+1)*($i+1)*($i+1))
                break;
        $cbrt += $i * 10;
        if($cbrt * $cbrt * $cbrt == $num)
            return view('pages.sqrt2')->with('sqrt', $cbrt);
        else
            return view('pages.sqrt2')->with('sqrt', 'Number is not a perfect cube.');
    }

    public function division(Request $req) {
        $a = (int) $req->divisor;
        $n = (int) $req->dividend;
        if($a == 0)
            return view('pages.div2')->with('q', 'Not defined.');
        $c = $this->countDigits($a);
        if((pow(10, $c) - $a) > $a - (pow(10, $c - 1)))
            $base = (int) pow(10, $c - 1);
        else
            $base = (int) pow(10, $c);
        if($base == 10) {
            $comp = (int) ($base - $a);
            $b = (int) ($n / $base);
            $d = (int) ($n % $base);
            $m = $this->countDigits($b);
            $base2 = (int) pow(10, $m - 1);
            $b1 = (int) ($b/ $base2);
            $b2 = (int) ($b % $base2 + $b1 * $comp);
            $q = (int) ($b1 * $base2 + $b2);
            $r = (int) ($d + $b2 * $comp);
            while($r >= $a) {
                $q++;
                $r -= $a;
            }
            return view('pages.div2')->with([
                'q' => $q,
                'r' => $r
            ]);
        } else {
            $comp = (int) $base - $a;
            $b = (int) ($n / $base);
            $d = (int) (($n % $base) + ($b * $comp));
            while($d >= $a) {
                $b++;
                $d -= $a;
            }
            if($d != 0) {
                return view('pages.div2')->with([
                    'q' => $b,
                    'r' => $d
                ]);
            } else {
                return view('pages.div2')->with('q', $b);
            }
        }
    }
}
