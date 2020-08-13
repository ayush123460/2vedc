@extends('pages.calculate')

@section('calc')

<div class="container">
    <div class="row">
        <div class="col-md-6">
                <?PHP
                // make counter for box-number
                $counter = 0;
                // echo some space for top number
                    echo '<div class="spacing2"></div>';
                    // echo top number row
                    for($s = 0; $s < strlen((string)$b); $s++)
                        echo '<div class="no">' . $no21[$s] . '</div><div class="spacing"></div>';
                    // break for table to start
                    echo '<br>';
                    // counter for number column
                    $s = 0;
                    // loop to print no. column and matrix
                    for($i = 0; $i < $aC * 2; $i++) {
                        if($i % 2 == 0) {
                            echo '<div class="no1 no1-' . $s . '">' . $no11[$s] . '</div>';
                            $s++;
                        } else {
                            echo '&nbsp;&nbsp;';
                        }
                        // print matrix row by row
                        for($j = 0; $j < $bC * 2; $j++) {
                            if($arr1[$i][$j] != -1) {
                                echo '<div class="inner-box box-' . $counter++ . '"><center>' . $arr1[$i][$j] . '</center></div>';
                            } else
                                echo '<div class="inner-box"><div class="black"><div class="line"></div></div></div>';
                        }
                        // echo row break
                        echo '<br>';
                    }
                ?>
                Result: {{ $sum1 }}
        </div>
        <div class="col-md-6">
                <?PHP
                // make counter for box-number
                $counter = 0;
                // echo some space for top number
                    echo '<div class="spacing2"></div>';
                    // echo top number row
                    for($s = 0; $s < strlen((string)$b); $s++)
                        echo '<div class="no">' . $no22[$s] . '</div><div class="spacing"></div>';
                    // break for table to start
                    echo '<br>';
                    // counter for number column
                    $s = 0;
                    // loop to print no. column and matrix
                    for($i = 0; $i < $cC * 2; $i++) {
                        if($i % 2 == 0) {
                            echo '<div class="no1 no1-' . $s . '">' . $no12[$s] . '</div>';
                            $s++;
                        } else {
                            echo '&nbsp;&nbsp;';
                        }
                        // print matrix row by row
                        for($j = 0; $j < $bC * 2; $j++) {
                            if($arr2[$i][$j] != -1) {
                                echo '<div class="inner-box box-' . $counter++ . '"><center>' . $arr2[$i][$j] . '</center></div>';
                            } else
                                echo '<div class="inner-box"><div class="black"><div class="line"></div></div></div>';
                        }
                        // echo row break
                        echo '<br>';
                    }
                ?>
                Result: {{ $sum2 }}
        </div>
    </div>
</div>
    <br>
    <br>
    {{-- <button class="btn btn-primary" onclick="red()">Run Simulation</button> --}}

@endsection