function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
async function red() {
    let x = $('.inner-box').length;
    let black = $('.black').length;
    let counter = 0;
    let bc = $('.no1').length;
    let ac = $('.no').length;
    let max = black/bc;
    let n = 0;
    let noc = 0;
    let noc2 = 0;

    for($i = 0; $i < x; $i++) {
        if($i == black)
            break;
        $(`.no-${noc2}`).addClass('red2');
        $(`.no1-${noc}`).addClass('red2');
        $(`.box-${$i}`).toggleClass('red');
        let bakwas = $i + ac;
        $(`.box-${bakwas}`).toggleClass('red');
        await sleep(1500);
        $(`.box-${$i}`).toggleClass('red');
        $(`.box-${bakwas}`).toggleClass('red');
        $(`.no-${noc2++}`).removeClass('red2');
        counter++;
        if(noc2 == ac) {
            noc2 = 0;
        }
        if(counter == max/2) {
            $(`.no1-${noc++}`).removeClass('red2');
            $i += ac;
            counter = 0;
        }
    }
}
// $('.no').toggleClass('red1'); 
    // for($i = 0; $i < x; $i++) {
    //     if($i % 2 == 0) {
    //         if(counter == max) {
    //             $(`.no1-${n}`).addClass('red2');
    //             await sleep(2500);
    //             counter = 0;
    //             $(`.red`).toggleClass('red');
    //             $(`.red2`).removeClass('red2');
    //             n++;
    //         }
    //         counter++;
    //         $(`.box-${$i}`).toggleClass('red');
    //     }
    //     if($i % 2 != 0) {
    //         if(counter == max) {
    //             await sleep(2000);
    //             counter = 0;
    //             $(`.red`).toggleClass('red');
    //         }
    //         counter++;
    //         $(`.box-${$i}`).toggleClass('red');
    //     }
    //     if($i == x / 2)
    //         $('.no').removeClass('red1');
    // }

    // $i = 1;
    // $bakwas = $i + ac;
    // console.log($bakwas);
    // $(`.box-${$i}`).toggleClass('red');
    // $(`.box-${$bakwas}`).toggleClass('red');