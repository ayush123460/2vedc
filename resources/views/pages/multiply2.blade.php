@extends('pages.calculate')

@section('calc')

Matrix:<br>
    <?PHP
    // make counter for box-
    $counter = 0;
    // echo some space for top number
        echo '<div class="spacing2"></div>';
        // echo top number row
        //counter for number row
        $counter2 = 0;
        for($s = 0; $s < strlen((string)$b); $s++)
            echo '<div class="no no-' . $counter2++ . '">' . $no2[$s] . '</div><div class="spacing"></div>';
        // break for table to start
        echo '<br>';
        // counter for number column
        $s = 0;
        // loop to print no. column and matrix
        for($i = 0; $i < $aC * 2; $i++) {
            if($i % 2 == 0) {
                echo '<div class="no1 no1-' . $s . '">' . $no1[$s] . '</div>';
                $s++;
            } else {
                echo '&nbsp;&nbsp;';
            }
            // print matrix row by row
            for($j = 0; $j < $bC * 2; $j++) {
                if($arr[$i][$j] != -1) {
                    echo '<div class="inner-box box-' . $counter++ . '"><center>' . $arr[$i][$j] . '</center></div>';
                } else
                    echo '<div class="inner-box"><div class="black"><div class="line"></div></div></div>';
            }
            // echo row break
            echo '<br>';
        }
    ?>
    Result: {{ $sum }}
    <br>
    <br>
    <button class="btn btn-primary" onclick="red()">Run Simulation</button>

@endsection