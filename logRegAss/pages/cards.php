<style>
    .card {
        font-size: 50px;
        border: 1px solid red;
        line-height: 200px;
        height: 200px;
        width: 150;
        text-align: center;
        display: inline-block;
        margin-right: 5px;
    }

    .bg-clr {
        background: yellow;
        color: yellow;
    }
</style>
<h1>Cards</h1>
<input type='button' value='hide' onclick="fnHide()" />
<input type='button' value='Show' onclick="fnShow()" />
<span></span>

<script>
    var arr = ['J', 'Q', 'K', 'A'];

    function fnRandom(arr) {
        for (var i = 0; i < arr.length; i++) {
            var currVal = arr[i];
            var currIndex = i + 1;
            var randomIndex = Math.floor(Math.random() * currIndex);
            arr[i] = arr[randomIndex];
            arr[randomIndex] = currVal;
            console.log(arr[i])
        }
        return arr;

    }
    arr = fnRandom(arr);
    var divs = '';
    arr.forEach(function(v) {
        divs += "<div class='card bg-clr' >" + v + "</div>"
    })
    document.querySelector('span').innerHTML = divs;

    function fnHide() {
        location.reload();
    }

    function fnShow() {
        var cards = document.getElementsByClassName('card');
        for (var i = 0; i < cards.length; i++) {
            var card = cards[i];
            card.classList.remove('bg-clr');
        }
    }
</script>